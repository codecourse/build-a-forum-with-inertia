<script setup>
import ForumLayout from '@/Layouts/ForumLayout.vue';
import Select from '@/Components/Select.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Forum" />

    <ForumLayout>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div>
                    <InputLabel for="topic" value="Topic" class="sr-only" />
                    <Select id="topic">
                        <option value="">All topics</option>
                        <option :value="topic.slug" v-for="topic in $page.props.topics" :key="topic.id">
                            {{ topic.name }}
                        </option>
                    </Select>
                </div>
            </div>
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
