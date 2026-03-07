<script setup lang="ts">
import MenuIcon from '@/icons/menu-icon.vue';
import StoreSelect from './store-select.vue';
import { ref } from 'vue';
let stores = [
    {
        name: 'Warung Makan Sego Goreng',
        address: 'Jl. Medan Merdeka Nomor 4',
        selected_id: '213123123',
        id: '213123123',
    },
    {
        name: 'Toko Berkah Jaya',
        address: 'Jl. Sudirman Nomor 12',
        selected_id: 'string',
        id: 'string',
    },
];
let selected_id = ref('')
function onSelect(id : string) {
    selected_id.value = id;
}
</script>

<template>
    <header class="navbar h-14 w-full">
        <div class="flex h-full items-center px-3 lg:ml-59 lg:px-0">
            <div class="flex items-center space-x-2 font-semibold text-white">
                <MenuIcon class="text-white" />
                
                <span class="lg:text-lg">Product Management</span>
            </div>
            <div class="ml-auto lg:mr-4">
                <StoreSelect
                    @on-select="onSelect"
                    :selected_id="selected_id"
                    :stores="stores"
                />
            </div>
        </div>
    </header>
</template>

<style lang="css" scoped>
.navbar {
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
</style>
