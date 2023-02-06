<script setup>
  import { getCurrentPageRef } from '../Shared/pages';
  import TheSeparator from '@/Layouts/TheSeparator.vue';

  let currentPage = getCurrentPageRef();
</script>

<template>
  <footer class="flex flex-col items-center justify-around uppercase text-gray-400 text-sm">
    <TheSeparator class="w-full -mt-2" />

    <section>
      Footer (reserved)
    </section>
  </footer>
</template>
