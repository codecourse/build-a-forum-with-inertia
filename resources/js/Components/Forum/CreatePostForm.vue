<template>
    <FixedFormWrapper v-if="visible" v-on:submit.prevent="createPost" :form="form">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-lg font-medium">Replying to {{ discussion.title }}</h1>
                <button v-on:click="hideCreatePostForm">
                    <Svg name="icon-close" class="h-5 w-5"></Svg>
                </button>
            </div>
        </template>

        <template v-slot:main="{ markdownPreviewEnabled }">
            <div>
                <InputLabel for="body" value="Body" class="sr-only" />
                <Mentionable :keys="['@']" offset="6" v-on:search="mentionSearch" :items="mentionSearchResults" v-if="!markdownPreviewEnabled">
                    <Textarea id="body" class="w-full h-48 align-top" v-model="form.body" />

                    <template #no-result>
                        <div class="mention-item">No username found</div>
                    </template>
                </Mentionable>
                <InputError class="mt-2" :message="form.errors.body" />
            </div>
        </template>

        <template v-slot:button>
            <PrimaryButton>
                Reply
            </PrimaryButton>
        </template>
    </FixedFormWrapper>
</template>

<script setup>
import FixedFormWrapper from './FixedFormWrapper.vue';
import InputLabel from '../InputLabel.vue';
import InputError from '../InputError.vue';
import PrimaryButton from '../PrimaryButton.vue';
import Textarea from '../Textarea.vue';
import useCreatePost from '@/Composables/useCreatePost';
import Svg from '../Svg.vue';
import { Mentionable } from 'vue-mention'
import useMentionSearch from '@/Composables/useMentionSearch'
import { watch } from 'vue'

const { visible, hideCreatePostForm, form, discussion, user } = useCreatePost()
const { mentionSearch, mentionSearchResults } = useMentionSearch()

watch(user, (user) => {
    if (!user) {
        return
    }

    form.body = `@${user.username}` + form.body
})

const createPost = () => {
    form.post(route('posts.store', discussion.value), {
        onSuccess: () => {
            form.reset()
            hideCreatePostForm()
        }
    })
}
</script>
