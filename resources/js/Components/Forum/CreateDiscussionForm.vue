<template>
    <FixedFormWrapper v-if="visible" v-on:submit.prevent="createDiscussion">
        <template v-slot:header>
            <div class="flex items-center justify-between">
                <h1 class="text-lg font-medium">New discussion</h1>
                <button v-on:click="hideCreateDiscussionForm">&times;</button>
            </div>
        </template>

        <template v-slot:main>
            <div class="flex items-start space-x-3">
                <div class="flex-grow">
                    <div>
                        <InputLabel for="title" value="Title" class="sr-only" />
                        <TextInput id="title" type="text" class="w-full" placeholder="Discussion title" v-model="form.title" />
                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>
                </div>
                <div>
                    <InputLabel for="topic" value="Topic" class="sr-only" />
                    <select id="topic" v-model="form.topic_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Choose a topic</option>
                        <option
                            :value="topic.id"
                            v-for="topic in $page.props.topics"
                            :key="topic.id"
                        >
                            {{ topic.title }}
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.topic_id" />
                </div>
            </div>

            <div class="mt-4">
                <InputLabel for="body" value="Body" class="sr-only" />
                <Textarea class="w-full" rows="6" v-model="form.body" />
                <InputError class="mt-2" :message="form.errors.body" />
            </div>
        </template>

        <template v-slot:button>
            <PrimaryButton>
                Create discussion
            </PrimaryButton>
        </template>
    </FixedFormWrapper>
</template>

<script setup>
import FixedFormWrapper from './FixedFormWrapper.vue';
import TextInput from '../TextInput.vue';
import InputLabel from '../InputLabel.vue';
import InputError from '../InputError.vue';
import PrimaryButton from '../PrimaryButton.vue';
import Textarea from '../Textarea.vue';
import Select from '../Select.vue';
import useCreateDiscussion from '@/Composables/useCreateDiscussion';

const { visible, hideCreateDiscussionForm, form } = useCreateDiscussion()

const createDiscussion = () => {
    form.post(route('discussions.store'), {
        onSuccess: () => {
            form.reset()
            hideCreateDiscussionForm()
        }
    })
}

</script>