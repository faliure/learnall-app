<script setup>
    import SelectableOption from '@/Components/Exercise/Partials/SelectableOption.vue';

    const props = defineProps({
        options: Array,
    });
</script>

<template>
    <section class="flex flex-wrap">
        <SelectableOption
            v-for="option in options"
            :option="option"
            @selected="option => option.active && $emit('selected', option)"
        />
    </section>
</template>
