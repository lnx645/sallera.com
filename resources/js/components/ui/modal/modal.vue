<template>
  <TransitionRoot appear :show="modelValue" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-10">
      <TransitionChild as="template" 
        enter="duration-300 ease-out" 
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
         leave-from="opacity-100" leave-to="opacity-0">
<div class="fixed inset-0 bg-slate-900/30 backdrop-blur-[2px] transition-opacity" />
    </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
          <TransitionChild as="template" 
           enter="animate__animated animate__tada animate__faster"
            leave="animate__animated animate__fadeOut animate__faster">
            <DialogPanel
              class="w-full max-w-md transform goverflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
              <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                {{ title }}
              </DialogTitle>
              <div class="mt-2">
                <slot name="body" />
              </div>

              <div class="mt-4">
                <div class="flex">
                  <slot name="footer" />
                </div>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'
withDefaults(defineProps<{ title?: string, modelValue: boolean; }>(), { title: "Modal", modelValue: false })
const emit = defineEmits(['update:modelValue', 'close'])
function closeModal() {
  emit('update:modelValue', false)
  emit('close')
}

</script>
