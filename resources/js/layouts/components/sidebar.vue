<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import NavMenu from './nav-menu.vue';
import { computed } from 'vue';
let page = usePage()
let menus = computed(()=>page.props.menus)
</script>

<template>
    <nav
        class="sticky z-50 top-0 flex h-14 w-full items-center border-b border-none px-2 text-mauve-50"
    >
        ALSERA
    </nav>
    <div class="main-side py-2 h-full">
        <NavMenu v-for="value in menus" :menu="value" />
    </div>
</template>
<style lang="css" scoped>
nav {
    background: #1685c7;
    background: -webkit-gradient(
        linear,
        left top,
        right top,
        from(#0078ce),
        to(#0b94f5)
    );
    background: linear-gradient(90deg, #0078ce, #0b94f5);
    -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.12156862745098039);
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.12156862745098039);
}
.main-side {
    border-right: 1px solid #eee;
}
</style>
