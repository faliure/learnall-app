<script setup>
    const props = defineProps({
        unit: Object,
        index: Number,
    });
</script>

<template>
    <section class="flex flex-col items-center cursor-pointer py-2">
        <div
            class="h-24 w-24 rounded-full opacity-80 hover:opacity-100"
            :class="index === 3 ? 'border-4 border-indigo-900' : ''"
            :style="`background-image: url(https://picsum.photos/100?id=${ unit.id })`"
            :title="unit.description"
        ></div>

        <div class="pt-2 text-xs opacity-40">
            {{ unit.name.substring(0, 14) }}
        </div>
    </section>
</template>
