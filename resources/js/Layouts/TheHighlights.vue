<script setup>
</script>

<template>
  <div class="highlights">
    <div class="sticky-spacer"></div>
    <div class="sticky-content">
      Right Sidebar
    </div>
  </div>
</template>

<style scoped>
  .highlights {
    grid-area: highlights;
    display: flex;
    flex-direction: column;
    position: sticky;
    top: 0;
  }
</style>
