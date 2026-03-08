<script setup lang="ts">
import 'pretty-checkbox/dist/pretty-checkbox.min.css';
import { ProgressProvider } from '@bprogress/vue';
import ProgressBar from '@/components/progress-bar.vue';
import 'animate.css';

</script>

<template>
    <ProgressProvider>
        <ProgressBar/>
        <slot />
    </ProgressProvider>
</template>