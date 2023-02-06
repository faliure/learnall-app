<script setup>
  import { getCurrentPageRef } from '../Shared/pages';

  let currentPage = getCurrentPageRef();
</script>

<template>
  <section class="relative w-full">
    <div
      class="absolute h-1 left-4 right-4 blur-sm opacity-30"
      :class="`bg-${currentPage.color}-500`"
    ></div>
  </section>
</template>
