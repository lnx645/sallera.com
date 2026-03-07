<script setup lang="ts">
import IconCheck from '@/icons/icon-check.vue';
import { computed, useCssModule } from 'vue';

const props = defineProps<{
    label: string;
    modelValue: boolean;
    variant?: 'primary' | 'success' | 'info' | 'warning' | 'danger';
    size?: 'sm' | 'md' | 'lg'; // Tambahkan prop size
}>();

const emit = defineEmits(['update:modelValue']);

const isChecked = computed({
    get: () => props.modelValue,
    set: (val) => emit('update:modelValue', val),
});

let $style = useCssModule();

// Mapping warna
const variantClass = computed(() => {
    const variants: Record<string, string> = {
        primary: $style.variant_primary,
        success: $style.variant_success,
        info: $style.variant_info,
        warning: $style.variant_warning,
        danger: $style.variant_danger,
    };
    return variants[props.variant || 'primary'];
});

// Mapping ukuran
const sizeClass = computed(() => {
    const sizes: Record<string, string> = {
        sm: $style.size_sm,
        md: $style.size_md,
        lg: $style.size_lg,
    };
    return sizes[props.size || 'md'];
});
</script>

<template>
    <label :class="[$style.container, variantClass, sizeClass]">
        <div :class="$style.checkbox_wrapper">
            <input
                type="checkbox"
                v-model="isChecked"
                :class="$style.real_input"
            />
            <div :class="[$style.custom_box, isChecked ? $style.checked : '']">
                <IconCheck v-if="isChecked" :class="$style.icon" />
            </div>
        </div>
        <span :class="$style.label_text">{{ label }}</span>
    </label>
</template>

<style module>
/* --- Base Styles --- */
.container {
    display: inline-flex;
    align-items: center;
    cursor: pointer;
    user-select: none;
    gap: 5px;
    padding: 4px 0;
}

.checkbox_wrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.real_input {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.custom_box {
    background-color: #ffffff;
    border: 1.5px solid #d1d5db;
    border-radius: 6px;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon {
    color: white;
}

/* --- Sizes Configuration --- */

/* Small (sm) */
.size_sm .checkbox_wrapper {
    width: 18px;
    height: 18px;
}
.size_sm .custom_box {
    width: 18px;
    height: 18px;
    border-radius: 4px;
}
.size_sm .icon {
    width: 11px;
    height: 11px;
}
.size_sm .label_text {
    font-size: 13px;
}

/* Medium (md) - Default */
.size_md .checkbox_wrapper {
    width: 22px;
    height: 22px;
}
.size_md .custom_box {
    width: 22px;
    height: 22px;
}
.size_md .icon {
    width: 14px;
    height: 14px;
}
.size_md .label_text {
    font-size: 14px;
}

/* Large (lg) */
.size_lg .checkbox_wrapper {
    width: 28px;
    height: 28px;
}
.size_lg .custom_box {
    width: 28px;
    height: 28px;
    border-radius: 8px;
}
.size_lg .icon {
    width: 18px;
    height: 18px;
}
.size_lg .label_text {
    font-size: 16px;
}

/* --- Variant Colors --- */
.variant_primary .checked {
    background-color: #077bc9;
    border-color: #1176b9;
}
.variant_success .checked {
    background-color: #22c55e;
    border-color: #22c55e;
}
.variant_info .checked {
    background-color: #3b82f6;
    border-color: #3b82f6;
}
.variant_warning .checked {
    background-color: #f59e0b;
    border-color: #f59e0b;
}
.variant_danger .checked {
    background-color: #ef4444;
    border-color: #ef4444;
}

.label_text {
    color: #57534e;
    font-weight: 400;
}

.container:active .custom_box {
    transform: scale(0.9);
}
</style>
