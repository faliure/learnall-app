<script setup>
    const props = defineProps({
        unit: Object,
    });
</script>

<template>
    <section class="cursor-pointer text-center">
        <div
            class="flex h-24 w-24 rounded-full bg-blue-900 text-blue-300 justify-center items-center opacity-80
                hover:opacity-100"
            :title="unit.description"
        >
            {{ unit.id }}
        </div>

        <div class="pt-2 text-xs opacity-40">
            {{ unit.name.substring(0, 14) }}
        </div>
    </section>
</template>
