<script setup lang="ts">
import AuthLoginController from '@/actions/App/Http/Controllers/AuthLoginController';
import Button from '@/components/button.vue';
import Checkbox from '@/components/Checkbox.vue';
import Input from '@/components/input.vue';
import LoadingIcon from '@/icons/loading-icon.vue';
import { useForm } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';

const form = useForm({
    email: '',
    rememberMe: false,
    password: '',
});

const handleLogin = () => {
    form.submit(AuthLoginController.processing(), {
        onSuccess() {
            form.reset();
        },
        onError() {
            form.reset();
        },
    });
};
</script>

<template>
    <div class="flex min-h-screen items-center justify-center bg-stone-50">
        <div
            class="w-full max-w-sm rounded-2xl border border-stone-100 bg-white p-8 shadow-[0px_6px_0px] shadow-stone-200/50"
        >
            <div class="mb-8 text-center">
                <h3 class="text-2xl font-black tracking-tight text-stone-800">
                    SALERA<span class="text-blue-600">POS</span>
                </h3>
                <p class="mt-1 text-xs font-medium text-stone-400">
                    Silahkan masuk ke akun Anda
                </p>
            </div>

            <div class="space-y-3">
                <div class="space-y-5">
                    <Input
                        v-model="form.email"
                        label="Alamat Email"
                        type="email"
                    />

                    <Input
                        v-model="form.password"
                        type="password"
                        label="Kata Sandi"
                    />
                </div>
                <Checkbox
                    variant="primary"
                    size="sm"
                    label="Ingat Saya"
                    v-model="form.rememberMe"
                />
                <div class="pt-2">
                    <Button variant="primary" @click="handleLogin">
                        <LoadingIcon v-if="form.processing" />
                        <div
                            :class="{
                                'ml-2': form.processing,
                            }"
                        >
                            Masuk Sekarang
                        </div>
                    </Button>
                </div>

                <p class="text-center text-[10px] text-stone-400">
                    Lupa password? Hubungi Administrator
                </p>
            </div>
        </div>
    </div>
</template>
