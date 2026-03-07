<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { Motion,motion, AnimatePresence } from 'motion-v';

import IconArrowDown from '@/icons/icon-arrow-down.vue';
import StoreIcon from '@/icons/store-icon.vue';
import IconCheck from '@/icons/icon-check.vue';
let emit = defineEmits<{
    (e: 'onSelect', store: string): void;
}>();
const isOpen = ref(false);
const dropdownRef = ref<HTMLElement | null>(null);
let props = defineProps<{
    selected_id: string;
    stores: {
        name: string;
        address: string;
        selected_id: string;
        id: string;
    }[];
}>();

const toggle = () => (isOpen.value = !isOpen.value);

const handleClickOutside = (e: MouseEvent) => {
    if (dropdownRef.value && !dropdownRef.value.contains(e.target as Node)) {
        isOpen.value = false;
    }
};

onMounted(() => document.addEventListener('click', handleClickOutside));
onBeforeUnmount(() =>
    document.removeEventListener('click', handleClickOutside),
);
function onClick(id: string) {
    emit('onSelect', id);
}
</script>

<template>
    <div ref="dropdownRef" class="relative z-50 w-58 lg:w-72">
        <!-- BUTTON -->
        <motion.button
            tag="button"
            @click="toggle"
            :whileTap="{ scale: 0.97 }"
            class="relative z-50 flex w-full cursor-pointer items-center gap-2 border border-stone-200 bg-white px-3 py-2 text-xs font-semibold text-stone-800 shadow-sm select-none"
            :animate="{
                borderRadius: isOpen
                    ? '17px 17px 0px 0px'
                    : '17px 17px 17px 17px',
            }"
            :transition="{ duration: 0.1, delay: 0.0, ease: 'easeInOut' }"
        >
            <StoreIcon width="20" height="20" color="#088be8" />
            <span class="truncate">
                {{
                    stores.find((e) => e.id === selected_id)?.name ||
                    'Pilih Toko'
                }}
            </span>
            <Motion
                tag="div"
                class="ml-auto"
                :animate="{ rotate: isOpen ? 180 : 0 }"
                :transition="{ duration: 0.2 }"
            >
                <IconArrowDown />
            </Motion>
        </motion.button>

        <!-- DROPDOWN -->
        <AnimatePresence>
            <Motion
                v-if="isOpen"
                tag="div"
                :initial="{
                    opacity: 0,
                    y: -12,
                    scaleY: 0.9,
                    originY: 0,
                }"
                :animate="{
                    opacity: 1,
                    y: 0,
                    scaleY: 1,
                }"
                :exit="{
                    opacity: 0,
                    y: -10,
                    scaleY: 0.92,
                    transition: { duration: 0.12, ease: 'easeIn' },
                }"
                :transition="{
                    duration: 0.16,
                    ease: [0.22, 1, 0.36, 1],
                }"
                class="absolute top-full right-0 left-0 origin-top-left rounded-b-xl border border-t-0 border-stone-200 bg-white shadow-xl shadow-stone-200/50"
            >
                <div class="max-h-60 overflow-y-auto p-2">
                    <!-- STORE ITEM -->
                    <motion.button
                        v-for="(store, i) in stores"
                        :key="store.name"
                        tag="div"
                        @click="onClick(store.id)"
                        :initial="{ opacity: 0, y: 8 }"
                        :animate="{ opacity: 1, y: 0 }"
                        :transition="{ duration: 0.18, delay: 0.05 * i }"
                        :whileHover="{ scale: 1.02 }"
                        class="flex cursor-pointer w-full  select-none items-center gap-3 rounded-lg p-2 hover:bg-stone-50"
                    >
                        <div
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600"
                        >
                            <IconCheck
                                v-if="store.id == selected_id"
                                width="17"
                            />
                            <StoreIcon width="17" v-else />
                        </div>

                        <div class="leading-tight flex items-start flex-col">
                            <h2
                                class="line-clamp-1 text-xs font-semibold text-stone-800"
                            >
                                {{ store.name }}
                            </h2>
                            <p class="line-clamp-1 text-[11px] text-stone-500">
                                {{ store.address }}
                            </p>
                        </div>
                    </motion.button>
                </div>
            </Motion>
        </AnimatePresence>
    </div>
</template>
