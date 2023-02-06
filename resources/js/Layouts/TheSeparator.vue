<script setup>
  import { getCurrentPageRef } from '../Shared/pages';

  let currentPage = getCurrentPageRef();
</script>

<template>
  <div class="h-1 mx-4 blur-sm opacity-30" :class="`bg-${currentPage.color}-500`"></div>
</template>
