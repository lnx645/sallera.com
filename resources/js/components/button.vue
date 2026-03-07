<script setup lang="ts">
import { motion } from 'motion-v';

// Definisi Props untuk variasi tombol
interface Props {
    variant?: 'primary' | 'secondary' | 'success' | 'red' | 'default';
    type?: 'button' | 'submit' | 'reset';
    disabled?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    variant: 'default',
    type: 'button',
    disabled: false,
});
</script>

<template>
    <motion.button
        :type="type"
        :disabled="disabled"
        :class="[
            $style.button,
            $style[`variant_${props.variant}`],
            disabled ? $style.is_disabled : '',
        ]"
    >
        <slot />
    </motion.button>
</template>

<style module>
.button {
    cursor: pointer;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-width: 1px;
    border-style: solid;
    position: relative;
    font-family: var(--font-sans, sans-serif);
    font-weight: 600;
    line-height: 1;
    font-size: 14px;
    border-radius: 12px;
    padding: 12px 20px;
    width: 100%;
    transition: all 0.1s ease;
    outline: none;
    user-select: none;
}

/* Logic 3D: Saat ditekan akan turun 4px */
.button:not(:disabled):active {
    box-shadow: transparent 0px 0px 0px 0px !important;
    transform: translateY(4px);
}

/* 1. Default (Bawaan - Grey) */
.variant_default {
    color: #525252;
    background-color: #f8f8f8;
    border-color: #d4d4d4;
    box-shadow: #9c9c9c 0px 4px 0px;
}
.variant_default:hover {
    background-color: #f1f1f1;
}

/* 2. Primary (Blue) */
.variant_primary {
    color: #ffffff;
    background-color: #088be8;
    border-color: #077bc9;
    box-shadow: #055a92 0px 4px 0px;
}
.variant_primary:hover {
    background-color: #077bc9;
}

/* 3. Secondary (Stone/Dark) */
.variant_secondary {
    color: #ffffff;
    background-color: #44403c;
    border-color: #292524;
    box-shadow: #1c1917 0px 4px 0px;
}
.variant_secondary:hover {
    background-color: #292524;
}

/* 4. Success (Green) */
.variant_success {
    color: #ffffff;
    background-color: rgb(60, 210, 120);
    border-color: rgb(43, 149, 85);
    box-shadow: rgb(43, 149, 85) 0px 4px 0px;
}
.variant_success:hover {
    color: rgb(254, 254, 254);
    background-color: rgb(55, 191, 109);
    border-color: rgb(43, 149, 85);
    box-shadow: rgb(43, 149, 85) 0px 4px 0px;
}

/* 5. Red (Danger) */
.variant_red {
    color: #ffffff;
    background-color: rgb(229, 0, 39);
    border-color: rgb(163, 0, 28);
    box-shadow: rgb(163, 0, 28) 0px 4px 0px 0px 4px 0px;
}
.variant_red:hover {
    color: rgb(254, 254, 254);
    background-color: rgb(208, 0, 35);
    border-color: rgb(163, 0, 28);
    box-shadow: rgb(163, 0, 28) 0px 4px 0px;
}

/* Disabled State */
.is_disabled {
    cursor: not-allowed;
    opacity: 0.5;
    box-shadow: none !important;
    transform: none !important;
}
</style>
