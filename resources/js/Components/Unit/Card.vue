<script setup>
    const props = defineProps({
        unit: Object,
        index: Number,
    });
</script>

<template>
    <Link :href="`units/${unit.position}`" class="flex flex-col items-center">
        <div
            class="h-16 w-16 sm:h-24 sm:w-24 rounded-full opacity-80 hover:opacity-100"
            :class="index === 3 ? 'border-8 border-blue-900' : ''"
            :style="`background-image: url(https://picsum.photos/100?id=${ unit.id })`"
            :title="unit.description"
        ></div>

        <div class="w-12 sm:w-24 mt-2 text-center line-clamp-3 text-xs opacity-40">
            {{ unit.name }}
        </div>
    </Link>
</template>
