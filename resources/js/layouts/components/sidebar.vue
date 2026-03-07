<script setup lang="ts">
import NavMenu from './nav-menu.vue';
let menus = [
    {
        name: 'Dashboard',
        icon: 'home',
        route: 'dashboard',
        // Gunakan null atau hapus jika tidak ada children untuk konsistensi pengecekan
        children: null,
    },
    {
        name: 'Invitnesia',
        icon: 'palette',
        route: 'invitnesia.*', // Pattern untuk mendeteksi status 'active' pada grup
        children: [
            {
                name: 'Semua Undangan',
                route: 'invitnesia.index',
                icon: 'list',
            },
            {
                name: 'Editor Template',
                route: 'invitnesia.editor',
                icon: 'layout',
            },
        ],
    },
    {
        name: 'LMS Pasundan',
        icon: 'education',
        route: 'lms.*',
        children: [
            {
                name: 'Materi Kuliah',
                route: 'lms.materials',
                icon: 'book',
            },
            {
                name: 'Bank Soal',
                route: 'lms.quiz',
                icon: 'file-text',
            },
        ],
    },
];
</script>

<template>
    <nav
        class="sticky top-0 flex h-14 w-full items-center border-b border-none px-2 text-mauve-50"
    >
        WKKW
    </nav>
    <div class="main-side h-full">
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
