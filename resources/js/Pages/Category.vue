<script setup>
import { ref, getCurrentInstance } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

defineProps({
    categories: Object,
});

const showCategoryModal = ref(false);
const editingCategory = ref(null);

const form = useForm({
    id: null,
    name: '',
    description: '',
});

const openAddCategoryModal = () => {
    editingCategory.value = null;
    form.reset();
    showCategoryModal.value = true;
};

const openEditCategoryModal = (category) => {
    editingCategory.value = category;
    form.id = category.id;
    form.name = category.name;
    form.description = category.description;
    showCategoryModal.value = true;
};

const closeModal = () => {
    showCategoryModal.value = false;
    form.reset();
};

const submitCategory = () => {
    if (editingCategory.value) {
        form.put(route('categories.update', editingCategory.value.id), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    } else {
        form.post(route('categories.store'), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    }
};

const instance = getCurrentInstance();
const deleteCategory = (id) => {
    instance.proxy.$swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Vous ne pourrez pas revenir en arrière!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, supprimer!',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            useForm({}).delete(route('categories.destroy', id), {
                preserveScroll: true,
            });
        }
    });
};
</script>

<template>
    <AppLayout title="Catégories">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Catégories</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">La liste de toutes les catégories d'articles.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <PrimaryButton @click="openAddCategoryModal">Ajouter une catégorie</PrimaryButton>
            </div>
        </div>

        <!-- Categories Table -->
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6">Désignation</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Description</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Date de création</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                <tr v-for="category in categories.data" :key="category.id">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-6">{{ category.name }}</td>
                                    <td class="w-1/3 px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ category.description ? category.description.substring(0, 50) + (category.description.length > 50 ? '...' : '') : 'N/A' }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ new Date(category.created_at).toLocaleDateString('fr-FR') }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <SecondaryButton @click="openEditCategoryModal(category)" class="me-2">Modifier</SecondaryButton>
                                        <DangerButton @click="deleteCategory(category.id)">Supprimer</DangerButton>
                                    </td>
                                </tr>
                                <tr v-if="!categories.data.length">
                                    <td colspan="4" class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500 dark:text-gray-300">
                                        Aucune catégorie trouvée.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Category Modal -->
        <Modal :show="showCategoryModal" @close="closeModal">
            <form @submit.prevent="submitCategory" class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                    {{ editingCategory ? 'Modifier la catégorie' : 'Ajouter une nouvelle catégorie' }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ editingCategory ? 'Veuillez modifier les informations ci-dessous.' : 'Veuillez entrer la désignation et la description de la nouvelle catégorie.' }}
                </p>
                <div class="mt-6">
                    <InputLabel for="name" value="Désignation" />
                    <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus placeholder="Désignation de la catégorie" />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="description" value="Description" />
                    <textarea id="description" v-model="form.description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" rows="3" placeholder="Description (optionnel)"></textarea>
                    <InputError :message="form.errors.description" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Annuler </SecondaryButton>
                    <PrimaryButton class="ms-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ editingCategory ? 'Enregistrer' : 'Ajouter' }}
                    </PrimaryButton>
                </div>
            </form>
        </Modal>
    </AppLayout>
</template>
