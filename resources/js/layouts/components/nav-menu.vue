<script setup lang="ts">
import IconArrowDown from '@/icons/icon-arrow-down.vue';
import { Link } from '@inertiajs/vue3';
import { ref, computed, useCssModule, useTemplateRef } from 'vue';
import { Icon } from '@iconify/vue';
import { onClickOutside } from '@vueuse/core';
import { AnimatePresence, motion } from 'motion-v';
const props = defineProps<{
    menu: {
        name: string;
        route?: string; // Opsional jika punya children
        icon: string;
        children?: {
            name: string;
            route: string;
            icon: string;
        }[];
    };
}>();

const $style = useCssModule();
const isOpen = ref(false);

const toggleDropdown = () => {
    if (props.menu.children) {
        isOpen.value = !isOpen.value;
    }
};

// Cek apakah salah satu anak sedang aktif (untuk styling menu induk)
const hasActiveChild = computed(() => {
    return props.menu.children?.some((sub) => '');
});
const target = useTemplateRef<HTMLElement>('target');

// Pastikan referensi target dilewatkan langsung (VueUse akan menangani .value secara internal)
onClickOutside(target, () => {
    if (isOpen.value) {
        isOpen.value = false;
    }
});
</script>

<template>
    <div ref="target" :class="$style.menu_group">
        <component
            :is="menu.children ? 'button' : Link"
            :href="!menu.children ? menu.route : undefined"
            @click="toggleDropdown"
            :class="[
                $style.menu_link,
                isOpen || hasActiveChild ? $style.active_parent : '',
            ]"
        >
            <span :class="$style.icon_wrapper">
                <Icon :icon="menu.icon" />
            </span>
            <span :class="$style.label">{{ menu.name }}</span>

            <div
                v-if="menu.children"
                :class="[$style.arrow, isOpen ? $style.rotate : '']"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="17"
                    height="17"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill="currentColor"
                        d="m12 13.171l4.95-4.95l1.414 1.415L12 16L5.636 9.636L7.05 8.222z"
                    />
                </svg>
            </div>
        </component>

        <AnimatePresence>
            <motion.div
                v-if="isOpen && menu.children"
                :initial="{ height: 0, opacity: 0 }"
                :animate="{ height: 'auto', opacity: 1 }"
                :exit="{ height: 0, opacity: 0 }"
                :transition="{
                    duration: 0.3,
                    ease: 'circInOut',
                }"
                style="overflow: hidden"
            >
                <div :class="$style.submenu_container">
                    <Link
                        v-for="sub in menu.children"
                        :key="sub.route"
                        :href="sub.route"
                        :class="[$style.submenu_link]"
                    >
                        <span :class="$style.dot">
                            <Icon :icon="sub.icon" />
                        </span>
                        <span>{{ sub.name }}</span>
                    </Link>
                </div>
            </motion.div>
        </AnimatePresence>
    </div>
</template>

<style module>
.icon_wrapper {
    font-size: 1.3rem;
    margin-right: 0.4rem;
}
.menu_group {
    width: 100%;
    margin-bottom: 4px;
}

.menu_link {
    display: flex;
    width: 100%;
    align-items: center;
    font-family: var(--font-nunito);
    font-weight: 600;
    padding: 8px 14px;
    border-radius: 0px;
    color: #57534e; /* stone-600 */
    transition: all 0.2s ease;
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
}

.menu_link:hover {
    background-color: #f0fdf4;
    color: #059669;
}

.active_parent {
    background-color: #f0fdf4;
    color: #059669;
}

.label {
    flex-grow: 1;
    text-align: left;
}

.arrow {
    transition: transform 0.3s ease;
    display: flex;
    align-items: center;
    transform: rotate(-90deg);
}

.rotate {
    transform: rotate(0);
}

.submenu_container {
    padding-left: 12px;
    margin-top: 2px;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.submenu_link {
    display: flex;
    align-items: center;
    padding: 7px 12px;
    font-size: 14px;
    color: #78716c; /* stone-500 */
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.2s;
}

.submenu_link:hover {
    background-color: #f0fdf4; /* emerald-50/10 */
    color: #059669;
}

.active_sub {
    background-color: #ecfdf5;
    color: #059669;
}

.dot {
    border-radius: 50%;
    margin-right: 10px;
    opacity: 0.5;
}
</style>
