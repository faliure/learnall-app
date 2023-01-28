<script setup>
import TheLayout from '@/Layouts/TheLayout.vue';
import UnitPreview from '@/Components/UnitPreview.vue';

defineProps({
  units: Array,
});
</script>

<template>
  <TheLayout>
    <UnitPreview v-for="unit in units" :key="unit.id" :unit="unit" />
  </TheLayout>
</template>
