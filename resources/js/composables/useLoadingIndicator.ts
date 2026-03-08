import { useProgress } from "@bprogress/vue";
import { router } from '@inertiajs/vue3';
import { onUnmounted } from "vue";
import { BProgress } from '@bprogress/core';
BProgress.configure({ 
    showSpinner: false,
});
export const useLoadingIndicator = () => {
    const { start, stop } = useProgress();
    const unbindStart = router.on('start', () => start());
    const unbindFinish = router.on('finish', () => stop());

    onUnmounted(() => {
        unbindStart();
        unbindFinish();
    });
};
