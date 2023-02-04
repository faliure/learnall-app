<script setup>
  import { getCurrentPage } from '../Shared/pages';

  const color = getCurrentPage().color;
</script>

<template>
  <footer
    class="flex items-center justify-around h-12 border-t-2 text-gray-300 text-sm"
    :class="`text-${color}-300 border-${color}-300`"
  >
    Footer (reserved)
  </footer>
</template>
