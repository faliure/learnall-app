<script setup>
import { ref } from 'vue';
import SidebarLink from '@/Components/SidebarLink.vue';

const links = ref([
    { "label": "Learn", "target": "/learn", "icon": "https://d35aaqx5ub95lt.cloudfront.net/vendor/784035717e2ff1d448c0f6cc4efc89fb.svg" },
    { "label": "Practice", "target": "/practice", "icon": "https://d35aaqx5ub95lt.cloudfront.net/vendor/5187f6694476a769d4a4e28149867e3e.svg" },
    { "label": "Leaderboard", "target": "/leaderboard", "icon": "https://d35aaqx5ub95lt.cloudfront.net/vendor/ca9178510134b4b0893dbac30b6670aa.svg" },
    { "label": "Shop", "target": "/shop", "icon": "https://d35aaqx5ub95lt.cloudfront.net/vendor/0e58a94dda219766d98c7796b910beee.svg" },
    { "label": "Schools", "target": "/schools", "icon": "https://d35aaqx5ub95lt.cloudfront.net/vendor/3390675b86eeeab0b4119ccfcb5b186e.svg" }
]);
</script>

<template>
  <div class="sidebar mt-10">
    <div class="sticky-spacer"></div>
    <div class="sticky-content">
      <SidebarLink
        v-for="link in links"
        :key="link.label"
        :link="link" />
    </div>
  </div>
</template>

<style scoped>
  .sidebar {
    grid-area: sidebar;
    display: flex;
    flex-direction: column;
    position: sticky;
    top: 10px;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: .8px;
    text-transform: uppercase;
    font-family: din-round, sans-serif;
  }
</style>
