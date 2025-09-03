<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { onMounted } from 'vue';
import axios from 'axios';
import SecondaryButton from '@/Components/SecondaryButton.vue';


const editorConfig = {
    height: 300,
};

const form = useForm({
    title: '',
    category_id: '',
    content: "<h1>Hello world!</h1>\n<p>glinux99.</p>",
    cover_photo: null,
    documents: [],
    tags: '',
    source: '',
    publicate: 0
});
const props = defineProps({
  categories: Array,
  contents: Array,
});
const submit = () => {
       form.publicate = 1;
    form.content = props.contents;
    form.post(route('articles.store'));
};
const submitSave = () => {
    form.content = props.contents;
    form.publicate = 0;
    form.post(route('articles.store'));
};
const articleAdd=(contents)=>{
    var params = contents.length> 0 ?  contents : 'glinx99';
    location.href="/articlesEditor/"+'glinx99';
}
</script>

<template>
    <AppLayout title="Créer un article">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Créer un nouvel article</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">Remplissez le formulaire ci-dessous pour publier un nouvel article.</p>
            </div>
        </div>

        <div class="mt-8 flow-root">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <form @submit.prevent="submit" class="bg-white p-6 dark:bg-gray-800">
                            <div class="space-y-6">
                                  <div>
                                    <InputLabel for="content" value="#Contenu" />
                                    <hr>
                                    <div class="mt-1">
                                    <div v-html="contents"></div>
                                      <PrimaryButton @click ="articleAdd(contents)" v-if="contents.length<=0">
                                    Cliquez ici pour ajouter le contenu à votre article
                                    </PrimaryButton>
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.content" />
                                </div>
                                <div>
                                    <InputLabel for="title" value="#Titre de l'article" />
                                    <TextInput id="title" v-model="form.title" type="text" class="mt-1 block w-full" required autofocus />
                                    <InputError class="mt-2" :message="form.errors.title" />
                                </div>

                                <div>
                                    <InputLabel for="category_id" value="#Catégorie" />
                                    <!-- Note: La prop 'categories' doit être passée à ce composant depuis votre contrôleur Laravel. -->
                                    <select id="category_id" v-model="form.category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                        <option value="" disabled>Choisissez une catégorie</option>
                                        <option v-for="category in categories" :key="category.id" :value="category.id">
                                            {{ category.name }}
                                        </option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.category_id" />
                                </div>

                                <div>
                                    <InputLabel for="cover_photo" value="Photo de couverture" />
                                    <input @input="form.cover_photo = $event.target.files[0]" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100" />
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100" class="mt-2 w-full">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                    <InputError class="mt-2" :message="form.errors.cover_photo" />
                                </div>

                                <div>
                                    <InputLabel for="documents" value="Documents liés (plusieurs fichiers possibles)" />
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

                            <div class="mt-6 flex justify-end ">
                                <div>
                                    <Button type="button" @click="submitSave" class="mx-5 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                          Enregistrer l'article
                                    </Button>
                                                                   </div>
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Publier l'article
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </AppLayout>
</template>
