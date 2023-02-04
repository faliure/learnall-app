<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="px-4 py-2 w-24 rounded-md uppercase bg-blue-600 text-white hover:bg-blue-900 focus:bg-gray-700 active:bg-gray-900"
    >
        <slot />
    </button>
</template>
