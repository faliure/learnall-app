<script lang="ts">
  import TheLayout from '@/Layouts/TheLayout.vue';
  import UnitPreview from '@/Components/UnitPreview.vue';

  export default {
    components: { UnitPreview },

    props: { units: Array },

    layout: TheLayout,
  };
</script>

<template>
  <UnitPreview v-for="unit in units" :key="unit.id" :unit="unit" />
</template>
