<template>
    <form class="fixed bottom-0 w-full bg-white p-6 border-t-4 border-gray-100 space-y-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <slot name="header" />
            </div>

            <div class="mt-4 space-y-3">
                <slot name="main" :markdownPreviewEnabled="markdownPreviewEnabled" />

                <div class="h-48 bg-gray-100 rounded-lg px-3 py-2 overflow-y-scroll border border-gray-300 shadow-sm" v-if="markdownPreviewEnabled">
                    Hello
                </div>

                <div class="flex items-center justify-between">
                    <div>markdown toolbar</div>
                    <button class="text-sm text-indigo-500" type="button" v-on:click="markdownPreviewEnabled = !markdownPreviewEnabled">{{ markdownPreviewEnabled ? 'Turn off' : 'Turn on' }} markdown preview</button>
                </div>

                <div class="mt-4">
                    <slot name="button" />
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { ref } from 'vue'

const markdownPreviewEnabled = ref(false)
</script>
