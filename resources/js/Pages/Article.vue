<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

defineProps({
    articles: Object,
});
const form = useForm({
    title: '',
    slug: '',
    category_id: '',
    cover_photo: null,
    content: '',
    documents: [],
    tags: '',
    source: '',
    publicate: 0
});
const stripHtml = (html) => {
    if (!html) return '';
    // Cette fonction s'exécute côté client
    const doc = new DOMParser().parseFromString(html, 'text/html');
    return doc.body.textContent || "";
}

    const publicateArticle = (article) => {
        form.title = article.title;
        form.slug = article.slug; // Add slug to the form data
        form.category_id = article.category_id;
        form.publicate = 1;
        form.content = article.content;
        console.log(article.id);
        form.put(route('articles.update', article.id));
};

const truncate = (text, length) => {
    if (!text || text.length <= length) return text;
    return text.substring(0, length) + '...';
};
</script>

<template>
    <AppLayout title="Articles">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Articles</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">La liste de tous les articles de votre site.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <Link :href="route('articles.create')">
                    <PrimaryButton>Créer un article</PrimaryButton>
                </Link>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
            <div v-for="article in articles.data" :key="article.id" class="flex flex-col overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 dark:bg-gray-800 dark:ring-white/10">

                <!-- Catégorie -->

                <div class="p-6 pb-4 flex flex-row justify-between">
                   <span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10 dark:bg-indigo-400/10 dark:text-indigo-400 dark:ring-indigo-400/30">{{ article.category.name }}</span>


                </div>
                <!-- Photo de couverture -->
                <div class="flex-shrink-0">
                    <img v-if="article.cover_photo_path" class="h-48 w-full object-cover" :src="`/storage/${article.cover_photo_path}`" :alt="`Photo de couverture pour ${article.title}`">
                    <div v-else class="flex h-48 w-full items-center justify-center bg-gray-200 dark:bg-gray-700">
                        <span class="text-gray-500">Pas d'image</span>
                    </div>
                </div>

                <div class="flex flex-1 flex-col justify-between p-6">
                     <!-- Auteur et Date -->
                    <div class="mb-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400 flex justify-between">
                           <div> Par <span class="font-medium text-gray-700 dark:text-gray-200">{{ article.user.name }}</span></div>
                            <div>le <time :datetime="article.created_at">{{ new Date(article.created_at).toLocaleDateString('fr-FR') }}</time></div>
                        </p>
                        <hr>
                    </div>
                    <div class="flex-1">

                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ article.title }}</h2>
                        <!-- Description -->
                        <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">
                            {{ truncate(stripHtml(article.content), 100) }}
                        </p>
                        <!-- Documents en annexe -->
                        <div v-if="article.documents && article.documents.length > 0" class="mt-4">
                            <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">Documents en annexe</h3>
                            <ul role="list" class="mt-2 divide-y divide-gray-200 rounded-md border border-gray-200 dark:divide-gray-700 dark:border-gray-700">

                                <li v-for="document in article.documents" :key="document.id" class="flex items-center justify-between py-2 pl-3 pr-4 text-sm">
                                    <div class="flex w-0 flex-1 items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.452a1.125 1.125 0 001.59 1.591l3.455-3.554a3 3 0 000-4.242z" clip-rule="evenodd" /></svg>
                                        <span class="ml-2 w-0 flex-1 truncate text-gray-700 dark:text-gray-300">{{ document.original_name }}</span>
                                    </div>
                                    <a :href="`/storage/${document.path}`" download class="ml-4 flex-shrink-0 font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Télécharger</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="border-t border-gray-200 bg-gray-50 px-4 py-4 sm:px-6 dark:border-gray-700 dark:bg-gray-800/50">
                    <div class="flex gap-x-4 items-center justify-between">
                        <SecondaryButton @click="publicateArticle(article)" v-if="article.publicate==0">Publier</SecondaryButton>
                        <Link :href="route('articles.edit', article.id)" class="text-sm font-medium text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Modifier</Link>
                        <Link :href="route('articles.destroy', article.id)" method="delete" as="button" class="text-sm font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" preserve-scroll>Supprimer</Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div v-if="articles.data.length > 0 && articles.links.length > 3" class="mt-8 flex justify-center">

            <div class="flex-wrap -mb-1 flex">
                <template v-for="(link, key) in articles.links">
                    <div v-if="link.url === null"
                         class="mr-1 mb-1 rounded border px-4 py-3 text-sm leading-4 text-gray-400 dark:border-gray-700"
                         v-html="link.label"/>
                    <Link v-else :key="`link-${key}`"
                          class="mr-1 mb-1 rounded border px-4 py-3 text-sm leading-4 hover:bg-white focus:border-indigo-500 focus:text-indigo-500 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700"
                          :class="{ 'bg-white dark:bg-gray-700': link.active }" :href="link.url" v-html="link.label"/>
                </template>
            </div>
        </div>
    </AppLayout>
</template>
