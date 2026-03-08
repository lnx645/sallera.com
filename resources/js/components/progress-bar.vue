<script setup lang="ts">
import { useLoadingIndicator } from '@/composables/useLoadingIndicator';
import { Bar } from '@bprogress/vue';

useLoadingIndicator()
</script>
<template>
  <Bar/>
</template>
