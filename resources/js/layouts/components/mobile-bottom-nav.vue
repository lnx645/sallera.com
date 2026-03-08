<template>
    <Teleport to="body">
        <nav :class="$style.bottomNav">
            <div :class="$style.container">
                <button
                    v-for="item in navItems"
                    :key="item.id"
                    :class="[
                        $style.navItem,
                        { [$style.active]: activeTab === item.id },
                    ]"
                    @click="activeTab = item.id"
                >
                    <div :class="$style.iconWrapper">
                        <Icon
                            :icon="
                                activeTab === item.id
                                    ? item.activeIcon
                                    : item.icon
                            "
                        />
                    </div>
                    <span :class="$style.label">{{ item.label }}</span>

                    <div
                        v-if="activeTab === item.id"
                        :class="$style.indicator"
                    />
                </button>
            </div>
        </nav>
    </Teleport>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Icon } from '@iconify/vue';

const activeTab = ref('home');

const navItems = [
    {
        id: 'home',
        label: 'Beranda',
        icon: 'solar:home-2-linear',
        activeIcon: 'solar:home-2-bold',
    },
    {
        id: 'menu',
        label: 'Menu',
        icon: 'solar:widget-linear',
        activeIcon: 'solar:widget-bold',
    },
    {
        id: 'store',
        label: 'Toko',
        icon: 'solar:shop-linear',
        activeIcon: 'solar:shop-bold',
    },
    {
        id: 'profile',
        label: 'Profil',
        icon: 'solar:user-circle-linear',
        activeIcon: 'solar:user-circle-bold',
    },
];
</script>
<style module lang="scss">
.bottomNav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 64px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);

    box-shadow:
        0 -4px 12px rgba(0, 0, 0, 0.05),
        0 -1px 0 rgba(0, 0, 0, 0.02);

    border-top: 1px solid rgba(229, 231, 235, 0.5);

    display: flex;
    align-items: center;
    z-index: 40;
    padding-bottom: env(safe-area-inset-bottom);
}

.container {
    display: flex;
    width: 100%;
    max-width: 640px;
    margin: 0 auto;
    justify-content: space-around;
    padding-inline: 12px;
}

.navItem {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex: 1;
    position: relative;
    background: none;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    gap: 4px;

    svg {
        font-size: 24px;
        color: #94a3b8; // Slate 400
        transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .label {
        font-size: 11px;
        font-weight: 500;
        color: #94a3b8;
        transition: color 0.2s ease;
    }

    &.active {
        svg {
            color: var(--color-stone-500); // Slate 800
            transform: translateY(-2px);
        }
        .label {
            color: var(--color-stone-500); // Slate 800
            font-weight: 600;
        }
    }
}

.indicator {
    position: absolute;
    top: -10px; // Muncul sedikit di atas nav
    width: 54px;
    height: 1px;
    background: var(--color-stone-400); // Warna brand kamu
    border-radius: 10%;
}
</style>
