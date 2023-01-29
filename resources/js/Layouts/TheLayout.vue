<script setup>
import TheHeader from '@/Layouts/TheHeader.vue';
import TheFooter from '@/Layouts/TheFooter.vue';
import TheSidebar from '@/Layouts/TheSidebar.vue';
import TheHighlights from '@/Layouts/TheHighlights.vue';
</script>

<template>
  <div class="wrapper">
    <TheHeader />

    <TheSidebar />

    <div class="content">
      <slot />
    </div>

    <TheHighlights class="mt-10 text-center" />

    <TheFooter />
  </div>
</template>

<style>
  html, body {
    margin: 0;
    padding: 0;
  }

  .wrapper {
    display: grid;
    grid-template-areas:
      "empty header header header header"
      "empty_left sidebar content highlights empty_right"
      "footer footer footer footer footer";
    /* Only expand middle section vertically (content and sidebars) */
    grid-template-rows: 10fr 100fr 5fr;
    /* 100% width, but static widths for content and sidebars */
    grid-template-columns: 1fr 240px 660px 380px 1fr;
    /* Force grid to be at least the height of the screen */
    min-height: 100vh;
  }

  .content {
    grid-area: content;
  }

  .sticky-spacer {
    flex-grow: 1;
  }

  .sticky-content {
    position: sticky;
    bottom: 2.2rem;
    min-height: calc(100vh - 2.2rem);
    box-sizing: border-box;
    padding:
      calc(5.5rem + 10px)
      10px
      10px;
    margin-top: calc(0px - 5.5rem);
  }
</style>
