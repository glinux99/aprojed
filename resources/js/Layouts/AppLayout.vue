<script setup>
import { ref } from 'vue';
import SideBar from '@/Components/SideBar.vue';
import AppBar from '@/Components/AppBar.vue';

const sidebarOpen = ref(false);
</script>

<template>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <SideBar :sidebar-open="sidebarOpen" @close="sidebarOpen = false" />

        <div class="lg:pl-72">
            <AppBar @toggle-sidebar="sidebarOpen = !sidebarOpen" />
            <!-- Page Content -->
            <main class="py-12 mx-2">
                <div class="mx-auto  max-w-7xl sm:px-6 lg:px-8">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
