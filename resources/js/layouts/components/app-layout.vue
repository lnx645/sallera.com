<script setup lang="ts">
import Header from './header.vue';
import Sidebar from './sidebar.vue';
</script>

<template>
    <div class="flex">
        <div class="sidebar hidden lg:block">
            <Sidebar />
        </div>
        <div class="flex-1 shrink">
            <Header/>
            <div class="lg:ml-59">
                <slot/>
            </div>
        </div>
    </div>
</template>
<style lang="css" scoped>
@reference "tailwindcss";
.sidebar{
    box-shadow: -2px 0 13px -8px rgba(0,0,0,.65);
    @apply max-h-screen    min-h-screen max-w-50 min-w-56  overflow-y-auto fixed bg-white left-0 top-0 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] ;
}

</style>
