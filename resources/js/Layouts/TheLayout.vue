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
  <div class="flex flex-col h-screen max-w-[1024px] m-auto bg-white shadow-2xl shadow-stone-800 font-nova">
    <TheHeader />

    <TheSeparator class="hidden md:block" />

    <section class="flex flex-col justify-center md:flex-row flex-1 overflow-hidden md:p-6 md:pt-10">
      <TheSidebar
        v-if="$page.props.user && $page.props.course"
        class="flex md:flex-col justify-around md:justify-start md:w-1/4 min-w-fit overflow-y-auto pb-2"
      />

      <main class="flex-1 h-full md:-mt-3 p-3 overflow-y-auto
        bg-gradient-to-t from-zinc-50 rounded-xl">
        <slot />
      </main>

      <TheHighlights
        v-if="$page.props.user && $page.props.course"
        class="hidden lg:block w-1/4 px-3"
      />
    </section>

    <TheSeparator />

    <TheFooter class="hidden md:flex h-16" />
  </div>
</template>
