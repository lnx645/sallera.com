<script setup lang="ts">
import IconArrowDown from '@/icons/icon-arrow-down.vue';
import { Link } from '@inertiajs/vue3';
import { ref, computed, useCssModule } from 'vue';

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
</script>

<template>
    <div :class="$style.menu_group">
        <component
            :is="menu.children ? 'button' : Link"
            :href="!menu.children ? '' : undefined"
            @click="toggleDropdown"
            :class="[
                $style.menu_link,
                isOpen || hasActiveChild ? $style.active_parent : '',
            ]"
        >
            <span :class="$style.icon_wrapper"> </span>
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

        <div
            v-if="menu.children"
            v-show="isOpen"
            :class="$style.submenu_container"
        >
            <Link
                v-for="sub in menu.children"
                :key="sub.route"
                href=""
                :class="[$style.submenu_link]"
            >
                <span :class="$style.dot"></span>
                <span>{{ sub.name }}</span>
            </Link>
        </div>
    </div>
</template>

<style module>
.menu_group {
    width: 100%;
    margin-bottom: 4px;
}

.menu_link {
    display: flex;
    width: 100%;
    align-items: center;
    padding: 8px 12px;
    border-radius: 8px;
    color: #57534e; /* stone-600 */
    transition: all 0.2s ease;
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
}

.menu_link:hover {
    background-color: #ecfdf5; /* emerald-50 */
    color: #065f46; /* emerald-800 */
}

.active_parent {
    color: #059669; /* emerald-600 */
    font-weight: 500;
}

.label {
    flex-grow: 1;
    text-align: left;
}

.arrow {
    transition: transform 0.3s ease;
    display: flex;
    align-items: center;
}

.rotate {
    transform: rotate(180deg);
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
    padding: 6px 12px;
    font-size: 13px;
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
    font-weight: 500;
}

.dot {
    width: 4px;
    height: 4px;
    background-color: currentColor;
    border-radius: 50%;
    margin-right: 10px;
    opacity: 0.5;
}
</style>
