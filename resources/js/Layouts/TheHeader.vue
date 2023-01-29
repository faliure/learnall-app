<script setup>
</script>

<template>
  <div class="header flex items-center sticky top-0 h-20">
    <span class="not-duolingo">Not</span>
    <img src="https://d35aaqx5ub95lt.cloudfront.net/vendor/70a4be81077a8037698067f583816ff9.svg" alt="Trilingo" />
  </div>
</template>

<style scoped>
  .header {
    grid-area: header;
    z-index: 1;
    font-size: 2rem;
    line-height: 1.5;
    padding: 1.5rem;
    margin-left: 15px;
    background: #fff;
  }

  .header img {
    position: relative;
    top: 8px;
    height: 28px;
  }

  .header .not-duolingo {
    font-family: Comic Sans MS, Comic Sans, cursive;
    text-transform: uppercase;
    font-size: 32px;
    margin-right: 10px;
    color: #aaa;
  }
</style>
