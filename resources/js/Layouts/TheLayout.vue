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

    <div class="content mx-6">
      <slot />
    </div>

    <TheHighlights />

    <TheFooter />
  </div>
</template>

<style>
  html, body {
    margin: 0;
    padding: 0;
    background-color: #fefefe;
  }

  .wrapper {
    display: grid;
    grid-template-areas:
      ". header header header ."
      ". sidebar content highlights ."
      ". footer footer footer .";
    /* Only expand middle section vertically (content and sidebars) */
    grid-template-rows: 0fr 5fr 0fr;
    /* 100% width, but static widths for content and sidebars */
    grid-template-columns: 1fr 260px 600px 380px 1fr;
    /* Force grid to be at least the height of the screen */
    min-height: 1vh;
  }

  .sticky-content {
    bottom: 2.2rem;
    padding: calc(5.5rem + 10px) 10px 10px;
    margin-top: calc(0px - 5.5rem);
  }

  .header {
    grid-area: header;
  }

  .sidebar {
    grid-area: sidebar;
    font-family: din-round, sans-serif;
  }

  .content {
    grid-area: content;
  }

  .highlights {
    grid-area: highlights;
  }

  .footer {
    grid-area: footer;
    bottom: 0;
  }
</style>
