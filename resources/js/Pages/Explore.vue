<script setup>
  import pages from '@/Shared/pages';

  const colors = pages.map(p => p.color);
</script>

<template>
  <div class="flex pt-1 justify-center my-auto">Site under construction</div>
  <hr class="m-4" />
  <section class="text-center font-bold">
    <h1 class="text-3xl tracking-wider mb-12 uppercase">Color Palette</h1>

    <div class="flex flex-col justify-around gap-3 align-middle text-center">
      <div v-for="color in colors" class="flex justify-around gap-3 h-12">
        <div
          v-for="saturation of [100, 200, 300, 400, 500, 600, 700, 800, 900]"
          class="flex min-w-max justify-center items-center w-12 text-sm"
          :class="`bg-${color}-${saturation}`"
          :title="`${color}-${saturation}`"
        >{{ saturation }}</div>
      </div>
    </div>
  </section>
</template>
