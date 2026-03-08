<script setup lang="ts">
import Button from '@/components/button.vue';
import InputV2 from '@/components/input-v2.vue';
import Modal from '@/components/ui/modal/modal.vue';
import AppLayout from '@/layouts/components/app-layout.vue';
import { ref } from 'vue';
let model = ref()
let openModal = ref(false)
</script>

<template>
    <AppLayout>
        <div class="mt-3 space-y-4">
            <InputV2 :is-currency="true" v-model="model"  label="Product Name" v-for="i in 4" />
        </div>
        <div class="grid grid-cols-3 gap-2">
            <InputV2 v-model="model" v-for="i in 5" />
        </div>
        <div class="mt-4 max-w-xs">
            <Button @click="openModal = true">SIMPAN</Button>
        </div>
        <Modal v-model="openModal" title="Konfirmasi">
            <template #body>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt asperiores molestiae corrupti, vel hic quasi autem suscipit minus veniam sint natus totam laborum quis possimus? Laudantium et voluptates ullam aut!
                Non, et enim? Laborum perferendis sequi sed aliquam delectus, eaque veritatis eos, dolor saepe natesciunt liber iste molestiae asperiores in. Fugit delectus at ipsa non.
            </template>
            <template #footer>
                <Button>Konfirmasi</Button>
            </template>
        </Modal>
    </AppLayout>
</template>
