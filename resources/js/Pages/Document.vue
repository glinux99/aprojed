<script setup>
import { onMounted, ref, watch } from 'vue';
import { useForm, Link, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { CloudArrowDownIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    documents: Object,
    articles: Array,
    users: Array,
    filters: Object,
});

const showDocumentModal = ref(false);
const editingDocument = ref(null);
const searchTerm = ref(props.filters.search ?? '');

const form = useForm({
    id: null,
    _method: 'post',
    original_name: '',
    description: '',
    document_file: null,
    article_id: null, // To associate with an article if needed
    user_id: null, // To associate with a user
});

const openAddDocumentModal = () => {
    editingDocument.value = null;
    form.reset();
    form._method = 'post';
    showDocumentModal.value = true;
};

const openEditDocumentModal = (document) => {
    editingDocument.value = document;
    form.id = document.id;
    form.original_name = document.original_name;
    form.description = document.description || '';
    form.article_id = document.documentable_type === 'App\\Models\\Article' ? document.documentable_id : null;
    form.user_id = document.documentable_type === 'App\\Models\\User' ? document.documentable_id : null;
    form.document_file = null; // Reset file input for edit
    form._method = 'put';
    showDocumentModal.value = true;
};

const closeModal = () => {
    showDocumentModal.value = false;
    form.reset();
};

const submitDocument = () => {
    if (editingDocument.value) {
        form.post(route('documents.update', editingDocument.value.id), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    } else {
        form.post(route('documents.store'), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    }
};

const getDocumentableName = (document) => {
    if (!document.documentable) return 'Aucun';
    if (document.documentable_type.includes('Article')) {
        return `Article: ${document.documentable.title}`;
    }
    return `Utilisateur: ${document.documentable.name}`;
};

const deleteDocument = (id) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce document ?')) {
        useForm({}).delete(route('documents.destroy', id), {
            preserveScroll: true,
        });
    }
};

watch(searchTerm, (value) => {
    router.get(route('documents.index'), { search: value }, {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
});
onMounted(()=>console.log(props.documents));
</script>

<template>
    <AppLayout title="Documents">
 <div class="sm:flex sm:items-center mx-2">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Documents</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">La liste de tous les documents.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <PrimaryButton @click="openAddDocumentModal">Ajouter un document</PrimaryButton>
            </div>
        </div>

        <!-- Search Input -->
 <div class="mt-6 mx-2">
            <TextInput v-model="searchTerm" type="text" placeholder="Rechercher un document..." class="block w-full" />
        </div>

        <!-- Documents Table -->
 <div class="mt-8 flow-root mx-2">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6">Titre</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Description</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Lié à</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Date d'ajout</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                <tr v-for="document in documents.data" :key="document.id">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-6">
 <a :href="`/storage/${document.path}`" :download="document.original_name" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 flex items-center">
 <CloudArrowDownIcon class="size-5 mr-2" />
 {{ document.original_name }}
 </a>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                        {{ document.description ? (document.description.substring(0, 50) + (document.description.length > 50 ? '...' : '')) : 'N/A' }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                        {{ getDocumentableName(document) }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ new Date(document.created_at).toLocaleDateString('fr-FR') }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <SecondaryButton @click="openEditDocumentModal(document)" class="me-2">Modifier</SecondaryButton>
                                        <DangerButton @click="deleteDocument(document.id)">Supprimer</DangerButton>
                                    </td>
                                </tr>
                                <tr v-if="!documents.data.length">
                                    <td colspan="5" class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500 dark:text-gray-300">
                                        Aucun document trouvé.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Document Modal -->
        <Modal :show="showDocumentModal" @close="closeModal">
            <form @submit.prevent="submitDocument" class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                    {{ editingDocument ? 'Modifier le document' : 'Ajouter un nouveau document' }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ editingDocument ? 'Veuillez modifier les informations ci-dessous.' : 'Veuillez sélectionner le fichier à ajouter.' }}
                </p>
                <div class="mt-6">
                    <InputLabel for="document_file" value="Fichier du document" />
                    <input @input="form.document_file = $event.target.files[0]" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" />
                    <InputError :message="form.errors.document_file" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="original_name" value="Titre du document" />
                    <TextInput id="original_name" v-model="form.original_name" type="text" class="mt-1 block w-full" placeholder="Titre affiché du document (optionnel)" />
                    <InputError :message="form.errors.original_name" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="description" value="Description (optionnel)" />
                    <textarea id="description" v-model="form.description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" rows="3" placeholder="Petite description du document"></textarea>
                    <InputError :message="form.errors.description" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="article_id" value="Lier à un article (optionnel)" />
                    <select id="article_id" v-model="form.article_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        <option value="">Aucun article</option>
                        <option v-for="article in articles" :key="article.id" :value="article.id">{{ article.title }} </option>
                    </select>
                    <InputError :message="form.errors.article_id" class="mt-2" />
                </div>
                <div class="mt-6">
                    <InputLabel for="user_id" value="Lier à un utilisateur (optionnel)" />
                    <select id="user_id" v-model="form.user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        <option value="">Aucun utilisateur</option>
                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
                    </select>
                    <InputError :message="form.errors.user_id" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Annuler </SecondaryButton>
                    <PrimaryButton class="ms-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ editingDocument ? 'Enregistrer' : 'Ajouter' }}
                    </PrimaryButton>
                </div>
            </form>
        </Modal>
    </AppLayout>
</template>
