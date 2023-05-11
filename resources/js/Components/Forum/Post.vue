<template>
    <div class="block bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex items-center space-x-6">
            {{ post.body }}
        </div>
    </div>
</template>

<script setup>
defineProps({
    post: Object
})
</script>
