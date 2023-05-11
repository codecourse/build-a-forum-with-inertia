<template>
    <FixedFormWrapper>
        <template v-slot:header>
            <h1 class="text-lg font-medium">New discussion</h1>
        </template>

        <template v-slot:main>
            <div class="flex items-start space-x-3">
                <div class="flex-grow">
                    <div>
                        <InputLabel for="title" value="Title" class="sr-only" />
                        <TextInput id="title" type="text" class="w-full" />
                        <!-- <InputError class="mt-2" /> -->
                    </div>
                </div>
                <div>
                    <Select id="topic">
                        <option value="">Choose a topic</option>
                        <option
                            :value="topic.slug"
                            v-for="topic in $page.props.topics"
                            :key="topic.id"
                        >
                            {{ topic.title }}
                        </option>
                    </Select>
                </div>
            </div>

            <div class="mt-4">
                <Textarea class="w-full" rows="6" />
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
</script>
