<script setup>
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const props = defineProps({
        canCheck: Boolean,
        canSkip: Boolean,
    });

    const emit = defineEmits([
        'check',
        'skip',
    ]);
</script>

<template>
    <div class="flex flex-row mx-auto justify-around gap-6 text-sm mt-6">
        <PrimaryButton
            @click="canCheck ? $emit('check') : null"
            class="px-20 text-blue-100 bg-blue-900"
            :class="canCheck ? 'cursor-pointer opacity-100' : 'cursor-not-allowed opacity-40'"
        >
            Check
        </PrimaryButton>

        <PrimaryButton
            v-if="canSkip"
            @click="$emit('skip')"
            class="bg-transparent border text-blue-500 border-blue-100"
        >
            Skip <span class="text-lg align-middle ml-1">😞</span>
        </PrimaryButton>
    </div>
</template>
