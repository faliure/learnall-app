<script setup>
  import TheHeader from '@/Layouts/TheHeader.vue';
  import TheSidebar from '@/Layouts/TheSidebar.vue';
  import TheHighlights from '@/Layouts/TheHighlights.vue';
  import TheFooter from '@/Layouts/TheFooter.vue';
  import TheSeparator from '@/Layouts/TheSeparator.vue';
  import { setCurrentPage } from '@/Shared/pages';

  setCurrentPage();
</script>

<template>
  <div class="flex flex-col h-screen max-w-[1024px] m-auto bg-white shadow-2xl shadow-stone-800">
    <TheHeader />

    <TheSeparator />

    <section class="flex flex-1 overflow-hidden p-6 pt-10">
      <TheSidebar class="hidden md:flex flex-col w-1/4 min-w-fit overflow-y-auto" />

      <main class="w-full md:w-3/4 lg:w-1/2 px-3 overflow-y-auto">
        <slot />
      </main>

      <TheHighlights class="hidden lg:block w-1/4 px-3" />
    </section>

    <TheSeparator />

    <TheFooter class="h-16" />
  </div>
</template>
