<script setup>
  import { usePage } from '@inertiajs/vue3';
  import TheHeader from '@/Layouts/TheHeader.vue';
  import TheFooter from '@/Layouts/TheFooter.vue';
  import TheSidebar from '@/Layouts/TheSidebar.vue';
  import TheHighlights from '@/Layouts/TheHighlights.vue';
  import { setCurrentPage } from '@/Shared/pages';

  setCurrentPage();
</script>

<template>
  <div class="flex flex-col h-screen w-full xl:w-2/3 m-auto justify-center text-center">
    <TheHeader class="flex w-full min-w-fit justify-around mb-10" />

    <section class="flex flex-row flex-1 w-full overflow-hidden">
      <TheSidebar class="hidden sm:block w-1/4 min-w-fit p-3 overflow-y-auto" />

      <main class="w-full sm:w-3/4 lg:w-1/2 min-w-fit p-3 overflow-y-auto text-left">
        <slot />
      </main>

      <TheHighlights class="hidden lg:block w-1/4 min-w-fit p-3" />
    </section>

    <TheFooter class="mt-6" />
  </div>
</template>
