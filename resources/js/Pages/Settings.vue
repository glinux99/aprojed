<script setup>
import { useForm, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import { ref, getCurrentInstance } from 'vue';

const props = defineProps({
  settings: Object,
  partners: Array,
});

const form = useForm({
  phone_number: props.settings.phone_number,
  email: props.settings.email,
  address: props.settings.address,
  facebook_url: props.settings.facebook_url,
  instagram_url: props.settings.instagram_url,
  twitter_url: props.settings.twitter_url,
  home_cover_photo: null,
});

const partnerForm = useForm({
    id: null,
    name: '',
    url: '',
    logo: null,
});

const showPartnerModal = ref(false);
const editingPartner = ref(null);

const openAddPartnerModal = () => {
    editingPartner.value = null;
    partnerForm.reset();
    showPartnerModal.value = true;
};

const openEditPartnerModal = (partner) => {
    editingPartner.value = partner;
    partnerForm.id = partner.id;
    partnerForm.name = partner.name;
    partnerForm.url = partner.url || '';
    partnerForm.logo = null;
    showPartnerModal.value = true;
};

const closePartnerModal = () => {
    showPartnerModal.value = false;
};

const submit = () => {
    router.post(route('settings.update', props.settings.id), {
        _method: 'put',
        ...form.data(),
        onSuccess: () => form.reset('home_cover_photo'),
    });
};

const submitPartner = () => {
    const url = editingPartner.value
        ? route('partners.update', editingPartner.value.id)
        : route('partners.store');

    partnerForm.post(url, {
        preserveScroll: true,
        onSuccess: () => closePartnerModal(),
    });
};

const instance = getCurrentInstance();
const deletePartner = (partnerId) => {
    instance.proxy.$swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Le partenaire sera supprimé définitivement!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, supprimer!',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('partners.destroy', partnerId), {
                preserveScroll: true,
            });
        }
    });
};
</script>

<template>
    <AppLayout title="Paramètres du site">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Paramètres du site</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">Gérez les informations générales de votre site web.</p>
            </div>
        </div>

        <div class="mt-8 flow-root">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm ring-1 ring-black ring-opacity-5 sm:rounded-lg dark:bg-gray-800">
                    <form @submit.prevent="submit">
                        <div class="space-y-8">
                            <!-- Contact Info -->
                            <div>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-white">Informations de contact</h2>
                                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-6">
                                    <div>
                                        <InputLabel for="phone_number" value="Numéro de téléphone" />
                                        <TextInput id="phone_number" v-model="form.phone_number" type="text" class="mt-1 block w-full" />
                                        <InputError class="mt-2" :message="form.errors.phone_number" />
                                    </div>
                                    <div>
                                        <InputLabel for="email" value="Adresse e-mail" />
                                        <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" />
                                        <InputError class="mt-2" :message="form.errors.email" />
                                    </div>
                                    <div class="sm:col-span-2">
                                        <InputLabel for="address" value="Adresse physique" />
                                        <TextInput id="address" v-model="form.address" type="text" class="mt-1 block w-full" />
                                        <InputError class="mt-2" :message="form.errors.address" />
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Links -->
                            <div>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-white">Réseaux sociaux</h2>
                                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-6">
                                    <div>
                                        <InputLabel for="facebook_url" value="URL Facebook" />
                                        <TextInput id="facebook_url" v-model="form.facebook_url" type="url" class="mt-1 block w-full" />
                                        <InputError class="mt-2" :message="form.errors.facebook_url" />
                                    </div>
                                    <div>
                                        <InputLabel for="instagram_url" value="URL Instagram" />
                                        <TextInput id="instagram_url" v-model="form.instagram_url" type="url" class="mt-1 block w-full" />
                                        <InputError class="mt-2" :message="form.errors.instagram_url" />
                                    </div>
                                    <div>
                                        <InputLabel for="twitter_url" value="URL Twitter" />
                                        <TextInput id="twitter_url" v-model="form.twitter_url" type="url" class="mt-1 block w-full" />
                                        <InputError class="mt-2" :message="form.errors.twitter_url" />
                                    </div>
                                </div>
                            </div>

                            <!-- Homepage Cover Photo -->
                            <div>
                                <InputLabel for="home_cover_photo" value="Photo de couverture de l'accueil" />
                                <div v-if="settings.home_cover_photo_path && !form.home_cover_photo" class="mt-2 mb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Photo actuelle :</p>
                                    <img :src="`/storage/${settings.home_cover_photo_path}`" alt="Couverture actuelle" class="mt-2 h-48 w-auto rounded-md">
                                </div>
                                <input @input="form.home_cover_photo = $event.target.files[0]" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100" class="mt-2 w-full">{{ form.progress.percentage }}%</progress>
                                <InputError class="mt-2" :message="form.errors.home_cover_photo" />
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Enregistrer</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Partners Section -->
        <div class="mt-8 flow-root">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm ring-1 ring-black ring-opacity-5 sm:rounded-lg dark:bg-gray-800">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Partenaires</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Gérez les logos de vos partenaires qui apparaissent en pied de page.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <PrimaryButton @click="openAddPartnerModal">Ajouter un partenaire</PrimaryButton>
                        </div>
                    </div>

                    <div class="mt-6">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li v-for="partner in partners" :key="partner.id" class="flex items-center justify-between py-4">
                                <div class="flex items-center">
                                    <img :src="`/storage/${partner.logo_path}`" :alt="partner.name" class="h-12 w-24 object-contain bg-gray-200 dark:bg-gray-700 p-1 rounded">
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ partner.name }}</p>
                                        <a v-if="partner.url" :href="partner.url" target="_blank" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">{{ partner.url }}</a>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <SecondaryButton @click="openEditPartnerModal(partner)" class="me-2">Modifier</SecondaryButton>
                                    <DangerButton @click="deletePartner(partner.id)">Supprimer</DangerButton>
                                </div>
                            </li>
                            <li v-if="!partners.length" class="py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                Aucun partenaire ajouté.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Partner Modal -->
        <Modal :show="showPartnerModal" @close="closePartnerModal">
            <form @submit.prevent="submitPartner" class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                    {{ editingPartner ? 'Modifier le partenaire' : 'Ajouter un nouveau partenaire' }}
                </h2>
                <div class="mt-6 space-y-6">
                    <div>
                        <InputLabel for="partner_name" value="Nom du partenaire" />
                        <TextInput id="partner_name" v-model="partnerForm.name" type="text" class="mt-1 block w-full" required />
                        <InputError :message="partnerForm.errors.name" class="mt-2" />
                    </div>
                    <div>
                        <InputLabel for="partner_url" value="URL du site web (optionnel)" />
                        <TextInput id="partner_url" v-model="partnerForm.url" type="url" class="mt-1 block w-full" />
                        <InputError :message="partnerForm.errors.url" class="mt-2" />
                    </div>
                    <div>
                        <InputLabel for="partner_logo" value="Logo" />
                        <input @input="partnerForm.logo = $event.target.files[0]" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" :required="!editingPartner" />
                        <progress v-if="partnerForm.progress" :value="partnerForm.progress.percentage" max="100" class="mt-2 w-full">{{ partnerForm.progress.percentage }}%</progress>
                        <InputError :message="partnerForm.errors.logo" class="mt-2" />
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closePartnerModal"> Annuler </SecondaryButton>
                    <PrimaryButton class="ms-3" :class="{ 'opacity-25': partnerForm.processing }" :disabled="partnerForm.processing">
                        {{ editingPartner ? 'Enregistrer' : 'Ajouter' }}
                    </PrimaryButton>
                </div>
            </form>
        </Modal>
    </AppLayout>
</template>
