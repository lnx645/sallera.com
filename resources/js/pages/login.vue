<script setup lang="ts">
import Button from '@/components/button.vue';
import Input from '@/components/input.vue';
import { ref, reactive } from 'vue';

const form = reactive({
    email: '',
    password: ''
});

const handleLogin = () => {
    console.log('Login dengan:', form);
};
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-stone-50">
        <div class="w-full max-w-sm rounded-2xl bg-white p-8 shadow-xl shadow-stone-200/50 border border-stone-100">
            
            <div class="mb-8 text-center">
                <h3 class="text-2xl font-black tracking-tight text-stone-800">
                    SALERA<span class="text-blue-600">POS</span>
                </h3>
                <p class="text-xs font-medium text-stone-400 mt-1">Silahkan masuk ke akun Anda</p>
            </div>

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

                <div class="pt-2">
                    <Button 
                        variant="success" 
                        @click="handleLogin"
                    >
                        Masuk Sekarang
                    </Button>
                </div>

                <p class="text-center text-[10px] text-stone-400">
                    Lupa password? Hubungi Administrator
                </p>
            </div>
        </div>
    </div>
</template>