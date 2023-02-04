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
        class="px-4 py-2 w-24 rounded-md uppercase focus:bg-gray-700 active:bg-gray-900"
        :class="`text-${color}-100 bg-${color}-600 hover:bg-${color}-900`"
    >
        <slot />
    </button>
</template>
