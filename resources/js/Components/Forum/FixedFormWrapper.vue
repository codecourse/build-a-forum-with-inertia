<template>
    <form class="fixed bottom-0 w-full bg-white p-6 border-t-4 border-gray-100 space-y-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <slot name="header" />
            </div>

            <div class="mt-4 space-y-3">
                <slot name="main" :markdownPreviewEnabled="markdownPreviewEnabled" />

                <div class="h-48 bg-gray-100 rounded-lg px-3 py-2 overflow-y-scroll border border-gray-300 shadow-sm" v-if="markdownPreviewEnabled" v-html="markdownPreviewHtml" :class="{ 'opacity-50': markdownPreviewLoading }"></div>

                <div class="flex items-center justify-between">
                    <MarkdownShortcutToolbar for="body" />
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
import { ref, watch } from 'vue'
import MarkdownShortcutToolbar from './MarkdownShortcutToolbar.vue';

const props = defineProps({
    form: Object
})

const markdownPreviewEnabled = ref(false)
const markdownPreviewHtml = ref('')
const markdownPreviewLoading = ref(false)

watch(markdownPreviewEnabled, (toggled) => {
    if (!toggled) {
        return
    }

    markdownPreviewLoading.value = true

    axios.post(route('markdown'), { body: props.form.body }).then((response) => {
        markdownPreviewHtml.value = response.data.html
        markdownPreviewLoading.value = false
    })
})
</script>
