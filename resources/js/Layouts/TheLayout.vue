<script setup>
  import TheHeader from '@/Layouts/TheHeader.vue';
  import TheFooter from '@/Layouts/TheFooter.vue';
  import TheSidebar from '@/Layouts/TheSidebar.vue';
  import TheHighlights from '@/Layouts/TheHighlights.vue';
  import { setCurrentPage } from '@/Shared/pages';

  setCurrentPage();
</script>

<template>
  <div class="flex flex-col h-screen w-full xl:w-2/3 m-auto justify-center text-center bg-white shadow-2xl shadow-stone-800">
    <TheHeader class="flex w-full min-w-fit justify-around mb-10" />

    <section class="flex flex-row flex-1 w-full overflow-hidden bg-white">
      <TheSidebar class="hidden sm:block w-1/4 min-w-fit p-3 overflow-y-auto -mr-2" />

      <main class="w-full sm:w-3/4 lg:w-1/2 min-w-fit p-3 overflow-y-auto text-left">
        <slot />
      </main>

      <TheHighlights class="hidden lg:block w-1/4 min-w-fit p-3" />
    </section>

    <TheFooter class="h-20 pt-6 bg-white" />
  </div>
</template>
