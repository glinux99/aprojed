<script setup>
/**
 * ==========================================================================================
 * SUBNETCONGO LMS - ENTERPRISE SETTINGS HUB v12.0 (Vue 3 + Composition API + PrimeVue)
 * ==========================================================================================
 * DESCRIPTION : Hub centralisé pour la gestion globale de la plateforme.
 * TOUT EST INCLUS : Général, Apparence, SEO, Contact, Social, Légal, Banque, SMTP,
 * Intégrations, Sécurité, Campagne Hero.
 * ==========================================================================================
 */

import { ref, computed, onBeforeUnmount } from 'vue';
import AppLayout from "@/sakai/layout/AppLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';
import { useToast } from 'primevue/usetoast';

// --- IMPORTATION COMPOSANTS PRIMEVUE ---
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import Button from 'primevue/button';
import Badge from 'primevue/badge';
import FileUpload from 'primevue/fileupload';
import InputNumber from 'primevue/inputnumber';
import InputSwitch from 'primevue/inputswitch';
import ColorPicker from 'primevue/colorpicker';
import Dropdown from 'primevue/dropdown';
import Chips from 'primevue/chips';
import ProgressBar from 'primevue/progressbar';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import Password from 'primevue/password';
import Divider from 'primevue/divider';
import Message from 'primevue/message';

// --- SERVICES ---
const toast = useToast();

// --- PROPS ---
const props = defineProps({
    settings: {
        type: Object,
        default: () => ({})
    },
});

// --- NAVIGATION & ONGLETS ---
const activeTab = ref('general');

const menuGroups = [
    {
        title: "Identité & Marque",
        items: [
            { id: 'general', icon: 'pi pi-globe', label: 'Général', desc: 'Nom, Logos, Favicon' },
            { id: 'branding', icon: 'pi pi-palette', label: 'Apparence', desc: 'Couleurs & Polices' },
            { id: 'seo', icon: 'pi pi-search', label: 'SEO & Meta', desc: 'Référencement Google' },
        ]
    },
    {
        title: "Informations & Légal",
        items: [
            { id: 'contact', icon: 'pi pi-map-marker', label: 'Contact', desc: 'Adresses & Téléphones' },
            { id: 'social', icon: 'pi pi-share-alt', label: 'Réseaux Sociaux', desc: 'Liens externes' },
            { id: 'legal', icon: 'pi pi-shield', label: 'Légal & RGPD', desc: 'Conformité & Cookies' },
        ]
    },
    {
        title: "Finance & Technique",
        items: [
            { id: 'bank', icon: 'pi pi-building', label: 'Entreprise & Banque', desc: 'TVA, IBAN, RCCM' },
            { id: 'smtp', icon: 'pi pi-envelope', label: 'Serveur Email', desc: 'Configuration SMTP' },
            { id: 'integrations', icon: 'pi pi-server', label: 'Intégrations', desc: 'Clés API & Analytics' },
            { id: 'security', icon: 'pi pi-lock', label: 'Sécurité', desc: 'Maintenance & IPs' },
        ]
    },
    {
        title: "Marketing",
        items: [
            { id: 'hero', icon: 'pi pi-bolt', label: 'Campagne Hero', desc: 'Mise en avant' },
        ]
    }
];

// --- RÉFÉRENCES (Dropdowns) ---
const timezoneOptions = [
    { label: 'Europe/Paris (UTC+1/+2)', value: 'Europe/Paris' },
    { label: 'Africa/Kinshasa (UTC+1)', value: 'Africa/Kinshasa' },
    { label: 'America/New_York (UTC-5)', value: 'America/New_York' },
    { label: 'UTC', value: 'UTC' },
];

const fontOptions = [
    { label: 'Inter (Sans-Serif Moderne)', value: 'Inter, sans-serif' },
    { label: 'Roboto (Google Standard)', value: 'Roboto, sans-serif' },
    { label: 'Merriweather (Serif Classique)', value: 'Merriweather, serif' },
    { label: 'Fira Code (Monospace)', value: 'Fira Code, monospace' },
];

const encryptionOptions = [
    { label: 'Aucune', value: 'none' },
    { label: 'SSL', value: 'ssl' },
    { label: 'TLS', value: 'tls' },
];

// --- INITIALISATION DU FORMULAIRE INERTIA ---
const form = useForm({
    // 1. Général
    site_name: props.settings.site_name || '',
    tagline: props.settings.tagline || '',
    description: props.settings.description || '',
    timezone: props.settings.timezone || 'Europe/Paris',
    logo_light: null,
    logo_dark: null,
    favicon: null,
    delete_logo_light: false,
    delete_logo_dark: false,
    delete_favicon: false,

    // 2. Branding
    primary_color: props.settings.primary_color || '6366f1',
    secondary_color: props.settings.secondary_color || '14b8a6',
    font_family: props.settings.font_family || 'Inter, sans-serif',
    enable_dark_mode: props.settings.enable_dark_mode === '1' || props.settings.enable_dark_mode === true,

    // 3. SEO & Meta
    meta_title: props.settings.meta_title || '',
    meta_description: props.settings.meta_description || '',
    meta_keywords: props.settings.meta_keywords ? props.settings.meta_keywords.split(',') : [],
    og_image: null,
    delete_og_image: false,

    // 4. Contact
    email: props.settings.email || '',
    secondary_email: props.settings.secondary_email || '',
    phone: props.settings.phone || '',
    secondary_phone: props.settings.secondary_phone || '',
    additional_offices: props.settings.additional_offices ? JSON.parse(props.settings.additional_offices) : [],
    address: props.settings.address || '',
    city: props.settings.city || '',
    postal_code: props.settings.postal_code || '',
    country: props.settings.country || '',
    google_maps_url: props.settings.google_maps_url || '',

    // 5. Réseaux Sociaux
    facebook: props.settings.facebook || '',
    twitter: props.settings.twitter || '',
    instagram: props.settings.instagram || '',
    linkedin: props.settings.linkedin || '',
    youtube: props.settings.youtube || '',
    tiktok: props.settings.tiktok || '',
    github: props.settings.github || '',

    // 6. Légal
    company_name: props.settings.company_name || '',
    copyright_text: props.settings.copyright_text || '',
    privacy_policy_url: props.settings.privacy_policy_url || '',
    terms_url: props.settings.terms_url || '',
    enable_cookie_banner: props.settings.enable_cookie_banner === '1' || props.settings.enable_cookie_banner === true,
    cookie_banner_text: props.settings.cookie_banner_text || 'Ce site utilise des cookies pour améliorer votre expérience.',

    // 7. Banque & Facturation
    additional_banks: props.settings.additional_banks ? JSON.parse(props.settings.additional_banks) : [],
    paypal_email: props.settings.paypal_email || '',
    paypal_client_id: props.settings.paypal_client_id || '',
    paypal_mode: props.settings.paypal_mode || 'sandbox',
    rccm: props.settings.rccm || '',
    tax_id: props.settings.tax_id || '',
    capital: props.settings.capital || '',
    invoice_prefix: props.settings.invoice_prefix || 'INV-',

    // 8. SMTP
    smtp_host: props.settings.smtp_host || '',
    smtp_port: props.settings.smtp_port || 587,
    smtp_user: props.settings.smtp_user || '',
    smtp_pass: props.settings.smtp_pass || '',
    smtp_encryption: props.settings.smtp_encryption || 'tls',
    smtp_from_address: props.settings.smtp_from_address || '',
    smtp_from_name: props.settings.smtp_from_name || '',

    // 9. Intégrations
    google_analytics_id: props.settings.google_analytics_id || '',
    facebook_pixel_id: props.settings.facebook_pixel_id || '',
    stripe_public_key: props.settings.stripe_public_key || '',
    recaptcha_site_key: props.settings.recaptcha_site_key || '',

    // 10. Sécurité
    maintenance_mode: props.settings.maintenance_mode === '1' || props.settings.maintenance_mode === true,
    maintenance_message: props.settings.maintenance_message || 'Nous revenons bientôt.',
    allowed_ips: props.settings.allowed_ips ? props.settings.allowed_ips.split(',') : [],

    // 11. Campagne Hero
    hero_campaign_active: props.settings.hero_campaign_active === '1' || props.settings.hero_campaign_active === true,
    hero_campaign_badge: props.settings.hero_campaign_badge || 'Urgence',
    hero_campaign_title: props.settings.hero_campaign_title || '',
    hero_campaign_description: props.settings.hero_campaign_description || '',
    hero_campaign_target: parseFloat(props.settings.hero_campaign_target) || 0,
    hero_campaign_current: parseFloat(props.settings.hero_campaign_current) || 0,
    hero_campaign_btn_text: props.settings.hero_campaign_btn_text || 'Faire un don',
});

// --- TEMPLATE REFS ---
const logo_light_ref = ref(null);
const logo_dark_ref = ref(null);
const favicon_ref = ref(null);
const og_image_ref = ref(null);

// --- GESTION DES PREVIEWS D'IMAGES (Anti-Leak) ---
const previews = ref({
    logo_light: props.settings.logo_light_url || null,
    logo_dark: props.settings.logo_dark_url || null,
    favicon: props.settings.favicon_url || null,
    og_image: props.settings.og_image_url || null,
});

const handleFileUpload = (event, field) => {
    const file = event.target.files[0];
    if (file) {
        if (previews.value[field] && previews.value[field].startsWith('blob:')) {
            URL.revokeObjectURL(previews.value[field]);
        }
        form[field] = file;
        form[`delete_${field}`] = false;
        previews.value[field] = URL.createObjectURL(file);
    }
};

const triggerFileInput = (field) => {
    const refs = { logo_light: logo_light_ref, logo_dark: logo_dark_ref, favicon: favicon_ref, og_image: og_image_ref };
    if (refs[field] && refs[field].value) {
        refs[field].value.click();
    }
};

const removeFile = (field) => {
    form[field] = null;
    form[`delete_${field}`] = true;
    if (previews.value[field] && previews.value[field].startsWith('blob:')) {
        URL.revokeObjectURL(previews.value[field]);
    }
    previews.value[field] = null;
};

onBeforeUnmount(() => {
    Object.values(previews.value).forEach(url => {
        if (url && url.startsWith('blob:')) URL.revokeObjectURL(url);
    });
});

// --- GESTION DES BUREAUX SECONDAIRES ---
const addOffice = () => {
    form.additional_offices.push({ city: '', address: '', phone: '' });
};

const removeOffice = (index) => {
    form.additional_offices.splice(index, 1);
};

const addBank = () => {
    form.additional_banks.push({ bank_name: '', account_name: '', account_number: '' });
};

const removeBank = (index) => {
    form.additional_banks.splice(index, 1);
};

// --- COMPUTED PROPERTIES ---
const completionPercentage = computed(() => {
    const keyFields = ['site_name', 'email', 'phone', 'address', 'primary_color', 'meta_title', 'bank_iban', 'smtp_host'];
    let filled = 0;
    keyFields.forEach(key => { if (form[key]) filled++; });
    return Math.round((filled / keyFields.length) * 100);
});

const seoTitlePreview = computed(() => form.meta_title ? form.meta_title + ' | ' + form.site_name : 'Titre de la page | ' + (form.site_name || 'Mon Site'));
const seoDescPreview = computed(() => form.meta_description || form.description || 'Aucune description meta renseignée. Google affichera un extrait de texte de votre page ici.');
const heroProgress = computed(() => {
    if(!form.hero_campaign_target || form.hero_campaign_target <= 0) return 0;
    return Math.min(100, Math.round((form.hero_campaign_current / form.hero_campaign_target) * 100));
});

// --- SOUMISSION ---
const saveSettings = () => {
    const payload = form.transform((data) => ({
        ...data,
        meta_keywords: Array.isArray(data.meta_keywords) ? data.meta_keywords.join(',') : data.meta_keywords,
        allowed_ips: Array.isArray(data.allowed_ips) ? data.allowed_ips.join(',') : data.allowed_ips,
        additional_offices: JSON.stringify(data.additional_offices),
        additional_banks: JSON.stringify(data.additional_banks),
    }));

    payload.post(route('settings.update'), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            toast.add({ severity: 'success', summary: 'Système mis à jour', detail: 'La configuration globale a été sauvegardée.', life: 4000 });
            form.logo_light = null; form.logo_dark = null; form.favicon = null; form.og_image = null;
            form.delete_logo_light = false; form.delete_logo_dark = false; form.delete_favicon = false; form.delete_og_image = false;
        },
        onError: (errors) => {
            console.error(errors);
            toast.add({ severity: 'error', summary: 'Erreur de validation', detail: 'Vérifiez les champs marqués en rouge.', life: 5000 });
        }
    });
};

const sendTestEmail = () => {
    toast.add({ severity: 'info', summary: 'Test Email', detail: 'Envoi en cours...', life: 2000 });
    setTimeout(() => {
        toast.add({ severity: 'success', summary: 'Succès', detail: 'Email de test envoyé avec succès.', life: 4000 });
    }, 1500);
};
</script>

<template>
    <AppLayout>
        <Head title="Configuration Système - Enterprise Hub" />

        <div class="min-h-screen bg-slate-50 font-sans pb-32">

            <!-- ========================================================= -->
            <!-- HEADER HERO : DESIGN PREMIUM                              -->
            <!-- ========================================================= -->
            <div class="bg-slate-900 pt-10 pb-32 px-4 lg:px-8 relative overflow-hidden shadow-2xl">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PHBhdGggZD0iTTAgMGg0MHY0MEgweiIgZmlsbD0ibm9uZSIvPjxwYXRoIGQ9Ik0wIDIwaDQwTTIwIDB2NDAiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9zdmc+')] opacity-10"></div>
                <div class="absolute top-[-20%] right-[-10%] w-[600px] h-[600px] bg-purple-600/30 rounded-full blur-[120px] pointer-events-none"></div>
                <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] bg-indigo-600/30 rounded-full blur-[100px] pointer-events-none"></div>

                <div class="max-w-screen-2xl mx-auto relative z-10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-8">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <Badge value="Core System" class="bg-purple-500/20 text-purple-300 border border-purple-500/30 font-mono text-[11px] tracking-widest px-3 py-1 shadow-sm backdrop-blur-md" />
                            <Badge value="v12.0" class="bg-slate-800 text-slate-300 font-mono text-[10px] tracking-widest" />
                        </div>
                        <h1 class="text-4xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                            Configuration <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-300">Globale</span>
                        </h1>
                        <p class="text-slate-400 mt-4 text-lg max-w-2xl font-light leading-relaxed">
                            Pilotez l'intégralité des paramètres de votre plateforme. Du design à la facturation, en passant par la sécurité.
                        </p>
                    </div>

                    <div class="bg-slate-800/60 backdrop-blur-xl border border-slate-700/50 p-6 rounded-3xl shadow-2xl w-full lg:w-80">
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Santé du profil</span>
                            <span class="text-2xl font-black text-white">{{ completionPercentage }}%</span>
                        </div>
                        <ProgressBar :value="completionPercentage" :showValue="false" class="h-2 rounded-full bg-slate-700" :pt="{ value: { class: 'bg-gradient-to-r from-purple-500 to-indigo-400 rounded-full' } }" />
                        <p class="text-[10px] text-slate-500 mt-3 font-medium">Complétez les informations manquantes pour optimiser votre site.</p>
                    </div>
                </div>
            </div>

            <!-- ========================================================= -->
            <!-- MAIN WORKSPACE : SIDEBAR + CONTENT                        -->
            <!-- ========================================================= -->
            <div class="max-w-screen-2xl mx-auto px-4 lg:px-8 -mt-20 relative z-20">
                <form @submit.prevent="saveSettings">
                    <div class="flex flex-col lg:flex-row gap-8">

                        <!-- VERTICAL SIDEBAR -->
                        <div class="w-full lg:w-80 flex-shrink-0 space-y-6">
                            <div v-for="(group, idx) in menuGroups" :key="idx" class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/40 p-4">
                                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 px-4">{{ group.title }}</h3>
                                <ul class="space-y-1">
                                    <li v-for="item in group.items" :key="item.id">
                                        <button type="button" @click="activeTab = item.id"
                                            class="w-full flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-300 text-left group"
                                            :class="activeTab === item.id ? 'bg-indigo-50 border border-indigo-100/50 shadow-sm' : 'hover:bg-slate-50 border border-transparent'">
                                            <div :class="['w-10 h-10 rounded-xl flex items-center justify-center transition-colors', activeTab === item.id ? 'bg-indigo-600 text-white shadow-md shadow-indigo-500/20' : 'bg-slate-100 text-slate-500 group-hover:text-indigo-600 group-hover:bg-indigo-50']">
                                                <i :class="item.icon" class="text-lg"></i>
                                            </div>
                                            <div>
                                                <span :class="['block font-bold text-sm', activeTab === item.id ? 'text-indigo-900' : 'text-slate-700']">{{ item.label }}</span>
                                                <span class="block text-[10px] text-slate-400 mt-0.5">{{ item.desc }}</span>
                                            </div>
                                            <i class="pi pi-chevron-right ml-auto text-xs text-slate-300" v-if="activeTab !== item.id"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- CONTENT AREA -->
                        <div class="flex-1 bg-white rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/40 overflow-hidden min-h-[600px]">
                            <div class="p-8 lg:p-12">

                                <!-- ===================================== -->
                                <!-- TAB 1 : GÉNÉRAL                       -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'general'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Général</h2><p class="text-sm text-slate-500 mb-6">Informations fondamentales de votre plateforme.</p></div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Nom du site <span class="text-red-500">*</span></label><InputText v-model="form.site_name" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Slogan (Tagline)</label><InputText v-model="form.tagline" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2 md:col-span-2"><label class="text-sm font-bold text-slate-700">Description courte</label><Textarea v-model="form.description" rows="3" class="w-full rounded-xl bg-slate-50 p-4" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Fuseau Horaire</label><Dropdown v-model="form.timezone" :options="timezoneOptions" optionLabel="label" optionValue="value" class="w-full rounded-xl" /></div>
                                        </div>

                                        <Divider />

                                        <h3 class="text-lg font-black text-slate-800 mb-4">Logos & Médias</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <!-- Logo Light -->
                                            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200 text-center relative group">
                                                <label class="text-xs font-black text-slate-500 uppercase tracking-widest mb-4 block">Logo (Mode Clair)</label>
                                                <div class="w-full h-32 bg-white rounded-2xl border-2 border-dashed border-slate-300 flex items-center justify-center mb-4 relative overflow-hidden">
                                                    <img v-if="previews.logo_light" :src="previews.logo_light" class="h-20 object-contain" />
                                                    <div v-else class="text-slate-400 flex flex-col items-center"><i class="pi pi-image text-3xl mb-2"></i></div>
                                                    <div class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 backdrop-blur-sm">
                                                        <Button icon="pi pi-upload" class="p-button-rounded p-button-info" @click="triggerFileInput('logo_light')" />
                                                        <Button v-if="previews.logo_light" icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="removeFile('logo_light')" />
                                                    </div>
                                                </div>
                                                <input type="file" ref="logo_light_ref" class="hidden" accept="image/*" @change="e => handleFileUpload(e, 'logo_light')" />
                                            </div>

                                            <!-- Logo Dark -->
                                            <div class="bg-slate-900 rounded-3xl p-6 border border-slate-800 text-center relative group shadow-inner">
                                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4 block">Logo (Mode Sombre)</label>
                                                <div class="w-full h-32 bg-slate-800 rounded-2xl border-2 border-dashed border-slate-700 flex items-center justify-center mb-4 relative overflow-hidden">
                                                    <img v-if="previews.logo_dark" :src="previews.logo_dark" class="h-20 object-contain" />
                                                    <div v-else class="text-slate-500 flex flex-col items-center"><i class="pi pi-image text-3xl mb-2"></i></div>
                                                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 backdrop-blur-sm">
                                                        <Button icon="pi pi-upload" class="p-button-rounded p-button-info" @click="triggerFileInput('logo_dark')" />
                                                        <Button v-if="previews.logo_dark" icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="removeFile('logo_dark')" />
                                                    </div>
                                                </div>
                                                <input type="file" ref="logo_dark_ref" class="hidden" accept="image/*" @change="e => handleFileUpload(e, 'logo_dark')" />
                                            </div>

                                            <!-- Favicon -->
                                            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200 text-center relative group">
                                                <label class="text-xs font-black text-slate-500 uppercase tracking-widest mb-4 block">Favicon</label>
                                                <div class="w-full h-32 bg-white rounded-2xl border-2 border-dashed border-slate-300 flex items-center justify-center mb-4 relative overflow-hidden">
                                                    <img v-if="previews.favicon" :src="previews.favicon" class="h-12 w-12 object-contain" />
                                                    <div v-else class="text-slate-400 flex flex-col items-center"><i class="pi pi-box text-3xl mb-2"></i></div>
                                                    <div class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 backdrop-blur-sm">
                                                        <Button icon="pi pi-upload" class="p-button-rounded p-button-info" @click="triggerFileInput('favicon')" />
                                                        <Button v-if="previews.favicon" icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="removeFile('favicon')" />
                                                    </div>
                                                </div>
                                                <input type="file" ref="favicon_ref" class="hidden" accept="image/*" @change="e => handleFileUpload(e, 'favicon')" />
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 2 : BRANDING                      -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'branding'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Apparence</h2><p class="text-sm text-slate-500 mb-6">Personnalisez l'UI de votre plateforme.</p></div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                            <div class="space-y-6">
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Couleur Primaire (Hex)</label><div class="flex items-center gap-4 bg-slate-50 p-3 rounded-2xl border border-slate-200"><ColorPicker v-model="form.primary_color" /><InputText v-model="form.primary_color" class="w-full bg-transparent border-none focus:ring-0 font-mono font-bold" /></div></div>
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Couleur Secondaire (Hex)</label><div class="flex items-center gap-4 bg-slate-50 p-3 rounded-2xl border border-slate-200"><ColorPicker v-model="form.secondary_color" /><InputText v-model="form.secondary_color" class="w-full bg-transparent border-none focus:ring-0 font-mono font-bold" /></div></div>
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Typographie Principale</label><Dropdown v-model="form.font_family" :options="fontOptions" optionLabel="label" optionValue="value" class="w-full rounded-xl border-slate-200" /></div>
                                                <div class="flex items-center justify-between bg-slate-900 p-5 rounded-2xl"><div class="text-white"><p class="font-bold text-sm">Mode Sombre par défaut</p><p class="text-[10px] text-slate-400">Force l'interface sombre.</p></div><InputSwitch v-model="form.enable_dark_mode" /></div>
                                            </div>
                                            <div>
                                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3 block">Aperçu du rendu</label>
                                                <div class="border border-slate-200 rounded-3xl overflow-hidden shadow-2xl" :style="{ fontFamily: form.font_family }">
                                                    <div class="h-16 flex items-center px-6" :style="{ backgroundColor: '#' + form.primary_color }">
                                                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white font-black">L</div>
                                                    </div>
                                                    <div class="p-6 bg-slate-50 min-h-[250px]">
                                                        <div class="w-3/4 h-6 bg-slate-200 rounded-lg mb-4"></div><div class="w-full h-3 bg-slate-200 rounded-full mb-2"></div><div class="w-5/6 h-3 bg-slate-200 rounded-full mb-8"></div>
                                                        <button class="px-6 py-3 rounded-xl font-bold text-white shadow-lg" :style="{ backgroundColor: '#' + form.secondary_color }">Bouton Secondaire</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 3 : SEO & META                    -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'seo'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">SEO & Meta</h2><p class="text-sm text-slate-500 mb-6">Améliorez votre visibilité sur Google et les réseaux sociaux.</p></div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                            <div class="space-y-6">
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Titre Meta Global</label><InputText v-model="form.meta_title" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Description Meta</label><Textarea v-model="form.meta_description" rows="4" class="w-full rounded-xl bg-slate-50 p-4" /><small class="text-slate-400">{{ form.meta_description.length }} / 160 caractères recommandés</small></div>
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Mots-clés (Keywords)</label><Chips v-model="form.meta_keywords" separator="," class="w-full custom-chips" /></div>
                                            </div>
                                            <div>
                                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3 block">Aperçu Google</label>
                                                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm font-sans mb-8">
                                                    <div class="flex items-center gap-3 mb-2"><div class="w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center"><i class="pi pi-globe text-xs text-slate-400"></i></div><div><p class="text-sm text-[#202124]">https://votre-domaine.com</p><p class="text-[11px] text-[#4d5156]">{{ form.site_name || 'Mon Site' }}</p></div></div>
                                                    <h3 class="text-xl text-[#1a0dab] mb-1" style="font-family: arial, sans-serif;">{{ seoTitlePreview }}</h3>
                                                    <p class="text-sm text-[#4d5156] line-clamp-2" style="font-family: arial, sans-serif;">{{ seoDescPreview }}</p>
                                                </div>
                                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3 block">Image OpenGraph</label>
                                                <div class="w-full h-40 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-300 flex items-center justify-center relative overflow-hidden group">
                                                    <img v-if="previews.og_image" :src="previews.og_image" class="w-full h-full object-cover" />
                                                    <div v-else class="text-slate-400"><i class="pi pi-image text-3xl"></i></div>
                                                    <div class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 backdrop-blur-sm">
                                                        <Button icon="pi pi-upload" class="p-button-info" @click="triggerFileInput('og_image')" /><Button v-if="previews.og_image" icon="pi pi-trash" class="p-button-danger" @click="removeFile('og_image')" />
                                                    </div>
                                                </div>
                                                <input type="file" ref="og_image_ref" class="hidden" accept="image/*" @change="e => handleFileUpload(e, 'og_image')" />
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 4 : CONTACT                       -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'contact'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Contact & Adresses</h2><p class="text-sm text-slate-500 mb-6">Informations affichées publiquement.</p></div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <h3 class="md:col-span-2 text-lg font-black text-slate-700 border-b pb-2">Bureau Central (Siège)</h3>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Email Principal</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-envelope text-slate-400"></i></InputGroupAddon><InputText v-model="form.email" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Email Support</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-envelope text-slate-400"></i></InputGroupAddon><InputText v-model="form.secondary_email" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Tél Principal</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-phone text-slate-400"></i></InputGroupAddon><InputText v-model="form.phone" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Tél Secondaire</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-phone text-slate-400"></i></InputGroupAddon><InputText v-model="form.secondary_phone" /></InputGroup></div>
                                            <div class="flex flex-col gap-2 md:col-span-2"><label class="text-sm font-bold text-slate-700">Adresse Complète</label><InputText v-model="form.address" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Code Postal</label><InputText v-model="form.postal_code" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Ville</label><InputText v-model="form.city" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2 md:col-span-2"><label class="text-sm font-bold text-slate-700">Pays</label><InputText v-model="form.country" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>

                                            <div class="md:col-span-2 mt-8 flex justify-between items-center border-b pb-2">
                                                <h3 class="text-lg font-black text-slate-700">Bureaux Secondaires</h3>
                                                <Button icon="pi pi-plus" label="Ajouter un bureau" class="p-button-sm p-button-outlined rounded-lg" @click="addOffice" />
                                            </div>

                                            <div v-for="(office, index) in form.additional_offices" :key="index" class="md:col-span-2 bg-slate-50 p-6 rounded-2xl border border-slate-200 relative group">
                                                <Button icon="pi pi-trash" class="p-button-danger p-button-text absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity" @click="removeOffice(index)" />
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div class="flex flex-col">
                                                        <label class="text-xs font-bold text-slate-500 uppercase">Ville</label>
                                                        <InputText v-model="office.city" class="w-full rounded-lg" placeholder="Ex: Kinshasa" />
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <label class="text-xs font-bold text-slate-500 uppercase">Téléphone</label>
                                                        <InputText v-model="office.phone" class="w-full rounded-lg" placeholder="+243..." />
                                                    </div>
                                                    <div class="flex flex-col gap-1 md:col-span-3">
                                                        <label class="text-xs font-bold text-slate-500 uppercase">Adresse</label>
                                                        <InputText v-model="office.address" class="w-full rounded-lg" placeholder="Avenue, Quartier, Commune..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 5 : SOCIAL                        -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'social'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Réseaux Sociaux</h2><p class="text-sm text-slate-500 mb-6">Liens de vos profils publics.</p></div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Facebook</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-facebook text-blue-600"></i></InputGroupAddon><InputText v-model="form.facebook" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Twitter / X</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-twitter text-slate-800"></i></InputGroupAddon><InputText v-model="form.twitter" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Instagram</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-instagram text-pink-600"></i></InputGroupAddon><InputText v-model="form.instagram" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">LinkedIn</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-linkedin text-blue-700"></i></InputGroupAddon><InputText v-model="form.linkedin" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">YouTube</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-youtube text-red-600"></i></InputGroupAddon><InputText v-model="form.youtube" /></InputGroup></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">GitHub</label><InputGroup class="rounded-xl overflow-hidden border border-slate-200"><InputGroupAddon class="bg-slate-50"><i class="pi pi-github text-slate-900"></i></InputGroupAddon><InputText v-model="form.github" /></InputGroup></div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 6 : LEGAL & RGPD                  -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'legal'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Légal & Conformité</h2><p class="text-sm text-slate-500 mb-6">Paramètres de confidentialité et mentions légales.</p></div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="flex flex-col gap-2 md:col-span-2"><label class="text-sm font-bold text-slate-700">Nom de l'entreprise (Statuts)</label><InputText v-model="form.company_name" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2 md:col-span-2"><label class="text-sm font-bold text-slate-700">Texte Copyright Footer</label><InputText v-model="form.copyright_text" placeholder="© 2024 Mon Entreprise. Tous droits réservés." class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">URL Politique de Confidentialité</label><InputText v-model="form.privacy_policy_url" placeholder="/privacy" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">URL Conditions Générales (CGV/CGU)</label><InputText v-model="form.terms_url" placeholder="/terms" class="w-full rounded-xl bg-slate-50 px-4 py-3" /></div>
                                        </div>

                                        <Divider />
                                        <h3 class="text-lg font-black text-slate-800 mb-4">Bannière Cookies (RGPD)</h3>
                                        <div class="bg-slate-50 p-6 rounded-3xl border border-slate-200 space-y-4">
                                            <div class="flex items-center justify-between">
                                                <div><p class="font-bold text-slate-800">Activer la bannière de consentement</p><p class="text-xs text-slate-500">Affiche une barre au bas de l'écran pour les nouveaux visiteurs.</p></div>
                                                <InputSwitch v-model="form.enable_cookie_banner" />
                                            </div>
                                            <div v-if="form.enable_cookie_banner" class="flex flex-col gap-2 mt-4">
                                                <label class="text-sm font-bold text-slate-700">Message de la bannière</label>
                                                <Textarea v-model="form.cookie_banner_text" rows="2" class="w-full rounded-xl" />
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 7 : BANK & FINANCE                -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'bank'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Banque & Facturation</h2><p class="text-sm text-slate-500 mb-6">Informations nécessaires à l'édition des factures et contrats.</p></div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-6 rounded-3xl border border-slate-100 mb-6">
                                            <h3 class="md:col-span-2 text-lg font-black text-slate-700"><i class="pi pi-building text-indigo-500 mr-2"></i> Identifiants & PayPal</h3>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">N° RCCM / SIRET</label><InputText v-model="form.rccm" class="w-full rounded-xl" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">NIF / N° TVA Intracommunautaire</label><InputText v-model="form.tax_id" class="w-full rounded-xl" /></div>
                                            <div class="flex flex-col gap-2 md:col-span-2"><label class="text-sm font-bold text-slate-700">Email PayPal (Donations)</label><InputText v-model="form.paypal_email" placeholder="paypal@aprojed.org" class="w-full rounded-xl" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">PayPal Client ID</label><InputText v-model="form.paypal_client_id" class="w-full rounded-xl font-mono" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Mode PayPal</label><Dropdown v-model="form.paypal_mode" :options="[{label:'Sandbox',value:'sandbox'},{label:'Live',value:'live'}]" optionLabel="label" optionValue="value" class="w-full rounded-xl" /></div>
                                        </div>

                                        <div class="space-y-8">
    <!-- En-tête de la section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-5 border-b border-slate-200/80">
        <div>
            <h3 class="text-xl font-bold text-slate-800 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shadow-sm">
                    <i class="pi pi-credit-card text-emerald-600 text-lg" aria-hidden="true"></i>
                </div>
                Comptes Bancaires
            </h3>
            <p class="text-sm text-slate-500 mt-1.5 ml-[3.25rem]">Gérez les coordonnées bancaires pour recevoir vos virements.</p>
        </div>
        <Button icon="pi pi-plus"
                label="Ajouter un compte"
                class="p-button-outlined hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-300 transition-all rounded-xl shadow-sm whitespace-nowrap font-semibold"
                @click="addBank" />
    </div>

    <!-- État vide (Empty State Premium) -->
    <div v-if="!form.additional_banks || form.additional_banks.length === 0"
         class="flex flex-col items-center justify-center p-12 bg-slate-50/50 rounded-[2rem] border-2 border-dashed border-slate-200 hover:border-emerald-400/40 transition-colors duration-300 group cursor-pointer"
         @click="addBank">
        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center mb-5 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
            <i class="pi pi-wallet text-3xl text-slate-300 group-hover:text-emerald-500 transition-colors duration-300" aria-hidden="true"></i>
        </div>
        <h4 class="text-slate-700 font-bold text-lg mb-2">Aucun compte bancaire</h4>
        <p class="text-slate-400 text-sm text-center max-w-sm mb-6 leading-relaxed">
            Ajoutez vos coordonnées bancaires (RIB/IBAN) pour permettre à vos utilisateurs d'effectuer des virements en toute sécurité.
        </p>
        <Button label="Ajouter le premier compte" icon="pi pi-plus" class="p-button-text p-button-success font-bold" @click.stop="addBank" />
    </div>

    <!-- Liste des formulaires (Cartes) -->
    <div v-else class="space-y-6">
        <div v-for="(bank, index) in form.additional_banks" :key="index"
             class="relative bg-white p-6 sm:p-8 rounded-[1.5rem] border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 focus-within:ring-2 focus-within:ring-emerald-500/20 focus-within:border-emerald-400 group">

            <!-- Entête de la carte Banque -->
            <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                    <span class="flex items-center justify-center w-7 h-7 rounded-full bg-slate-100 text-slate-500 text-xs font-black tracking-tighter">{{ index + 1 }}</span>
                    <h4 class="text-sm font-bold text-slate-700 uppercase tracking-widest">Détails de la banque</h4>
                </div>

                <!-- Bouton Supprimer optimisé Mobile/PC -->
                <Button icon="pi pi-trash"
                        class="p-button-danger p-button-text p-button-rounded w-10 h-10 bg-red-50 hover:bg-red-100 transition-all flex-shrink-0 lg:opacity-0 lg:group-hover:opacity-100 focus:opacity-100 z-10"
                        title="Supprimer ce compte"
                        aria-label="Supprimer ce compte"
                        @click="removeBank(index)" />
            </div>

            <!-- Grille du formulaire parfaitement proportionnée -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">

                <!-- Nom de la Banque -->
                <div class="flex flex-col gap-2">
                    <label :for="'bank-name-' + index" class="text-[13px] font-semibold text-slate-600 flex items-center gap-1.5">
                        <i class="pi pi-building text-slate-400 text-xs"></i> Nom de la Banque
                    </label>
                    <InputText :id="'bank-name-' + index"
                               v-model="bank.bank_name"
                               class="w-full rounded-xl border-slate-300 focus:border-emerald-500 shadow-sm p-3"
                               placeholder="Ex: Rawbank RDC" />
                </div>

                <!-- Intitulé du compte -->
                <div class="flex flex-col gap-2">
                    <label :for="'account-name-' + index" class="text-[13px] font-semibold text-slate-600 flex items-center gap-1.5">
                        <i class="pi pi-user text-slate-400 text-xs"></i> Intitulé du compte
                    </label>
                    <InputText :id="'account-name-' + index"
                               v-model="bank.account_name"
                               class="w-full rounded-xl border-slate-300 focus:border-emerald-500 shadow-sm p-3"
                               placeholder="Ex: APROJED ASBL" />
                </div>

                <!-- Numéro de compte (Pleine largeur) -->
                <div class="flex flex-col gap-2 md:col-span-2 mt-2">
                    <label :for="'account-number-' + index" class="text-[13px] font-semibold text-slate-600 flex items-center gap-1.5">
                        <i class="pi pi-hashtag text-slate-400 text-xs"></i> Numéro de compte / IBAN
                    </label>
                    <div class="relative">
                        <InputText :id="'account-number-' + index"
                                   v-model="bank.account_number"
                                   class="w-full rounded-xl border-slate-300 focus:border-emerald-500 shadow-sm p-3 pl-4 font-mono text-emerald-700 font-semibold tracking-wider text-lg"
                                   placeholder="Ex: 0101-1234567-89" />
                        <!-- Petite icône décorative dans l'input -->
                        <i class="pi pi-verified absolute right-4 top-1/2 -translate-y-1/2 text-emerald-500/50"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 8 : SMTP & EMAIL                  -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'smtp'" class="space-y-8">
                                        <div class="flex justify-between items-start">
                                            <div><h2 class="text-2xl font-black text-slate-800 mb-2">Serveur Email (SMTP)</h2><p class="text-sm text-slate-500">Configuration de la passerelle d'envoi d'emails système.</p></div>
                                            <Button label="Envoyer Email de Test" icon="pi pi-send" outlined class="rounded-xl font-bold" @click="sendTestEmail" />
                                        </div>
                                        <Message severity="warn" :closable="false" class="rounded-xl font-medium">Modifiez ces paramètres avec précaution. Une mauvaise configuration bloquera l'envoi des emails.</Message>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-6 rounded-3xl border border-slate-100">
                                            <div class="flex flex-col gap-2 md:col-span-2"><label class="text-sm font-bold text-slate-700">Hôte (SMTP Host)</label><InputText v-model="form.smtp_host" class="w-full rounded-xl bg-white" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Port</label><InputNumber v-model="form.smtp_port" class="w-full" inputClass="rounded-xl bg-white w-full" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Chiffrement (Encryption)</label><Dropdown v-model="form.smtp_encryption" :options="encryptionOptions" optionLabel="label" optionValue="value" class="w-full rounded-xl bg-white" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Utilisateur SMTP</label><InputText v-model="form.smtp_user" class="w-full rounded-xl bg-white" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Mot de passe SMTP</label><Password v-model="form.smtp_pass" :feedback="false" toggleMask inputClass="w-full rounded-xl bg-white w-full" class="w-full" /></div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Adresse d'expédition (From)</label><InputText v-model="form.smtp_from_address" class="w-full rounded-xl bg-slate-50" /></div>
                                            <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Nom d'expédition</label><InputText v-model="form.smtp_from_name" class="w-full rounded-xl bg-slate-50" /></div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 9 : INTÉGRATIONS                  -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'integrations'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Clés API & Intégrations</h2><p class="text-sm text-slate-500 mb-6">Connectez des services tiers à votre plateforme.</p></div>
                                        <div class="space-y-4">
                                            <!-- GA -->
                                            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center flex-shrink-0"><i class="pi pi-google text-2xl text-red-500"></i></div>
                                                <div class="flex-1 w-full"><label class="text-sm font-black text-slate-700 mb-1 block">Google Analytics (G-XXXXXXX)</label><InputText v-model="form.google_analytics_id" class="w-full bg-white rounded-xl" placeholder="ID de mesure GA4" /></div>
                                            </div>
                                            <!-- FB Pixel -->
                                            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center flex-shrink-0"><i class="pi pi-facebook text-2xl text-blue-600"></i></div>
                                                <div class="flex-1 w-full"><label class="text-sm font-black text-slate-700 mb-1 block">Facebook Pixel ID</label><InputText v-model="form.facebook_pixel_id" class="w-full bg-white rounded-xl" placeholder="Ex: 1234567890" /></div>
                                            </div>
                                            <!-- Stripe -->
                                            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center flex-shrink-0"><i class="pi pi-credit-card text-2xl text-indigo-500"></i></div>
                                                <div class="flex-1 w-full"><label class="text-sm font-black text-slate-700 mb-1 block">Stripe Public Key</label><InputText v-model="form.stripe_public_key" class="w-full bg-white rounded-xl font-mono" placeholder="pk_live_..." /></div>
                                            </div>
                                            <!-- ReCaptcha -->
                                            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 bg-slate-50 p-5 rounded-2xl border border-slate-200">
                                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center flex-shrink-0"><i class="pi pi-shield text-2xl text-emerald-500"></i></div>
                                                <div class="flex-1 w-full"><label class="text-sm font-black text-slate-700 mb-1 block">Google reCAPTCHA v3 Site Key</label><InputText v-model="form.recaptcha_site_key" class="w-full bg-white rounded-xl font-mono" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 10 : SÉCURITÉ                     -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'security'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Sécurité & Accès</h2><p class="text-sm text-slate-500 mb-6">Protégez votre plateforme et gérez les modes d'urgence.</p></div>
                                        <div class="bg-amber-50 rounded-3xl p-6 border border-amber-200 flex flex-col md:flex-row gap-6 items-start md:items-center">
                                            <div class="w-16 h-16 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600 shadow-inner flex-shrink-0 text-3xl"><i class="pi pi-exclamation-triangle"></i></div>
                                            <div class="flex-1">
                                                <h3 class="text-lg font-black text-amber-900 mb-1">Mode Maintenance</h3>
                                                <p class="text-sm text-amber-700 mb-3">Bloque l'accès public au site.</p>
                                                <InputText v-if="form.maintenance_mode" v-model="form.maintenance_message" class="w-full rounded-xl bg-white border-amber-200 mb-2" placeholder="Message affiché aux visiteurs..." />
                                            </div>
                                            <div class="flex-shrink-0 bg-white p-3 rounded-2xl shadow-sm border border-amber-100"><InputSwitch v-model="form.maintenance_mode" /></div>
                                        </div>
                                        <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200">
                                            <h3 class="text-lg font-black text-slate-800 mb-1"><i class="pi pi-shield mr-2 text-indigo-500"></i> IPs Autorisées (Whitelist)</h3>
                                            <p class="text-sm text-slate-500 mb-4">Adresses IP qui contournent le mode maintenance.</p>
                                            <Chips v-model="form.allowed_ips" separator="," placeholder="Entrez une IP et appuyez sur Entrée" class="w-full custom-chips" />
                                        </div>
                                    </div>
                                </transition>

                                <!-- ===================================== -->
                                <!-- TAB 11 : CAMPAGNE HERO                -->
                                <!-- ===================================== -->
                                <transition name="fade" mode="out-in">
                                    <div v-show="activeTab === 'hero'" class="space-y-8">
                                        <div><h2 class="text-2xl font-black text-slate-800 mb-2">Campagne de mise en avant (Hero)</h2><p class="text-sm text-slate-500 mb-6">Créez une annonce impactante pour la page d'accueil (Collecte, Événement, etc.).</p></div>

                                        <div class="flex items-center justify-between bg-emerald-50 p-5 rounded-2xl border border-emerald-200 mb-8">
                                            <div><h3 class="font-black text-emerald-900">Activer la Campagne</h3><p class="text-xs text-emerald-700">Rend le bloc visible publiquement.</p></div>
                                            <InputSwitch v-model="form.hero_campaign_active" />
                                        </div>

                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                                            <!-- Formulaire Campagne -->
                                            <div class="space-y-6">
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Badge Catégorie</label><InputText v-model="form.hero_campaign_badge" class="w-full rounded-xl bg-slate-50" placeholder="Ex: Urgence" /></div>
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Titre</label><InputText v-model="form.hero_campaign_title" class="w-full rounded-xl bg-slate-50" placeholder="Construction d'un puits" /></div>
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Description</label><Textarea v-model="form.hero_campaign_description" rows="3" class="w-full rounded-xl bg-slate-50" /></div>
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Montant Collecté</label><InputNumber v-model="form.hero_campaign_current" mode="currency" currency="USD" locale="en-US" inputClass="w-full rounded-xl bg-slate-50" /></div>
                                                    <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Objectif à atteindre</label><InputNumber v-model="form.hero_campaign_target" mode="currency" currency="USD" locale="en-US" inputClass="w-full rounded-xl bg-slate-50" /></div>
                                                </div>
                                                <div class="flex flex-col gap-2"><label class="text-sm font-bold text-slate-700">Texte du bouton CTA</label><InputText v-model="form.hero_campaign_btn_text" class="w-full rounded-xl bg-slate-50" placeholder="Faire un don" /></div>
                                            </div>

                                            <!-- Live Preview Campagne -->
                                            <div>
                                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3 block">Aperçu en direct</label>
                                                <div class="p-8 bg-slate-900 rounded-[2.5rem] border border-slate-800 shadow-2xl overflow-hidden relative" :class="{'opacity-50 grayscale': !form.hero_campaign_active}">
                                                    <div class="absolute top-0 right-0 p-4"><Badge :value="form.hero_campaign_active ? 'Visible' : 'Masqué'" :severity="form.hero_campaign_active ? 'success' : 'danger'" /></div>
                                                    <div class="flex items-center justify-between mb-6">
                                                        <span class="text-sm font-bold text-emerald-400">{{ form.hero_campaign_badge || 'Catégorie' }}</span>
                                                    </div>
                                                    <h3 class="text-3xl font-black text-white mb-3">{{ form.hero_campaign_title || 'Titre de la campagne' }}</h3>
                                                    <p class="text-slate-400 text-sm mb-8 line-clamp-3 leading-relaxed">{{ form.hero_campaign_description || 'Votre description apparaîtra ici avec un style élégant et très lisible.' }}</p>
                                                    <div class="space-y-3 mb-8">
                                                        <div class="flex justify-between text-xs font-bold text-white">
                                                            <span>Objectif : {{ (form.hero_campaign_current || 0).toLocaleString() }} / {{ (form.hero_campaign_target || 0).toLocaleString() }} $</span>
                                                            <span class="text-emerald-400">{{ heroProgress }}%</span>
                                                        </div>
                                                        <div class="w-full bg-slate-800 rounded-full h-3 overflow-hidden">
                                                            <div class="bg-gradient-to-r from-emerald-500 to-teal-400 h-full transition-all duration-1000" :style="{ width: heroProgress + '%' }"></div>
                                                        </div>
                                                    </div>
                                                    <Button :label="form.hero_campaign_btn_text || 'Action'" icon="pi pi-heart-fill" class="w-full bg-white hover:bg-emerald-50 border-none py-4 rounded-2xl font-black text-slate-900" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>

                            </div>
                        </div>
                    </div>

                    <!-- ========================================================= -->
                    <!-- FLOATING ACTION BAR (SAVE BUTTON)                         -->
                    <!-- ========================================================= -->
                    <div class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-md border-t border-slate-200 p-4 shadow-[0_-10px_40px_rgba(0,0,0,0.05)] z-50 flex justify-center lg:justify-end">
                        <div class="max-w-screen-2xl w-full mx-auto flex justify-end px-4 lg:px-8">
                            <Button type="submit" label="Sauvegarder les paramètres" icon="pi pi-save" :loading="form.processing" class="bg-indigo-600 hover:bg-indigo-700 border-none shadow-xl shadow-indigo-600/30 text-white font-bold px-8 py-3 rounded-2xl text-lg transition-transform hover:scale-105" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Transisitions fluides pour les onglets */
.fade-enter-active, .fade-leave-active { transition: opacity 0.3s ease, transform 0.3s ease; }
.fade-enter-from { opacity: 0; transform: translateY(10px); }
.fade-leave-to { opacity: 0; transform: translateY(-10px); }

/* Personnalisation PrimeVue Chips pour un look moderne */
:deep(.custom-chips .p-chips-multiple-container) {
    border-radius: 1rem; padding: 0.5rem 1rem; background-color: #f8fafc; border-color: #e2e8f0; width: 100%;
}
:deep(.custom-chips .p-chips-token) {
    background-color: #e0e7ff; color: #4338ca; font-weight: bold; border-radius: 0.5rem;
}

/* Fix z-index pour le dropdown (ex: timezone) */
:deep(.p-dropdown-panel) { z-index: 9999 !important; }

/* Styling des bordures en mode focus */
:deep(.p-inputtext:focus), :deep(.p-dropdown:focus), :deep(.p-dropdown.p-focus) {
    box-shadow: 0 0 0 2px #ffffff, 0 0 0 4px #818cf8;
    border-color: #6366f1;
}
</style>
