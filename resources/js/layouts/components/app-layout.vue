<script setup lang="ts">
import { Teleport } from 'vue';
import Header from './header.vue';
import Sidebar from './sidebar.vue';
import { Icon } from '@iconify/vue';
import MobileBottomNav from './mobile-bottom-nav.vue';
</script>

<template>
    <div class="flex">
        <div class="sidebar relative z-2 hidden lg:block">
            <Sidebar />
        </div>
        <div class="flex-1 shrink">
            <Header />
            <div class="px-3 lg:ml-66">
                <slot />
            </div>
        </div>
        <template>
            <MobileBottomNav/>
        </template>
    </div>
</template>
<style lang="css" scoped>
@reference "tailwindcss";
.sidebar {
    box-shadow: -2px 0 13px -8px rgba(0, 0, 0, 0.65);
    @apply fixed top-0 left-0 max-h-screen min-h-screen max-w-50 min-w-62 overflow-y-auto bg-white [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden;
}
</style>
