

<script setup>
import { ref, watch, computed } from 'vue';
import { useForm, Link, router, usePage } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';

const props = defineProps({
    users: Object,
    roles: Object,
    filters: Object,
});

const page = usePage();
const authUser = page.props.auth.user;
const isAdmin = computed(() => authUser.role === 'admin');

const showDeleteModal = ref(false);
const userToDelete = ref(null);
const showUserModal = ref(false);
const editingUser = ref(null);
const searchTerm = ref(props.filters.search ?? '');

const form = useForm({
    id: null,
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: '',
});

const closeModal = () => {
    showDeleteModal.value = false;
    showUserModal.value = false;
};

const confirmUserDeletion = (user) => {
    userToDelete.value = user;
    showDeleteModal.value = true;
};
//ddd
const deleteUser = () => {
    if (userToDelete.value) {
        form.delete(route('users.destroy', userToDelete.value.id), {
            preserveScroll: true,
            onSuccess: () => {
                closeModal();
                alert('Utilisateur supprimé avec succès.');
            },
            onError: () => {
                closeModal();
                alert("Une erreur est survenue lors de la suppression de l'utilisateur.");
            },
        });
    }
};

const openAddUserModal = () => {
    editingUser.value = null;
    form.reset();
    showUserModal.value = true;
};

const openEditUserModal = (user) => {
    // Si l'utilisateur à modifier est l'utilisateur actuellement connecté,
    // on le redirige vers sa page de profil dédiée au lieu d'ouvrir la modale.
    if (user.id === page.props.auth.user.id) {
        router.get(route('profile.edit'));
        return;
    }

    editingUser.value = user;
    form.id = user.id;
    form.name = user.name;
    form.email = user.email;
    form.role = user.role;
    form.password = ''; // Clear password fields for editing
    form.password_confirmation = '';
    showUserModal.value = true;
};

const submitUser = () => {
    const isEditing = !!editingUser.value;
    const successMessage = isEditing ? 'Utilisateur modifié avec succès.' : 'Utilisateur ajouté avec succès.';
    const errorMessage = isEditing ? "Une erreur est survenue lors de la modification de l'utilisateur." : "Une erreur est survenue lors de l'ajout de l'utilisateur.";

    const options = {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            alert(successMessage);
        },
        onError: () => {
            alert(errorMessage);
        },
    };

    if (isEditing) {
        form.put(route('users.update', editingUser.value.id), options);
    } else {
        form.post(route('users.store'), options);
    }
};

watch(searchTerm, (value) => {
    router.get(route('users.index'), { search: value }, {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
});

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
   <AppLayout title="Utilisateurs">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Utilisateurs</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">La liste de tous les utilisateurs enregistrés.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <PrimaryButton @click="openAddUserModal">Ajouter un utilisateur</PrimaryButton>
            </div>
        </div>
        <!-- Delete User Confirmation Modal -->
        <Modal :show="showDeleteModal" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                    Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Une fois l'utilisateur supprimé, toutes ses ressources et données seront définitivement effacées.
                </p>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Annuler
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Supprimer l'utilisateur
                    </DangerButton>
                </div>
            </div>
        </Modal>

        <!-- Search Input -->
        <div class="mt-6">
            <TextInput v-model="searchTerm" type="text" placeholder="Rechercher un utilisateur..." class="block w-full" />
        </div>

        <!-- Users Table -->
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
```
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                     <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                        Photo
                                    </th>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6">Nom</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Email</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Rôle</th>

                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                <tr v-for="user in users.data" :key="user.id">
                                     <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                        <img v-if="user.profile_photo_path"
                                            :src="`/storage/${user.profile_photo_path}`"
                                            :alt="`Photo de profil de ${user.name}`"
                                            class="h-8 w-8 rounded-full object-cover" />
                                        <div v-else class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ getInitials(user.name) }}</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-6">
                                        {{ user.name }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ user.email }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ user.role }}</td>

                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <SecondaryButton @click="openEditUserModal(user)" class="me-2">Modifier</SecondaryButton>
                                        <DangerButton @click="confirmUserDeletion(user)" class="ms-2">Supprimer</DangerButton>
                                    </td>
                                </tr>
                                <tr v-if="!users.data.length">
                                    <td colspan="5" class="px-3 py-4 text-center text-sm text-gray-500 dark:text-gray-300">
                                        Aucun utilisateur trouvé.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit User Modal -->
        <Modal :show="showUserModal" @close="closeModal">
            <form @submit.prevent="submitUser" class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                    {{ editingUser ? 'Modifier l\'utilisateur' : 'Ajouter un nouvel utilisateur' }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ editingUser ? 'Veuillez modifier les informations ci-dessous.' : 'Veuillez entrer les informations du nouvel utilisateur.' }}
                </p>
                <div class="mt-6">
                    <InputLabel for="name" value="Nom" />
                    <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus placeholder="Nom de l'utilisateur" />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required placeholder="Adresse email" />
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="password" value="Mot de passe" />
                    <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" :required="!editingUser" placeholder="Mot de passe" />
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="password_confirmation" value="Confirmer le mot de passe" />
                    <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password" class="mt-1 block w-full" :required="!editingUser" placeholder="Confirmer le mot de passe" />
                    <InputError :message="form.errors.password_confirmation" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="role" value="Rôle" />
                    <select id="role" v-model="form.role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 disabled:bg-gray-200 dark:disabled:bg-gray-800" required :disabled="!isAdmin">
                        <option value="" disabled>Sélectionnez un rôle</option>
                        <option v-for="(label, value) in roles" :key="value" :value="value">{{ label }}</option>
                    </select>
                    <InputError :message="form.errors.role" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Annuler </SecondaryButton>
                    <PrimaryButton class="ms-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ editingUser ? 'Enregistrer' : 'Ajouter' }}
                    </PrimaryButton>
                </div>
            </form>
        </Modal>

        <!-- Pagination -->
        <div v-if="users.links.length > 3" class="mt-8 flex justify-center">
            <div class="flex flex-wrap -mb-1">
                <template v-for="(link, key) in users.links" :key="key">
                    <div v-if="link.url === null" class="mr-1 mb-1 rounded border px-4 py-3 text-sm leading-4 text-gray-400 dark:border-gray-700" v-html="link.label" />
                    <Link v-else class="mr-1 mb-1 rounded border px-4 py-3 text-sm leading-4 hover:bg-white focus:border-indigo-500 focus:text-indigo-500 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700" :class="{ 'bg-white dark:bg-gray-700': link.active }" :href="link.url" v-html="link.label" />
                </template>
            </div>
        </div>
    </AppLayout>
</template>
