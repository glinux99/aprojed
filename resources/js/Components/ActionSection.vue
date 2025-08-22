<template>
    <div :class="maxWidth ? 'md:grid md:grid-cols-3 md:gap-6' : ''">
        <div v-if="title" class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">
                    {{ title }}
                </h3>

                <p v-if="description" class="mt-1 text-sm text-gray-600">
                    {{ description }}
                </p>
            </div>
        </div>

        <div :class="maxWidth ? 'md:col-span-2' : 'mt-5 md:mt-0 md:col-span-2'">
            <div
                class="bg-white shadow sm:rounded-lg"
            >
                <slot name="content" />
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    title: {
        type: String,
    },
    description: {
        type: String,
    },
    maxWidth: {
        type: Boolean,
        default: false,
    },
});
</script>
