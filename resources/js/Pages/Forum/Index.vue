<script setup>
import ForumLayout from '@/Layouts/ForumLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Forum" />

    <ForumLayout>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900"></div>
        </div>

        <template #side>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Side
                </div>
            </div>
        </template>
    </ForumLayout>
</template>
