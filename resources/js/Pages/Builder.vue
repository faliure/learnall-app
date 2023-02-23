<script setup>
    import UnitPreview from '@/Pages/Secondary/UnitPreview.vue';

    defineProps({ units: Array });
</script>

<template>
  <section class="flex flex-col gap-1">
      <UnitPreview
          v-for="unit in units"
          :key="unit.id"
          :unit="unit"
      />
  </section>
</template>
