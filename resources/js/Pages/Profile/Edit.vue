<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import { ref } from 'vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Transition } from 'vue';

const props = defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    telephone: user.telephone || '',
    address: user.address || '',
    photo: null,
});

const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }
    form.post(route('profile.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (!photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const clearPhotoFileInput = () => {
    if (photoInput.value) {
        photoInput.value.value = null;
    }
};
const getInitials = (name) => {
    if (!name) return '';
    const names = name.split(' ');
    let initials = names[0].substring(0, 1).toUpperCase();
    if (names.length > 1) {
        initials += names[names.length - 1].substring(0, 1).toUpperCase();
    }
    return initials;
};
</script>

<template>
    <Head title="Profile" />

    <AppLayout title="Profil">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">Mon Profil</h2>
        <div class="py-10">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <section class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Informations du profil</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Mettez à jour les informations de profil et l'adresse e-mail de votre compte.
                            </p>
                        </header>

                        <form @submit.prevent="updateProfileInformation" class="mt-6 space-y-6">
                            <!-- Photo -->
                            <div>
                                <InputLabel for="photo" value="Photo" />
                                <!-- Current Profile Photo -->
                                <div class="mt-2" v-show="! photoPreview">
                                    <div  class=" rounded-full object-cover" v-if="user.profile_photo_path">
                                        <img :src="`/storage/${user.profile_photo_path}`" :alt="user.name" class="h-20 w-20 rounded-full object-cover"></img>
                                    </div>
                                     <div v-else class="h-20 w-20  rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ getInitials(user.name) }}</span>
                                        </div>
                                </div>
                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" v-show="photoPreview">
                                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                          :style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </div>
                                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                                    Sélectionner une nouvelle photo
                                </SecondaryButton>
                                <input ref="photoInput" type="file" class="hidden" @change="updatePhotoPreview">
                                <InputError :message="form.errors.photo" class="mt-2" />
                            </div>

                            <!-- Name -->
                            <div>
                                <InputLabel for="name" value="Nom" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <!-- Email -->
                            <div>
                                <InputLabel for="email" value="Email" />
                                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                                <InputError class="mt-2" :message="form.errors.email" />
                                <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                        Votre adresse e-mail n'est pas vérifiée.
                                        <Link :href="route('verification.send')" method="post" as="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                            Cliquez ici pour renvoyer l'e-mail de vérification.
                                        </Link>
                                    </p>
                                    <div v-show="props.status === 'verification-link-sent'" class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                        Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
                                    </div>
                                </div>
                            </div>

                             <!-- Telephone -->
                            <div>
                                <InputLabel for="telephone" value="Téléphone" />
                                <TextInput id="telephone" type="text" class="mt-1 block w-full" v-model="form.telephone" autocomplete="tel" />
                                <InputError class="mt-2" :message="form.errors.telephone" />
                            </div>

                            <!-- Address -->
                            <div>
                                <InputLabel for="address" value="Adresse" />
                                <TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.address" autocomplete="address-line1" />
                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>

                            <!-- Role -->
                            <div>
                                <InputLabel for="role" value="Rôle" />
                                <p class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2 text-sm text-gray-500 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    {{ user.role }}
                                </p>
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Enregistrer</PrimaryButton>
                                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Enregistré.</p>
                                </Transition>
                            </div>
                        </form>
                    </section>
                </div>

                <div
                    class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div
                    class="bg-white p-4 shadow sm:rounded-lg sm:p-8"
                >
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
