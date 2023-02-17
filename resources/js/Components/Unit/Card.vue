<script setup>
    const props = defineProps({
        unit: Object,
        index: Number,
    });
</script>

<template>
    <section class="flex flex-col items-center cursor-pointer">
        <div
            class="h-16 w-16 sm:h-20 sm:w-20 rounded-full opacity-80 hover:opacity-100"
            :class="index === 3 ? 'border-8 border-blue-900' : ''"
            :style="`background-image: url(https://picsum.photos/100?id=${ unit.id })`"
            :title="unit.description"
        ></div>

        <div class="h-8 w-12 sm:w-20 mt-2 text-center line-clamp-2 text-xs opacity-40">
            {{ unit.name }}
        </div>
    </section>
</template>
