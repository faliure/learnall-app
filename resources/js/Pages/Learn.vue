<script setup>
  import UnitPreview from '@/Components/UnitPreview.vue';

  defineProps({ units: Array });
</script>

<template>
  <UnitPreview v-for="unit in units" :key="unit.id" :unit="unit" />
</template>
