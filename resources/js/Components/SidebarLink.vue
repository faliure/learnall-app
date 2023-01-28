<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  link: Object,
});
</script>

<template>
  <Link :href="link.target" class="no-underline flex items-center mb-5 ml-4">
    <img class="mr-3 h-8" :alt="link.label" :src="link.icon" />
    <span class="text-gray-500 font-bold">{{ link.label }}</span>
  </Link>
</template>
