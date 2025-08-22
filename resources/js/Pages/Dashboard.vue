<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Chart, registerables } from 'chart.js';

const props = defineProps({
    stats: Object,
    chartData: Object,
    recentArticles: Array,
    recentUsers: Array,
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

Chart.register(...registerables);

import { onMounted, ref } from 'vue';

onMounted(() => {
    const ctx = document.getElementById('articlePublicationChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: props.chartData.labels,
                datasets: [{
                    ...props.chartData.datasets
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});



</script>

<template>
    <AppLayout title="Tableau de bord">
        <div>
            <!-- Cartes de statistiques -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Carte Utilisateurs -->
                <div class="overflow-hidden rounded-lg px-4 py-5 shadow sm:p-6 dark:bg-gray-800 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                    <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-400">Utilisateurs inscrits</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ stats.users }}</dd>
                </div>

                <!-- Carte Articles Publiés -->
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6 dark:bg-gray-800">
                    <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-400">Articles publiés</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ stats.published_articles }}</dd>
                </div>

                <!-- Carte Brouillons -->
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6 dark:bg-gray-800">
                    <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-400">Articles en brouillon</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ stats.unpublished_articles }}</dd>
                </div>
            </div>

             <!-- Graphique de publication des articles -->
            <div class="mt-8">
                <h2 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Articles publiés (7 derniers jours)</h2>
                <div class="mt-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <canvas id="articlePublicationChart"></canvas>
                </div>
            </div>

            <!-- Sections des listes récentes -->
            <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-2">
                <!-- Derniers articles publiés -->
                <div>
                    <h2 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Derniers articles publiés</h2>
                    <div class="mt-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6">Titre</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Catégorie</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                <tr v-for="article in recentArticles" :key="article.id">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-6">
                                        <Link :href="route('articles.edit', article.id)" class="hover:text-indigo-600 dark:hover:text-indigo-400">{{ article.title }}</Link>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ article.category.name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ new Date(article.created_at).toLocaleDateString('fr-FR') }}</td>
                                </tr>
                                <tr v-if="!recentArticles.length">
                                    <td colspan="3" class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500 dark:text-gray-300">
                                        Aucun article publié récemment.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Derniers utilisateurs ajoutés -->
                <div>
                    <h2 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Derniers utilisateurs ajoutés</h2>
                    <div class="mt-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6">Nom</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Email</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Rôle</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                <tr v-for="user in recentUsers" :key="user.id">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img v-if="user.profile_photo_path" class="h-10 w-10 rounded-full" :src="`/storage/${user.profile_photo_path}`" alt="">
                                                <div v-else class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ getInitials(user.name) }}</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900 dark:text-white">{{ user.name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ user.email }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ user.role }}</td>
                                </tr>
                                <tr v-if="!recentUsers.length">
                                    <td colspan="3" class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500 dark:text-gray-300">
                                        Aucun utilisateur ajouté récemment.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
