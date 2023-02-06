<script setup>
  import pages from '@/Shared/pages';

  const colors = pages.map(p => p.color);
</script>

<template>
  <section class="text-center">
    <h1 class="text-3xl tracking-wider font-bold mb-12 uppercase">Color Palette</h1>

    <div class="flex flex-col items-center gap-3 align-middle text-center">
      <div v-for="color in colors" class="flex flex-row justify-around gap-2">
        <div
          v-for="saturation of [100, 200, 300, 400, 500, 600, 700, 800, 900]"
          :class="`square bg-${color}-${saturation}`"
          :title="`${color}-${saturation}`"
        >{{ saturation }}</div>
      </div>
    </div>
  </section>
</template>

<style scoped>
  div.square {
    display: inline-flex;
    height: 2.5rem;
    width: 2.5rem;
    align-items: center;
    justify-content: space-around;
    font-weight: bold;
    font-size: 0.7rem;
  }
</style>
