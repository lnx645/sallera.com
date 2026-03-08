<script setup lang="ts">
import { computed } from 'vue';

interface Props {
    type?: string;
    name?: string;
    id?: string;
    label?: string;
    modelValue: any;
    isCurrency?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    type: 'text',
    modelValue: '',
    name: () => Math.random().toString(36).substring(2, 7),
    id: () => Math.random().toString(36).substring(2, 7),
    isCurrency: false,
});
const emit = defineEmits(['update:modelValue']);
const displayValue = computed({
    get: () => {
        if (!props.modelValue) return '';
        if (props.isCurrency) {
            return `Rp. ${new Intl.NumberFormat('id-ID').format(
                Number(props.modelValue),
            )}`;
        }
        return props.modelValue;
    },
    set: (value: string) => {
        const cleanNumber = value.replace(/\D/g, '');
        emit('update:modelValue', cleanNumber === '' ? 0 : Number(cleanNumber));
    },
});
</script>

<template>
    <div class="block w-full">
        <label
            class="mb-0.5 flex select-none items-center gap-x-3 text-xs font-medium text-[#61667c]"
            v-if="label"
            :for="name"
        >
            {{ label }}
        </label>
        <label
            :for="name"
            role="group"
            aria-labelledby="email-label"
            :class="$style.wrapper"
        >
            <div :class="$style.input">
                <input
                    :type="type"
                    v-model="displayValue"
                    :id="name"
                    placeholder="Email@website.com"
                    :class="$style.field"
                />
            </div>
        </label>
    </div>
</template>
<style module lang="scss">
.wrapper {
    width: 100%;
    height: 36px;
    cursor: text;
    display: flex;
    align-items: center;
    padding-inline: 13px;
    border-radius: 0.5rem;
    border: 1px solid #e5e6ea;
    background-color: #ffffff; // Pastikan wrapper punya bg solid
    box-shadow:
        0 1.5px 1.5px #00000017,
        0 1px 3px #0000000a;
    transition: all 0.2s ease-in-out;
    user-select: none;
    svg {
        color: #9ca3af;
    }
    &:focus-within {
        border-color: var(--color-blue-500);
        box-shadow:
            0 0 0 3px var(--color-blue-200),
            0 2px 4px #0000003d inset !important;
        svg {
            color: #374151;
        }
    }

    .input {
        display: flex;
        gap: 2px;
        flex: 1;
        width: 100%;
        align-items: center;
    }

    .field {
        width: 100%;
        height: 100%;
        display: block;
        border: none;
        background: transparent;
        padding: 0;

        // --- Typography Adjustment ---
        font-size: 14px; // Atau 16px jika ingin menghindari zoom di iOS
        font-weight: 500; // 450 kurang umum di sistem font, gunakan 500 (Medium)
        line-height: 1.25; // Memastikan teks berada di tengah secara vertikal
        letter-spacing: -0.01em; // Sedikit merapatkan teks agar terlihat lebih modern
        color: #1f2937; // Menggunakan Slate 800 agar lebih terbaca dibanding #374151

        outline: none;
        appearance: none;

        &::placeholder {
            color: #9ca3af;
            font-weight: 400; // Placeholder sebaiknya sedikit lebih tipis
        }
    }

    .input {
        display: flex;
        gap: 8px; // 2px terlalu rapat untuk icon, 8px (0.5rem) adalah standar spacing UI
        flex: 1;
        width: 100%;
        align-items: center;
    }

    svg {
        width: 18px; // Ukuran icon ideal untuk height 36px
        height: 18px;
        color: #9ca3af;
        flex-shrink: 0; // Agar icon tidak gepeng saat teks input terlalu panjang
    }
}
</style>
