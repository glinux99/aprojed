<!--
  APROJED R.D. Congo - Layout Public Premium (Appbar + Footer)
  Version : Dynamique avec Settings & UI Moderne (Optimisée Mobile)
-->
<script setup>
import { ref, onMounted, onUnmounted, computed, watch } from 'vue';
import { Link, Head, usePage, router } from '@inertiajs/vue3';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Dialog from 'primevue/dialog';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();
const page = usePage();

// ==================== RÉCUPÉRATION DES SETTINGS & DONNÉES GLOBALES ====================
const settings = computed(() => page.props.settings || {});
const donationAmounts = computed(() => page.props.donationAmounts || [15, 30, 50, 100, 250]);
const paymentMethods = ref([]);

// ==================== ÉTATS DE LA MODALE DE DON ====================
const donationModalVisible = ref(false);
const donationStep = ref(1);
const donationForm = ref({
    amountType: 'once',
    amount: 50,
    customAmount: null,
    paymentMethod: null,
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    taxReceipt: false,
    newsletter: false,
});

// ==================== ÉTATS DE LA MODALE BÉNÉVOLE ====================
const volunteerModalVisible = ref(false);
const volunteerForm = ref({
    name: '',
    email: '',
    phone: '',
    description: ''
});

// ==================== VALEURS PAR DÉFAUT DU SITE ====================
const siteName = computed(() => settings.value.site_name || 'APROJED');
const siteLogo = computed(() => {
    const isDark = document.documentElement.classList.contains('app-dark');
    if (isDark && settings.value.logo_dark_url) return settings.value.logo_dark_url;
    return settings.value.logo_light_url || settings.value.logo_url || 'https://aprojed.org/storage/uploads/logo.png';
});
const siteEmail = computed(() => settings.value.email || 'contact@aprojed.org');
const sitePhone = computed(() => settings.value.phone || '+243 123 456 789');
const secondaryPhone = computed(() => settings.value.secondary_phone || '');
const address = computed(() => settings.value.address || '');
const city = computed(() => settings.value.city || 'Kinshasa');
const country = computed(() => settings.value.country || 'R.D. Congo');
const facebookUrl = computed(() => settings.value.facebook || '#');
const twitterUrl = computed(() => settings.value.twitter || '#');
const linkedinUrl = computed(() => settings.value.linkedin || '#');
const instagramUrl = computed(() => settings.value.instagram || '#');
const youtubeUrl = computed(() => settings.value.youtube || '#');
const tiktokUrl = computed(() => settings.value.tiktok || '#');
const githubUrl = computed(() => settings.value.github || '#');
const copyrightText = computed(() => settings.value.copyright_text || `© ${new Date().getFullYear()} APROJED R.D. Congo. Tous droits réservés.`);

// ==================== ÉTATS INTERACTIFS ====================
const mobileMenuOpen = ref(false);
const newsletterEmail = ref('');
const newsletterLoading = ref(false);
const isScrolled = ref(false);

// ==================== MOYENS DE PAIEMENT ====================
const activePaymentMethods = computed(() => paymentMethods.value.filter(m => m.active));

const loadPaymentMethodsFromSettings = () => {
    if (settings.value?.payment_methods) {
        try {
            paymentMethods.value = JSON.parse(settings.value.payment_methods);
        } catch(e) {
            setDefaultPaymentMethods();
        }
    } else {
        setDefaultPaymentMethods();
    }
};

const setDefaultPaymentMethods = () => {
    paymentMethods.value = [
        { id: 1, label: 'PayPal', icon: 'pi-paypal', active: true, type: 'paypal', needConfig: true, isDefault: false },
        { id: 2, label: 'Carte bancaire (Stripe)', icon: 'pi-credit-card', active: true, type: 'stripe', needConfig: true, isDefault: false },
        { id: 3, label: 'Virement bancaire', icon: 'pi-building', active: true, type: 'transfer', needConfig: false, description: 'Renseignements bancaires', isDefault: true }
    ];
};

// ==================== FONCTIONS DE LA MODALE DE DON ====================
const setDonationAmount = (amount) => {
    donationForm.value.amount = amount;
    donationForm.value.customAmount = null;
};

const onCustomAmountInput = () => {
    if (donationForm.value.customAmount) donationForm.value.amount = donationForm.value.customAmount;
};

const handleDonationSubmit = () => {
    if (!donationForm.value.firstName?.trim() || !donationForm.value.lastName?.trim() || !donationForm.value.email?.trim() || !donationForm.value.paymentMethod) {
        toast.add({ severity: 'error', summary: 'Erreur', detail: 'Veuillez remplir tous les champs obligatoires.' });
        return;
    }

    const amount = donationForm.value.amountType === 'once' && donationForm.value.customAmount
        ? donationForm.value.customAmount
        : donationForm.value.amount;

    if (!amount || amount <= 0) {
        toast.add({ severity: 'error', summary: 'Erreur', detail: 'Le montant du don est invalide.' });
        return;
    }

    donationStep.value = 3;
    const formData = new FormData();
    formData.append('amountType', donationForm.value.amountType);
    formData.append('amount', amount);

    const selectedMethod = activePaymentMethods.value.find(m => m.id === donationForm.value.paymentMethod);
    formData.append('paymentMethod', selectedMethod ? selectedMethod.type : '');

    formData.append('firstName', donationForm.value.firstName);
    formData.append('lastName', donationForm.value.lastName);
    formData.append('email', donationForm.value.email);
    formData.append('phone', donationForm.value.phone || '');
    formData.append('taxReceipt', donationForm.value.taxReceipt ? 1 : 0);
    formData.append('newsletter', donationForm.value.newsletter ? 1 : 0);

    router.post(route('donations.store'), formData, {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            toast.add({
                severity: 'success',
                summary: 'Merci pour votre générosité !',
                detail: `Votre don de ${amount} USD a été enregistré.`,
                life: 6000
            });
            donationForm.value = { amountType: 'once', amount: 50, customAmount: null, paymentMethod: null, firstName: '', lastName: '', email: '', phone: '', taxReceipt: false, newsletter: false };
            donationModalVisible.value = false;
            donationStep.value = 1;
        },
        onError: (errors) => {
            donationStep.value = 1;
            const errorMsg = Object.values(errors).flat()[0];
            toast.add({ severity: 'error', summary: 'Erreur', detail: errorMsg || 'Une erreur est survenue.' });
        }
    });
};

// ==================== FONCTIONS DE LA MODALE BÉNÉVOLE ====================
const handleVolunteerSubmit = () => {
    if (!volunteerForm.value.name || !volunteerForm.value.email) {
        toast.add({ severity: 'error', summary: 'Erreur', detail: 'Veuillez remplir les champs obligatoires.' });
        return;
    }

    router.post(route('volunteers.store'), volunteerForm.value, {
        preserveScroll: true,
        onSuccess: () => {
            toast.add({ severity: 'success', summary: 'Candidature envoyée !', detail: 'Merci pour votre engagement.', life: 5000 });
            volunteerModalVisible.value = false;
            volunteerForm.value = { name: '', email: '', phone: '', description: '' };
        },
        onError: (errors) => {
            const errorMsg = Object.values(errors).flat()[0];
            toast.add({ severity: 'error', summary: 'Erreur', detail: errorMsg || 'Une erreur est survenue.' });
        }
    });
};

// ==================== NEWSLETTER (pied de page) ====================
const handleNewsletterSubmit = () => {
    if (!newsletterEmail.value) return;
    newsletterLoading.value = true;
    setTimeout(() => {
        newsletterLoading.value = false;
        toast.add({ severity: 'success', summary: 'Bienvenue à bord !', detail: 'Votre inscription est confirmée.', life: 4000 });
        newsletterEmail.value = '';
    }, 1200);
};

// ==================== MENU MOBILE & SCROLL ====================
const isActive = (path) => {
    if (path === '/') return page.url === '/';
    return page.url.startsWith(path);
};

const handleScroll = () => {
    isScrolled.value = window.scrollY > 20;
};

const closeMenu = () => {
    mobileMenuOpen.value = false;
};

watch(mobileMenuOpen, (isOpen) => {
    if (isOpen) document.body.style.overflow = 'hidden';
    else document.body.style.overflow = '';
});

// ==================== ÉVÉNEMENT GLOBAL POUR OUVRIR LA MODALE ====================
const handleOpenDonationModal = (event) => {
    const amount = event.detail?.amount;
    if (amount && amount > 0) {
        donationForm.value.amount = amount;
        donationForm.value.customAmount = amount;
    }
    donationModalVisible.value = true;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    loadPaymentMethodsFromSettings();
    window.addEventListener('open-donation-modal', handleOpenDonationModal);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
    window.removeEventListener('open-donation-modal', handleOpenDonationModal);
});
</script>

<template>
    <Head :title="$page.props.title ? `${$page.props.title} - ${siteName}` : siteName" />
    <Toast position="bottom-right" />

    <div class="min-h-screen bg-slate-50 text-slate-800 font-sans antialiased selection:bg-emerald-500 selection:text-white flex flex-col">

        <!-- ==================== HEADER / NAVIGATION ==================== -->
        <header
            class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
            :class="isScrolled ? 'bg-white/95 backdrop-blur-md border-b border-slate-200/50 shadow-sm' : 'bg-white border-b border-slate-100'"
        >
            <!-- Top Bar (Desktop uniquement) -->
            <div
                class="hidden lg:flex w-full bg-slate-900 text-slate-300 px-6 xl:px-12 text-[11px] font-bold tracking-wide justify-between items-center transition-all duration-300 origin-top"
                :class="isScrolled ? 'h-0 opacity-0 overflow-hidden' : 'h-10 opacity-100'"
            >
                <div class="flex items-center gap-6">
                    <a :href="`mailto:${siteEmail}`" class="flex items-center gap-2 hover:text-white transition-colors"><i class="pi pi-envelope text-emerald-500"></i> {{ siteEmail }}</a>
                    <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                    <a :href="`tel:${sitePhone}`" class="flex items-center gap-2 hover:text-white transition-colors"><i class="pi pi-phone text-emerald-500"></i> {{ sitePhone }}</a>
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3">
                        <a :href="facebookUrl" target="_blank" class="hover:text-emerald-400 transition-colors"><i class="pi pi-facebook"></i></a>
                        <a :href="linkedinUrl" target="_blank" class="hover:text-emerald-400 transition-colors"><i class="pi pi-linkedin"></i></a>
                        <a :href="twitterUrl" target="_blank" class="hover:text-emerald-400 transition-colors"><i class="pi pi-twitter"></i></a>
                        <a :href="instagramUrl" target="_blank" class="hover:text-emerald-400 transition-colors"><i class="pi pi-instagram"></i></a>
                        <a :href="youtubeUrl" target="_blank" class="hover:text-emerald-400 transition-colors"><i class="pi pi-youtube"></i></a>
                    </div>
                    <span class="w-px h-4 bg-slate-700"></span>
                    <button @click="donationModalVisible = true" class="text-emerald-400 hover:text-emerald-300 flex items-center gap-1.5 transition-colors">
                        Soutenir nos actions <i class="pi pi-heart-fill text-emerald-500"></i>
                    </button>
                </div>
            </div>

            <!-- Main Navbar -->
            <div class="relative w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 flex items-center justify-between transition-all duration-300" :class="isScrolled ? 'h-16 lg:h-20' : 'h-20 lg:h-24'">

                <!-- Logo -->
                <Link href="/" class="flex items-center gap-3 group outline-none">
                    <div class="relative overflow-hidden rounded-xl p-1.5 shadow-sm border bg-white group-hover:shadow-md transition-all duration-300 group-hover:-translate-y-0.5">
                        <img :src="`/media/${siteLogo}`" alt="Logo APROJED" class="h-9 lg:h-12 w-auto object-contain" />
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg lg:text-2xl font-black text-slate-900 tracking-tight leading-none group-hover:text-emerald-600 transition-colors">{{ siteName }}</span>
                        <span class="hidden sm:block text-[9px] lg:text-[10px] font-bold tracking-widest text-slate-400 uppercase mt-1">{{ settings.tagline || 'Actions & Projets Durables' }}</span>
                    </div>
                </Link>

                <!-- Desktop Menu Links -->
                <nav class="hidden lg:flex items-center gap-8 xl:gap-12">
                    <Link href="/" :class="['nav-link', { 'active': isActive('/') }]">Accueil</Link>
                    <Link href="/about" :class="['nav-link', { 'active': isActive('/about') }]">À propos</Link>
                    <Link href="/activites" :class="['nav-link', { 'active': isActive('/activites') }]">Activités</Link>
                    <Link href="/contact" :class="['nav-link', { 'active': isActive('/contact') }]">Contact</Link>
                </nav>

                <!-- CTA Actions -->
                <div class="flex items-center gap-3">
                    <Link href="/dashboard" class="hidden xl:flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-slate-900 px-4 py-2 rounded-full border border-transparent hover:bg-slate-100 transition-colors">
                        <i class="pi pi-lock text-[10px]"></i> Espace Admin
                    </Link>

                    <!-- Bouton Don (Desktop) -->
                    <button @click="donationModalVisible = true" class="hidden md:flex items-center gap-2 text-sm font-bold text-white px-6 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-500 shadow-md shadow-emerald-500/30 hover:shadow-lg hover:-translate-y-0.5 transition-all">
                        <i class="pi pi-heart"></i> Faire un don
                    </button>

                    <!-- Hamburger Menu (Mobile) -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden relative z-50 p-2 rounded-xl text-slate-800 bg-slate-50 hover:bg-slate-100 border border-slate-200 focus:outline-none transition-all flex items-center justify-center w-11 h-11">
                        <i :class="['text-xl transition-transform duration-300', mobileMenuOpen ? 'pi pi-times rotate-90 text-emerald-600' : 'pi pi-bars']"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Overlay & Drawer -->
            <Transition name="fade">
                <div v-if="mobileMenuOpen" @click="closeMenu" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden"></div>
            </Transition>
            <Transition name="slide-right">
                <div v-show="mobileMenuOpen" class="fixed top-0 right-0 w-[85%] max-w-[320px] h-full bg-white z-50 lg:hidden flex flex-col shadow-2xl border-l border-slate-100 overflow-y-auto">

                    <!-- Header Drawer -->
                    <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div class="flex flex-col">
                            <span class="font-black text-lg text-slate-900 leading-none">Menu</span>
                            <span class="text-[10px] text-emerald-600 font-bold uppercase tracking-widest mt-1">APROJED RDC</span>
                        </div>
                        <button @click="closeMenu" class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-slate-200 text-slate-500 hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition-colors">
                            <i class="pi pi-times text-sm"></i>
                        </button>
                    </div>

                    <!-- Liens de navigation (Mobile) -->
                    <div class="flex flex-col px-4 py-6 gap-2 flex-grow">
                        <Link href="/" @click="closeMenu" :class="['mobile-nav-link', { 'mobile-active': isActive('/') }]"><i class="pi pi-home w-6 opacity-60"></i> Accueil</Link>
                        <Link href="/about" @click="closeMenu" :class="['mobile-nav-link', { 'mobile-active': isActive('/about') }]"><i class="pi pi-info-circle w-6 opacity-60"></i> À propos</Link>
                        <Link href="/activites" @click="closeMenu" :class="['mobile-nav-link', { 'mobile-active': isActive('/activites') }]"><i class="pi pi-briefcase w-6 opacity-60"></i> Nos Activités</Link>
                        <Link href="/contact" @click="closeMenu" :class="['mobile-nav-link', { 'mobile-active': isActive('/contact') }]"><i class="pi pi-envelope w-6 opacity-60"></i> Nous Contacter</Link>
                    </div>

                    <!-- Section Basse (Mobile) -->
                    <div class="p-5 bg-slate-50 border-t border-slate-100 space-y-5">
                        <button @click="closeMenu; donationModalVisible = true" class="w-full py-3.5 rounded-xl text-white font-bold bg-emerald-600 shadow-md shadow-emerald-600/20 flex items-center justify-center gap-2 hover:bg-emerald-500 active:scale-95 transition-all">
                            <i class="pi pi-heart-fill"></i> Faire un don
                        </button>

                        <!-- Réseaux Sociaux -->
                        <div class="flex justify-center gap-3">
                            <a :href="facebookUrl" target="_blank" class="social-icon-mobile"><i class="pi pi-facebook"></i></a>
                            <a :href="twitterUrl" target="_blank" class="social-icon-mobile"><i class="pi pi-twitter"></i></a>
                            <a :href="linkedinUrl" target="_blank" class="social-icon-mobile"><i class="pi pi-linkedin"></i></a>
                            <a :href="instagramUrl" target="_blank" class="social-icon-mobile"><i class="pi pi-instagram"></i></a>
                            <a :href="youtubeUrl" target="_blank" class="social-icon-mobile"><i class="pi pi-youtube"></i></a>
                            <a :href="tiktokUrl" target="_blank" class="social-icon-mobile"><i class="pi pi-video"></i></a>
                        </div>

                        <!-- Lien Admin discret -->
                        <div class="text-center pt-2">
                            <Link href="/dashboard" @click="closeMenu" class="text-[11px] font-semibold text-slate-400 hover:text-slate-700 flex items-center justify-center gap-1.5 transition-colors">
                                <i class="pi pi-lock text-[9px]"></i> Accès Administrateur
                            </Link>
                        </div>
                    </div>
                </div>
            </Transition>
        </header>

        <!-- ==================== MAIN CONTENT ==================== -->
        <main class="flex-grow pt-[80px] lg:pt-[120px] relative z-10">
            <slot />
        </main>

        <!-- Bandeau appel à l'action (prêt à agir) -->
        <div class="bg-gradient-to-r from-emerald-700 to-teal-700 text-white py-16 md:py-20">
            <div class="max-w-4xl mx-auto text-center px-4">
                <h2 class="text-2xl md:text-3xl font-black">Prêt à agir avec nous ?</h2>
                <p class="text-emerald-100 text-base md:text-lg mt-3">Chaque don, chaque partage, chaque bénévolat renforce notre impact.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                    <Button label="Faire un don" icon="pi pi-heart-fill" class="bg-white text-emerald-700 hover:bg-emerald-50 border-none font-bold px-8 py-3.5 rounded-2xl" @click="donationModalVisible = true" />
                    <Button label="Devenir bénévole" icon="pi pi-users" class="p-button-outlined !text-white !border-white hover:!bg-white/10 py-3.5 rounded-2xl" @click="volunteerModalVisible = true" />
                </div>
            </div>
        </div>

        <!-- ==================== FOOTER (Optimisé UI/UX Mobile) ==================== -->
        <footer class="relative z-10 overflow-hidden border-t-[4px] border-emerald-500 bg-slate-950 font-sans text-slate-400 pt-12 md:pt-24 pb-8 md:pb-12">
            <!-- Background effects -->
            <div class="absolute top-0 left-1/4 -translate-x-1/2 w-[600px] h-[350px] bg-emerald-500/10 blur-[130px] rounded-full pointer-events-none"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#0f172a_1px,transparent_1px),linear-gradient(to_bottom,#0f172a_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-25 pointer-events-none"></div>

            <div class="max-w-[1600px] mx-auto px-6 sm:px-8 lg:px-16 relative z-10">
                <!-- Grid Principale -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-12 lg:gap-y-16 gap-x-8 mb-12 md:mb-20">

                    <!-- Colonne 1 : Logo & Info (Prend 4 cols sur Desktop) -->
                    <div class="lg:col-span-4 flex flex-col items-start lg:pr-6">
                        <Link href="/" class="flex items-center gap-3 text-white group mb-5 outline-none rounded-xl transition-all">
                            <div class="rounded-xl shadow-xl bg-white p-1 transition-all duration-500 group-hover:scale-105 group-hover:shadow-emerald-500/30">
                                <img :src="`/media/${siteLogo}`" alt="Logo APROJED" class="h-9 md:h-11 w-auto object-contain" />
                            </div>
                            <div class="flex flex-col">
                                <span class="font-black text-xl md:text-2xl tracking-tight uppercase leading-none group-hover:text-emerald-400 transition-colors duration-300">{{ siteName }}</span>
                                <span class="text-[10px] text-emerald-500 font-black uppercase tracking-widest mt-1.5 flex items-center gap-1.5">
                                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span> R.D. Congo
                                </span>
                            </div>
                        </Link>
                        <!-- Texte caché sur très petits écrans pour gagner de la place -->
                        <p class="hidden sm:block text-[13px] md:text-sm text-slate-400 font-medium leading-relaxed mb-6 text-justify">
                            {{ settings?.description || 'ONG congolaise dédiée à l\'amélioration des conditions de vie, au renforcement des capacités communautaires, à l\'accès à l\'eau potable et au développement durable sur toute l\'étendue du territoire.' }}
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <button @click="donationModalVisible = true" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-600 text-white font-bold text-[13px] hover:bg-emerald-500 shadow-lg shadow-emerald-600/20 transition-all transform hover:-translate-y-0.5">
                                Soutenir <i class="pi pi-heart-fill text-xs"></i>
                            </button>
                            <Link href="/about" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-900 border border-slate-800 text-slate-300 font-bold text-[13px] hover:bg-slate-800 hover:text-white transition-all">
                                Rapport <i class="pi pi-download text-xs"></i>
                            </Link>
                        </div>
                    </div>

                    <!-- Colonnes 2 & 3 groupées pour Mobile : Menus (Côte à côte sur mobile = gain d'espace !) -->
                    <div class="lg:col-span-4 grid grid-cols-2 gap-6 lg:gap-8">
                        <!-- Navigation institutionnelle -->
                        <nav aria-label="Navigation institutionnelle">
                            <h3 class="text-white font-black text-[11px] md:text-xs uppercase tracking-widest mb-4 md:mb-6 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Organisation</h3>
                            <ul class="space-y-3 md:space-y-4">
                                <li v-for="(link, index) in [
                                    { name: 'Accueil', url: '/' },
                                    { name: 'Histoire', url: '/about' },
                                    { name: 'Gouvernance', url: '/about#gouvernance' },
                                    { name: 'Partenaires', url: '/about#partenaires' },
                                    { name: 'Contact', url: '/contact' }
                                ]" :key="'org-' + index">
                                    <Link :href="link.url" class="group flex items-center text-[13px] md:text-sm font-semibold text-slate-400 hover:text-emerald-400 transition-colors duration-300">
                                        <i class="pi pi-angle-right text-[10px] mr-1 text-slate-600 group-hover:text-emerald-500 transition-colors"></i>
                                        <span>{{ link.name }}</span>
                                    </Link>
                                </li>
                            </ul>
                        </nav>

                        <!-- Secteurs -->
                        <nav aria-label="Navigation des actions">
                            <h3 class="text-white font-black text-[11px] md:text-xs uppercase tracking-widest mb-4 md:mb-6 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Secteurs</h3>
                            <ul class="space-y-3 md:space-y-4">
                                <li v-for="(link, index) in [
                                    { name: 'Eau & Hygiène', url: '/activites#eau' },
                                    { name: 'Éducation', url: '/activites#education' },
                                    { name: 'Santé publique', url: '/activites#sante' },
                                    { name: 'Agriculture', url: '/activites#agriculture' },
                                    { name: 'Urgences', url: '/activites#urgences' }
                                ]" :key="'actions-' + index">
                                    <Link :href="link.url" class="group flex items-center text-[13px] md:text-sm font-semibold text-slate-400 hover:text-emerald-400 transition-colors duration-300">
                                        <i class="pi pi-angle-right text-[10px] mr-1 text-slate-600 group-hover:text-emerald-500 transition-colors"></i>
                                        <span>{{ link.name }}</span>
                                    </Link>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Colonne 4 : Newsletter & contacts -->
                    <div class="lg:col-span-4 bg-slate-900/40 p-6 md:p-8 rounded-2xl md:rounded-3xl border border-slate-800/60 backdrop-blur-sm flex flex-col justify-between">
                        <div>
                            <h3 class="text-white font-black text-[11px] md:text-xs uppercase tracking-widest mb-3 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Newsletter Terrain</h3>
                            <p class="text-[12px] md:text-xs text-slate-400 mb-5 leading-relaxed">Abonnez-vous pour recevoir les bilans de nos projets et l'impact de vos dons.</p>
                            <form @submit.prevent="handleNewsletterSubmit" class="relative w-full mb-6 group">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-emerald-500 transition-colors z-10"><i class="pi pi-envelope"></i></div>
                                <input type="email" v-model="newsletterEmail" required placeholder="votre@email.com" class="w-full pl-11 pr-[100px] md:pr-[115px] py-3.5 bg-slate-950 border border-slate-800 text-white text-[13px] md:text-sm rounded-full focus:outline-none focus:border-emerald-500 transition-all placeholder-slate-600 font-medium" />
                                <button type="submit" :disabled="newsletterLoading" class="absolute right-1.5 top-1.5 bottom-1.5 px-4 md:px-5 bg-emerald-600 hover:bg-emerald-500 disabled:bg-slate-800 text-white text-[11px] md:text-xs font-bold rounded-full transition-all shadow-md flex items-center justify-center">
                                    <span v-if="!newsletterLoading">S'inscrire</span>
                                    <span v-else><i class="pi pi-spin pi-spinner text-xs"></i></span>
                                </button>
                            </form>
                        </div>
                        <div class="flex flex-col gap-3 border-t border-slate-800/60 pt-5">
                            <a :href="`mailto:${siteEmail}`" class="flex items-center gap-3 text-[13px] md:text-sm font-semibold text-slate-400 hover:text-white transition-colors group w-fit">
                                <div class="w-8 h-8 md:w-9 md:h-9 rounded-lg bg-slate-950 border border-slate-800 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-all"><i class="pi pi-at text-xs"></i></div>
                                <span class="truncate max-w-[200px] md:max-w-[240px]">{{ siteEmail }}</span>
                            </a>
                            <a :href="`tel:${sitePhone}`" class="flex items-center gap-3 text-[13px] md:text-sm font-semibold text-slate-400 hover:text-white transition-colors group w-fit">
                                <div class="w-8 h-8 md:w-9 md:h-9 rounded-lg bg-slate-950 border border-slate-800 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-all"><i class="pi pi-phone text-xs"></i></div>
                                <span>{{ sitePhone }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Ligne de séparation -->
                <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-800 to-transparent mb-6 md:mb-8"></div>

                <!-- Barre Bottom / Copyright -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">

                    <!-- Liens légaux & Copyright (Empilés sur mobile) -->
                    <div class="flex flex-col md:flex-row items-center gap-3 md:gap-4 text-[11px] md:text-xs font-semibold text-slate-500">
                        <span class="order-2 md:order-1">{{ copyrightText }}</span>
                        <span class="hidden md:inline text-slate-800 order-2">|</span>
                        <div class="flex items-center justify-center gap-3 flex-wrap order-1 md:order-3">
                            <a :href="settings?.privacy_policy_url || '#'" class="hover:text-slate-300 transition-colors">Confidentialité</a>
                            <a :href="settings?.terms_url || '#'" class="hover:text-slate-300 transition-colors">Conditions Générales</a>
                        </div>
                        <span class="hidden md:inline text-slate-800 order-4">|</span>
                        <span class="flex items-center gap-1.5 text-slate-400 font-bold order-3 md:order-5 mt-2 md:mt-0">DESIGN BY GLINUX99</span>
                    </div>

                    <!-- Réseaux Sociaux -->
                    <div class="flex items-center gap-2.5">
                        <a v-for="(social, i) in [
                            { icon: 'pi-facebook', url: facebookUrl, label: 'Facebook' },
                            { icon: 'pi-twitter', url: twitterUrl, label: 'Twitter' },
                            { icon: 'pi-linkedin', url: linkedinUrl, label: 'LinkedIn' },
                            { icon: 'pi-instagram', url: instagramUrl, label: 'Instagram' },
                            { icon: 'pi-youtube', url: youtubeUrl, label: 'YouTube' },
                            { icon: 'pi-video', url: tiktokUrl, label: 'TikTok' },
                            { icon: 'pi-github', url: githubUrl, label: 'GitHub' }
                        ]" :key="'social-' + i" :href="social.url || '#'" target="_blank" rel="noopener noreferrer" :aria-label="social.label" class="w-9 h-9 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:border-emerald-500/40 hover:bg-emerald-500/20 transition-all shadow-sm">
                            <i :class="['pi', social.icon, 'text-xs md:text-sm']"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- ==================== MODALE DE DON (GLOBALE) ==================== -->
        <!-- Reste du code inchangé pour les modales... -->
        <Dialog
            v-model:visible="donationModalVisible"
            modal
            :showHeader="false"
            :style="{ width: '600px', maxWidth: '95vw' }"
            :pt="{ mask: { class: 'backdrop-blur-sm bg-slate-900/60' } }"
            class="rounded-3xl overflow-hidden shadow-2xl m-3"
        >
            <div class="bg-white flex flex-col h-full relative">
                <!-- Modale Header -->
                <div class="flex justify-between items-center px-5 md:px-8 py-4 border-b border-slate-100 bg-slate-50/50 sticky top-0 z-20">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-emerald-100 flex items-center justify-center">
                            <i class="pi pi-heart-fill text-emerald-600 text-base md:text-lg animate-pulse"></i>
                        </div>
                        <div>
                            <h2 class="font-black text-slate-900 text-base md:text-lg leading-tight">Soutenir APROJED</h2>
                            <p class="text-[10px] md:text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Plateforme sécurisée</p>
                        </div>
                    </div>
                    <Button icon="pi pi-times" class="w-8 h-8 md:w-10 md:h-10 rounded-full text-slate-400 hover:text-slate-800 hover:bg-slate-200 transition-colors flex items-center justify-center" @click="donationModalVisible = false" text />
                </div>

                <div class="p-5 md:p-8">
                    <!-- Stepper -->
                    <div class="flex items-center justify-between mb-8 relative px-2 md:px-4">
                        <div class="absolute left-8 right-8 md:left-10 md:right-10 top-4 md:top-5 h-[2px] bg-slate-100 z-0"></div>
                        <div class="absolute left-8 md:left-10 top-4 md:top-5 h-[2px] bg-emerald-500 z-0 transition-all duration-500" :style="{ width: donationStep === 1 ? '0%' : donationStep === 2 ? '50%' : '100%' }"></div>

                        <div class="relative z-10 flex flex-col items-center gap-2">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center text-xs md:text-sm font-bold transition-all duration-300" :class="donationStep >= 1 ? 'bg-emerald-500 text-white shadow-md' : 'bg-white border-2 border-slate-200 text-slate-400'">
                                <i class="pi pi-wallet"></i>
                            </div>
                            <span class="text-[9px] md:text-[10px] uppercase tracking-widest font-bold" :class="donationStep >= 1 ? 'text-slate-800' : 'text-slate-400'">Montant</span>
                        </div>
                        <div class="relative z-10 flex flex-col items-center gap-2">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center text-xs md:text-sm font-bold transition-all duration-300" :class="donationStep >= 2 ? 'bg-emerald-500 text-white shadow-md' : 'bg-white border-2 border-slate-200 text-slate-400'">
                                <i class="pi pi-user-edit"></i>
                            </div>
                            <span class="text-[9px] md:text-[10px] uppercase tracking-widest font-bold" :class="donationStep >= 2 ? 'text-slate-800' : 'text-slate-400'">Identité</span>
                        </div>
                        <div class="relative z-10 flex flex-col items-center gap-2">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center text-xs md:text-sm font-bold transition-all duration-300" :class="donationStep >= 3 ? 'bg-emerald-500 text-white shadow-md' : 'bg-white border-2 border-slate-200 text-slate-400'">
                                <i class="pi pi-verified"></i>
                            </div>
                            <span class="text-[9px] md:text-[10px] uppercase tracking-widest font-bold" :class="donationStep >= 3 ? 'text-slate-800' : 'text-slate-400'">Validation</span>
                        </div>
                    </div>

                    <!-- Étape 1 : Montant -->
                    <div v-if="donationStep === 1" class="space-y-5 md:space-y-6 animate-fade-in">
                        <div class="bg-slate-100/80 p-1.5 rounded-xl flex items-center w-full relative">
                            <button @click="donationForm.amountType = 'once'" class="flex-1 py-2.5 md:py-3 rounded-lg text-[13px] md:text-sm font-bold transition-all duration-300 flex items-center justify-center gap-2 relative z-10" :class="donationForm.amountType === 'once' ? 'bg-white shadow-sm text-emerald-600' : 'text-slate-500 hover:text-slate-700'">
                                <i class="pi pi-bolt text-xs"></i> Don unique
                            </button>
                            <button @click="donationForm.amountType = 'monthly'" class="flex-1 py-2.5 md:py-3 rounded-lg text-[13px] md:text-sm font-bold transition-all duration-300 flex items-center justify-center gap-2 relative z-10" :class="donationForm.amountType === 'monthly' ? 'bg-white shadow-sm text-emerald-600' : 'text-slate-500 hover:text-slate-700'">
                                <i class="pi pi-calendar-plus text-xs"></i> Mensuel
                            </button>
                        </div>

                        <div class="grid grid-cols-3 gap-2.5 md:gap-3">
                            <button v-for="amt in donationAmounts" :key="amt" @click="setDonationAmount(amt)" class="py-3 md:py-4 rounded-xl md:rounded-2xl border-2 text-base md:text-lg font-black transition-all duration-200 flex flex-col items-center gap-0.5 md:gap-1 hover:-translate-y-0.5" :class="donationForm.amount === amt && !donationForm.customAmount ? 'bg-emerald-500 border-emerald-500 text-white shadow-md' : 'bg-white border-slate-200 text-slate-700 hover:border-emerald-200 hover:bg-emerald-50/50'">
                                <span>{{ amt }} <span class="text-xs md:text-sm font-bold" :class="donationForm.amount === amt && !donationForm.customAmount ? 'text-emerald-100' : 'text-slate-400'">USD</span></span>
                            </button>
                        </div>

                        <div class="relative w-full group">
                            <span class="p-input-icon-left w-full">
                                <i class="pi pi-pencil text-slate-400 group-focus-within:text-emerald-500 transition-colors z-10"></i>
                                <InputNumber v-model="donationForm.customAmount" placeholder="Montant libre..." mode="currency" currency="USD" class="w-full" :pt="{ input: { class: 'w-full pl-10 py-3 md:py-4 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 font-bold text-base md:text-lg bg-slate-50' } }" @input="onCustomAmountInput" />
                            </span>
                        </div>

                        <Button label="Étape suivante" icon="pi pi-arrow-right" iconPos="right" class="w-full bg-slate-900 hover:bg-slate-800 border-none text-white rounded-xl py-3.5 md:py-4 font-bold text-sm shadow-lg transition-all active:scale-95" @click="donationStep = 2" />
                    </div>

                    <!-- Étape 2 : Identité + Paiement -->
                    <div v-if="donationStep === 2" class="space-y-4 md:space-y-5 animate-fade-in">
                        <div class="space-y-3 md:space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                                <div class="relative">
                                    <i class="pi pi-user absolute right-3 md:right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <InputText v-model="donationForm.firstName" placeholder="Prénom *" class="w-full pl-4 pr-10 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 text-[13px] md:text-sm" />
                                </div>
                                <div class="relative">
                                    <i class="pi pi-users absolute right-3 md:right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <InputText v-model="donationForm.lastName" placeholder="Nom *" class="w-full pl-4 pr-10 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 text-[13px] md:text-sm" />
                                </div>
                            </div>
                            <div class="relative">
                                <i class="pi pi-envelope absolute right-3 md:right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <InputText type="email" v-model="donationForm.email" placeholder="Adresse e-mail *" class="w-full pl-4 pr-10 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 text-[13px] md:text-sm" />
                            </div>
                        </div>

                        <!-- Moyens de paiement -->
                        <div class="space-y-2 mt-4 md:mt-6">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="pi pi-credit-card text-emerald-500"></i>
                                <h3 class="text-[13px] md:text-sm font-bold text-slate-800">Paiement *</h3>
                            </div>
                            <div v-for="method in activePaymentMethods" :key="method.id" @click="donationForm.paymentMethod = method.id" class="flex items-center justify-between p-3 md:p-4 border-2 rounded-xl cursor-pointer transition-all duration-200 group" :class="donationForm.paymentMethod === method.id ? 'bg-emerald-50/50 border-emerald-500 shadow-sm' : 'bg-white border-slate-100 hover:border-emerald-200'">
                                <div class="flex items-center gap-3 md:gap-4">
                                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-lg flex items-center justify-center transition-colors" :class="donationForm.paymentMethod === method.id ? 'bg-emerald-100 text-emerald-600' : 'bg-slate-50 text-slate-500 group-hover:text-emerald-500'">
                                        <i :class="`pi ${method.icon}`" class="text-lg md:text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-[13px] md:text-sm font-bold text-slate-800">{{ method.label }}</div>
                                        <div class="text-[10px] md:text-[11px] text-slate-400 mt-0.5">100% sécurisé</div>
                                    </div>
                                </div>
                                <div class="w-4 h-4 md:w-5 md:h-5 rounded-full border-2 flex items-center justify-center transition-colors" :class="donationForm.paymentMethod === method.id ? 'border-emerald-500 bg-emerald-500' : 'border-slate-300'">
                                    <i v-if="donationForm.paymentMethod === method.id" class="pi pi-check text-white text-[8px] md:text-[10px]"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Switches (Fiscal & Newsletter) -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between p-3 md:p-4 bg-slate-50 border border-slate-100 rounded-xl cursor-pointer hover:bg-slate-100 transition-colors" @click="donationForm.taxReceipt = !donationForm.taxReceipt">
                                <div class="flex items-center gap-3">
                                    <i class="pi pi-file-pdf text-slate-500 text-lg md:text-xl"></i>
                                    <div>
                                        <div class="text-[13px] md:text-sm font-bold text-slate-800">Reçu fiscal</div>
                                        <div class="hidden sm:block text-[11px] text-slate-500 mt-0.5">Pour vos déductions d'impôts</div>
                                    </div>
                                </div>
                                <div class="w-10 md:w-11 h-5 md:h-6 rounded-full relative transition-colors duration-300" :class="donationForm.taxReceipt ? 'bg-emerald-500' : 'bg-slate-300'">
                                    <div class="absolute top-1 left-1 bg-white w-3 h-3 md:w-4 md:h-4 rounded-full transition-transform duration-300 shadow-sm" :class="donationForm.taxReceipt ? 'translate-x-5' : 'translate-x-0'"></div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 md:p-4 bg-slate-50 border border-slate-100 rounded-xl cursor-pointer hover:bg-slate-100 transition-colors" @click="donationForm.newsletter = !donationForm.newsletter">
                                <div class="flex items-center gap-3">
                                    <i class="pi pi-envelope text-slate-500 text-lg md:text-xl"></i>
                                    <div>
                                        <div class="text-[13px] md:text-sm font-bold text-slate-800">Newsletter</div>
                                        <div class="hidden sm:block text-[11px] text-slate-500 mt-0.5">Actualités et rapports d'impact</div>
                                    </div>
                                </div>
                                <div class="w-10 md:w-11 h-5 md:h-6 rounded-full relative transition-colors duration-300" :class="donationForm.newsletter ? 'bg-emerald-500' : 'bg-slate-300'">
                                    <div class="absolute top-1 left-1 bg-white w-3 h-3 md:w-4 md:h-4 rounded-full transition-transform duration-300 shadow-sm" :class="donationForm.newsletter ? 'translate-x-5' : 'translate-x-0'"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Coordonnées bancaires si virement -->
                        <div v-if="donationForm.paymentMethod === 'transfer'" class="mt-3 p-4 bg-slate-900 rounded-xl border border-slate-800 relative overflow-hidden group">
                            <i class="pi pi-building absolute -right-2 -bottom-2 text-5xl text-white/5 rotate-[-15deg]"></i>
                            <h4 class="text-emerald-400 text-[10px] uppercase tracking-widest font-bold mb-2 flex items-center gap-1.5"><i class="pi pi-lock text-[9px]"></i> Coordonnées bancaires</h4>
                            <div class="space-y-1.5 text-[13px] text-slate-300 font-mono">
                                <div class="flex justify-between border-b border-slate-700/50 pb-1.5">
                                    <span class="text-slate-500 font-sans text-xs">IBAN</span>
                                    <span class="font-bold text-white selection:bg-emerald-500">{{ settings.bank_iban || 'Non renseigné' }}</span>
                                </div>
                                <div class="flex justify-between border-b border-slate-700/50 pb-1.5 pt-1">
                                    <span class="text-slate-500 font-sans text-xs">BIC</span>
                                    <span class="font-bold text-white selection:bg-emerald-500">{{ settings.bank_bic || 'Non renseigné' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-2.5 md:gap-3 pt-3 md:pt-4 border-t border-slate-100">
                            <Button icon="pi pi-arrow-left" class="p-button-outlined border-slate-200 text-slate-600 hover:bg-slate-50 font-bold py-3 md:py-4 rounded-xl w-14 md:flex-1 md:w-auto" @click="donationStep = 1" />
                            <Button :label="`Faire un don (${donationForm.amount || donationForm.customAmount || 0} USD)`" icon="pi pi-shield" iconPos="right" class="bg-emerald-600 hover:bg-emerald-500 border-none text-white font-bold py-3 md:py-4 rounded-xl flex-[3] md:flex-[2] shadow-lg text-[13px] md:text-sm active:scale-95 transition-all" @click="handleDonationSubmit" />
                        </div>
                    </div>

                    <!-- Étape 3 : Traitement -->
                    <div v-if="donationStep === 3" class="py-12 md:py-16 flex flex-col items-center justify-center animate-fade-in text-center">
                        <div class="relative w-16 h-16 md:w-20 md:h-20 mb-5 md:mb-6">
                            <div class="absolute inset-0 border-4 border-emerald-100 rounded-full"></div>
                            <div class="absolute inset-0 border-4 border-emerald-500 rounded-full border-t-transparent animate-spin"></div>
                            <i class="pi pi-shield absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-emerald-500 text-lg md:text-xl"></i>
                        </div>
                        <h3 class="font-black text-lg md:text-xl text-slate-800 mb-2">Sécurisation en cours</h3>
                        <p class="text-[13px] md:text-sm text-slate-500 max-w-[250px]">Veuillez patienter pendant le traitement...</p>
                    </div>
                </div>
            </div>
        </Dialog>

        <!-- ==================== MODALE DE BÉNÉVOLAT ==================== -->
        <Dialog v-model:visible="volunteerModalVisible" modal header="Devenir Bénévole" :style="{ width: '500px', maxWidth: '95vw' }" class="rounded-2xl m-3">
            <div class="p-1 space-y-3">
                <p class="text-slate-500 text-[13px] md:text-sm">Rejoignez notre équipe terrain en R.D. Congo.</p>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-bold text-slate-600">Nom complet *</label>
                    <InputText v-model="volunteerForm.name" placeholder="Ex: Jean Kabila" class="p-3 text-sm rounded-xl" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-bold text-slate-600">Email *</label>
                    <InputText v-model="volunteerForm.email" type="email" placeholder="votre@email.com" class="p-3 text-sm rounded-xl" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-bold text-slate-600">Téléphone</label>
                    <InputText v-model="volunteerForm.phone" placeholder="Ex: +243..." class="p-3 text-sm rounded-xl" />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-bold text-slate-600">Motivation</label>
                    <textarea v-model="volunteerForm.description" rows="3" class="w-full p-3 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500/20 outline-none border-slate-200" placeholder="Pourquoi nous rejoindre ?"></textarea>
                </div>
                <Button label="Envoyer la candidature" icon="pi pi-send" class="w-full bg-emerald-600 text-white py-3 md:py-3.5 rounded-xl mt-3 text-sm font-bold active:scale-95 transition-all" @click="handleVolunteerSubmit" />
            </div>
        </Dialog>
    </div>
</template>

<style scoped>
.nav-link {
    position: relative;
    font-size: 0.875rem;
    font-weight: 800;
    color: #475569;
    padding: 0.5rem 0;
    transition: color 0.3s ease;
}
.nav-link:hover { color: #10b981; }
.nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    bottom: -2px;
    left: 0;
    background-color: #10b981;
    transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 4px;
}
.nav-link:hover::after,
.nav-link.active::after { width: 100%; }
.nav-link.active { color: #0f172a; }

/* Menu mobile retravaillé */
.mobile-nav-link {
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    font-size: 1rem;
    font-weight: 700;
    color: #475569;
    border-radius: 0.75rem;
    transition: all 0.2s ease;
}
.mobile-nav-link:hover, .mobile-active {
    background-color: #f1f5f9;
    color: #059669;
    padding-left: 1.5rem; /* Effet de décalage subtil */
}
.mobile-active i {
    color: #10b981;
    opacity: 1;
}

.social-icon-mobile {
    width: 2.5rem; height: 2.5rem;
    border-radius: 50%;
    background-color: white;
    border: 1px solid #e2e8f0;
    display: flex; align-items: center; justify-content: center;
    color: #64748b;
    transition: all 0.2s ease;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.social-icon-mobile:hover {
    color: #10b981; border-color: #a7f3d0; background-color: #ecfdf5;
    transform: translateY(-2px);
}
.slide-right-enter-active, .slide-right-leave-active { transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
.slide-right-enter-from, .slide-right-leave-to { transform: translateX(100%); }
.fade-enter-active, .fade-leave-active { transition: opacity 0.3s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
html { scroll-behavior: smooth; }
</style>
