<script setup lang="ts">
import EyeIconHide from '@/icons/eye-icon-hide.vue';
import EyeIconShow from '@/icons/eye-icon-show.vue';
import { motion } from 'motion-v';
import { computed, ref } from 'vue';

let props = defineProps<{
    label: string;
    modelValue: string;
    type?: string;
}>();

defineEmits(['update:modelValue']);
let showPw = ref(false);
let type = computed(() => {
    if (props.type == 'password') {
        if (showPw.value) {
            return 'text';
        } else {
            return 'password';
        }
    }
    return props.type;
});
function handlePasswordShow() {
    showPw.value = !showPw.value;
}
</script>

<template>
    <div :class="$style.input_container">
        <input
            :type="type"
            :value="modelValue"
            @input="
                $emit(
                    'update:modelValue',
                    ($event.target as HTMLInputElement).value,
                )
            "
            :class="$style.input_field"
            placeholder=" "
            autocomplete="off"
        />
        <label :class="$style.input_label">{{ label }}</label>
        <motion.button
            @click.stop.passive="handlePasswordShow"
            v-if="props.type == 'password'"
            class="absolute top-1/2 right-2 -translate-x-1/2 -translate-y-1/2 cursor-pointer text-stone-300"
        >
            <EyeIconShow v-if="showPw" />
            <EyeIconHide v-else />
        </motion.button>
    </div>
</template>

<style module>
.input_container {
    position: relative;
    width: 100%;
    background-color: #ffffff;
}

.input_field {
    width: 100%;
    padding: 22px 16px 10px 16px;
    font-family: inherit;
    font-size: 16px;
    color: rgb(82, 82, 82); /* stone-800 */
    border: 1px solid #d1d5db; /* stone-300 */
    border-radius: 12px;
    background: transparent;
    outline: none;
    box-sizing: border-box;
    transition:
        border-color 0.2s ease,
        box-shadow 0.2s ease;
}

.input_field:focus {
    border-color: #9ca3af; /* stone-400 */
}
.input_label {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af; /* Warna abu-abu pudar seperti di gambar */
    font-size: 16px;
    font-weight: 400;
    pointer-events: none;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.input_field:focus ~ .input_label,
.input_field:not(:placeholder-shown) ~ .input_label {
    top: 14px;
    font-size: 11px;
    color: #9ca3af;
    font-weight: 500;
}

.input_field::placeholder {
    color: transparent;
}
.input_field:focus ~ .input_label,
.input_field:not(:placeholder-shown) ~ .input_label,
.input_field:-webkit-autofill ~ .input_label {
    top: 14px;
    font-size: 11px;
    color: #9ca3af;
    font-weight: 500;
}

.input_field:-webkit-autofill,
.input_field:-webkit-autofill:hover,
.input_field:-webkit-autofill:focus {
    -webkit-text-fill-color: #374151; /* Warna teks sesuai desain kamu */
    -webkit-box-shadow: 0 0 0px 1000px white inset; /* Memaksa background tetap putih */
    transition: background-color 5000s ease-in-out 0s;
}
</style>
