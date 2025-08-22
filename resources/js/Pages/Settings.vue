<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
  settings: Object,
});

const form = useForm({
  _method: 'POST', // Inertia utilise POST pour les requêtes PUT/PATCH avec upload de fichier
  phone_number: props.settings.phone_number,
  email: props.settings.email,
  address: props.settings.address,
  facebook_url: props.settings.facebook_url,
  instagram_url: props.settings.instagram_url,
  twitter_url: props.settings.twitter_url,
  home_cover_photo: null,
});

const submit = () => {
    form.put(route('settings.update', props.settings), {
        onError: (errors) => {
            console.log(errors);
        },
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
                <div class="overflow-hidden bg-white p-6 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg dark:bg-gray-800">
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
    </AppLayout>
</template>
