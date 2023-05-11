<template>
    <Link :href="route('discussions.show', discussion)" class="block bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex items-center space-x-6">
            <div class="flex-grow">
                <div class="flex items-center space-x-3">
                    <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-0.5 text-sm text-gray-600">
                        {{ discussion.topic.title }}
                    </span>
                    <h1 class="text-lg font-medium">
                        <template v-if="discussion.is_pinned">
                            [Pinned]
                        </template>
                        {{ discussion.title }}
                    </h1>
                </div>

            </div>
            <div>
                avatars
            </div>
        </div>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
    discussion: Object
})
</script>
