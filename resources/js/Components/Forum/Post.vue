<template>
    <div
        :id="`post-${post.id}`"
        class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 flex items-start space-x-3"
    >
        <div class="w-7 flex-shrink-0">
            <img :src="post.user?.avatar_url" class="w-7 h-7 rounded-full" v-if="post.user">
        </div>
        <div class="w-full">
            <div>
                <div>{{ post.user?.username || '[user deleted]' }}</div>
                <div class="text-sm text-gray-500">Posted <time :datetime="post.created_at.datetime" :title="post.created_at.datetime">{{ post.created_at.human }}</time></div>
            </div>
            <div class="mt-3">
                <div v-html="post.body_markdown" class="markdown"></div>
            </div>

            <ul class="flex items-center space-x-3 mt-6">
                <li v-if="post.discussion.user_can.reply">
                    <button v-on:click="showCreatePostForm(post.discussion)" class="text-indigo-500 text-sm">Reply</button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import useCreatePost from '@/Composables/useCreatePost';

const { showCreatePostForm } = useCreatePost()

defineProps({
    post: Object
})
</script>
