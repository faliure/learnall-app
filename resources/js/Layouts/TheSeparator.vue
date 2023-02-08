<script setup>
  import { getCurrentPageRef } from '../Shared/pages';

  let currentPage = getCurrentPageRef();
</script>

<template>
  <div
    class="h-1 blur-sm bg-gradient-to-r opacity-50 from-transparent"
    :class="`via-${currentPage.color}-500`
  "></div>
</template>
