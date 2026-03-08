<script setup lang="ts">
import InputV2 from '@/components/input-v2.vue';
import AppLayout from '@/layouts/components/app-layout.vue';
import { ref } from 'vue';
let model = ref()
</script>

<template>
    <AppLayout>
        <div class="mt-3 space-y-4">
            <InputV2 :is-currency="true" v-model="model"  label="Product Name" v-for="i in 20" />
        </div>
        <div class="grid grid-cols-3 gap-2">
            <InputV2 v-model="model" v-for="i in 20" />
        </div>
        {{ model }}
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam, omnis,
        quos molestiae ex placeat aliquid ad ipsam eaque necessitatibus delectus
        eius sint earum fugiat sequi ab quibusdam autem quaerat consectetur.
        Magni, nihil animi? Dignissimos unde, possimus nostrum consequuntur nam
        fugit aliquid optio doloremque assumenda amet? Error, molestias sapiente
        consequatur voluptas corrupti dolorem maxime fugit possimus, culpa eius
        numquam et mollitia!
    </AppLayout>
</template>
