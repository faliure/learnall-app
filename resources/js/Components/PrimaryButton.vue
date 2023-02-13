<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
    color: {
        type: String,
        default: 'blue'
    },
});
</script>

<template>
    <button
        :type="type"
        class="px-4 py-2 rounded-md uppercase focus:bg-gray-700 active:bg-gray-900"
        :class="`bg-opacity-80 hover:bg-opacity-100`"
    >
        <slot />
    </button>
</template>
