<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import SummernoteEditor from 'vue3-summernote-editor';

const editorConfig = {
    height: 300,
};

defineProps({
    categories: Object,
});

const form = useForm({
    title: '',
    category_id: '',
    content: '',
});

const submit = () => {
    form.post(route('articles.store'), {
        onFinish: () => form.reset(),
    });
};
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
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <form @submit.prevent="submit" class="bg-white p-6 dark:bg-gray-800">
                            <div class="space-y-6">
                                <div>
                                    <InputLabel for="title" value="Titre de l'article" />
                                    <TextInput id="title" v-model="form.title" type="text" class="mt-1 block w-full" required autofocus />
                                    <InputError class="mt-2" :message="form.errors.title" />
                                </div>

                                <div>
                                    <InputLabel for="category_id" value="Catégorie" />
                                    <select id="category_id" v-model="form.category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                        <option value="" disabled>Choisissez une catégorie</option>
                                        <option v-for="category in categories" :key="category.id" :value="category.id">
                                            {{ category.name }}
                                        </option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.category_id" />
                                </div>

                                <div>
                                    <InputLabel for="content" value="Contenu" />
                                    <div class="mt-1">
                                        <SummernoteEditor
                                            v-model="form.content"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <InputError class="mt-2" :message="form.errors.content" />
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Publier l'article
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
