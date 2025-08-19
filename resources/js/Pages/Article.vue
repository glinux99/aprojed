<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    articles: Object,
});
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
                <div class="flex-1 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ article.title }}</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                        Auteur: <span class="font-medium text-gray-700 dark:text-gray-200">{{ article.user.name }}</span>
                    </p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Catégorie: <span class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10 dark:bg-indigo-400/10 dark:text-indigo-400 dark:ring-indigo-400/30">{{ article.category.name }}</span>
                    </p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Publié le {{ new Date(article.created_at).toLocaleDateString('fr-FR') }}
                    </p>
                </div>
                <div class="border-t border-gray-200 bg-gray-50 px-4 py-4 sm:px-6 dark:border-gray-700 dark:bg-gray-800/50">
                    <div class="flex items-center justify-end gap-x-4">
                        <Link :href="route('articles.edit', article.id)" class="text-sm font-medium text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Modifier</Link>
                        <Link :href="route('articles.destroy', article.id)" method="delete" as="button" class="text-sm font-medium text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" preserve-scroll>Supprimer</Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div v-if="articles.data.length > 0 && articles.links.length > 3" class="mt-8 flex justify-center">
            <div class="flex flex-wrap -mb-1">
                <template v-for="(link, key) in articles.links">
                    <div v-if="link.url === null" :key="key" class="mr-1 mb-1 rounded border px-4 py-3 text-sm leading-4 text-gray-400 dark:border-gray-700" v-html="link.label" />
                    <Link v-else :key="`link-${key}`" class="mr-1 mb-1 rounded border px-4 py-3 text-sm leading-4 hover:bg-white focus:border-indigo-500 focus:text-indigo-500 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700" :class="{ 'bg-white dark:bg-gray-700': link.active }" :href="link.url" v-html="link.label" />
                </template>
            </div>
        </div>
    </AppLayout>
</template>
