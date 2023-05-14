<template>
    <!-- -ml-1 -->
    <markdown-toolbar class="flex items-center">
        <md-bold class="cursor-pointer py-1.5 px-1">
            <Svg name="icon-bold" class="h-5 w-5"></Svg>
        </md-bold>
        <md-italic class="cursor-pointer py-1.5 px-1">
            <Svg name="icon-italic" class="h-5 w-5"></Svg>
        </md-italic>
        <md-code class="cursor-pointer py-1.5 px-1">
            <Svg name="icon-code" class="h-5 w-5"></Svg>
        </md-code>
        <md-link class="cursor-pointer py-1.5 px-1">
            <Svg name="icon-link" class="h-5 w-5"></Svg>
        </md-link>
        <md-mention class="cursor-pointer py-1.5 px-1">
            <Svg name="icon-at" class="h-5 w-5"></Svg>
        </md-mention>
    </markdown-toolbar>
</template>

<script setup>
import Svg from '../Svg.vue';
</script>
