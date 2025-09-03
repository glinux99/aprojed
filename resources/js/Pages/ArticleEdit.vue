<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { ref } from 'vue';

const props = defineProps({
  article: Object,
  categories: Array,
});

const form = useForm({
    _method: 'PUT',
    title: props.article.title,
    category_id: props.article.category_id,
    content: props.article.content,
    cover_photo: null,
    documents: [],
    tags: props.article.tags_string,
    source: props.article.source,
    documents_to_delete: [],
});

const existingDocuments = ref([...props.article.documents]);

const removeExistingDocument = (docId, index) => {
    if (!form.documents_to_delete.includes(docId)) {
        form.documents_to_delete.push(docId);
    }
    existingDocuments.value.splice(index, 1);
};

const submit = () => {
    form.post(route('articles.update', props.article.id));

};
const articleAdd=(contents)=>{

     const url = window.location.href;

    // Sépare l'URL en segments basés sur le slash '/'
    const segments = url.split('/');
    const articleId = segments[segments.length - 2]
    // const articleId = urlParams.get('articleId');
    if (articleId) {
        location.href = "/articlesEditor/" + articleId;
    }
}
</script>

<template>
    <AppLayout title="Modifier un article">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Modifier l'article</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">Mettez à jour les informations de l'article.</p>
            </div>
        </div>

        <div class="mt-8 flow-root">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form @submit.prevent="submit" class="bg-white p-6 dark:bg-gray-800">
                        <div class="space-y-6">
                            <div>
                                <InputLabel for="title" value="#Titre de l'article" />
                                <TextInput id="title" v-model="form.title" type="text" class="mt-1 block w-full" required autofocus />
                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>

                            <div>
                                <InputLabel for="category_id" value="#Catégorie" />
                                <select id="category_id" v-model="form.category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    <option value="" disabled>Choisissez une catégorie</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.category_id" />
                            </div>

                            <div>
                                <div class="flex flex-row justify-between my-2">
                                    <InputLabel for="content" value="#Contenu" />

                                <Button type="button" class="mx-5 inline-flex items-center rounded-md border border-transparent bg-green-900 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-green-700 focus:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 active:bg-green-900 dark:bg-green-700 dark:hover:bg-green-600"  @click ="articleAdd(contents)"> Editer le contenu</Button>
                                </div>
  <hr>
                                <div v-html="form.content" class="py-2"></div>
                                <InputError class="mt-2" :message="form.errors.content" />
                            </div>

                            <div>
                                <InputLabel for="cover_photo" value="Photo de couverture" />
                                <div v-if="article.cover_photo_path && !form.cover_photo" class="mt-2 mb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Photo actuelle :</p>
                                    <img :src="`/storage/${article.cover_photo_path}`" :alt="article.title" class="mt-2 h-48 w-auto rounded-md">
                                </div>
                                <input @input="form.cover_photo = $event.target.files[0]" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100" class="mt-2 w-full">
                                    {{ form.progress.percentage }}%
                                </progress>
                                <InputError class="mt-2" :message="form.errors.cover_photo" />
                            </div>

                            <div>
                                <InputLabel value="Documents actuels" />
                                <ul v-if="existingDocuments.length > 0" role="list" class="mt-2 divide-y divide-gray-200 rounded-md border border-gray-200 dark:divide-gray-700 dark:border-gray-700">
                                    <li v-for="(document, index) in existingDocuments" :key="document.id" class="flex items-center justify-between py-2 pl-3 pr-4 text-sm">
                                        <span class="truncate text-gray-700 dark:text-gray-300">{{ document.original_name }}</span>
                                        <button @click.prevent="removeExistingDocument(document.id, index)" type="button" class="ml-4 font-medium text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300">Supprimer</button>
                                    </li>
                                </ul>
                                <p v-else class="mt-2 text-sm text-gray-500 dark:text-gray-400">Aucun document actuellement lié.</p>
                            </div>

                            <div>
                                <InputLabel for="documents" value="Ajouter de nouveaux documents" />
                                <input @input="form.documents = $event.target.files" type="file" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" />
                                <InputError class="mt-2" :message="form.errors.documents" />
                            </div>

                            <div>
                                <InputLabel for="tags" value="Tags (séparés par des virgules)" />
                                <TextInput id="tags" v-model="form.tags" type="text" class="mt-1 block w-full" placeholder="ex: technologie, laravel, vuejs" />
                                <InputError class="mt-2" :message="form.errors.tags" />
                            </div>

                            <div>
                                <InputLabel for="source" value="Source du document (URL)" />
                                <TextInput id="source" v-model="form.source" type="url" class="mt-1 block w-full" placeholder="https://exemple.com/source-article" />
                                <InputError class="mt-2" :message="form.errors.source" />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Enregistrer les modifications
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
