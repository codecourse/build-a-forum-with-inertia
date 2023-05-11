<script setup>
import ForumLayout from '@/Layouts/ForumLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import Post from '@/Components/Forum/Post.vue';
import { Head } from '@inertiajs/vue3';
import pluralize from 'pluralize'

defineProps({
    discussion: Object,
    posts: Object
})
</script>

<template>
    <Head :title="discussion.title" />

    <ForumLayout>
        <div class="space-y-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center justify-between">
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
                    <div class="text-sm">
                        {{ pluralize('reply', discussion.replies_count, true) }}
                    </div>
                </div>
            </div>

            <template v-if="posts.data.length">
                <Post v-for="post in posts.data" :key="post.id" :post="post" />
                <Pagination class="!mt-6" :pagination="posts.meta" />
            </template>
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
