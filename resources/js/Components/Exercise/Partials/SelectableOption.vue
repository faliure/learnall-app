<script setup>
    const props = defineProps({
        option: Object,
    });
</script>

<template>
    <div
        class="py-1 px-3 border border-gray-200 bg-gray-300 rounded-xl"
        :class="option.active ? 'cursor-pointer hover:bg-gray-400' : 'opacity-30 cursor-not-allowed'"
        @click="$emit('selected', option)"
    >
        {{ option.text }}
    </div>
</template>
