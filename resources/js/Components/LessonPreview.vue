<script setup>
  defineProps({ lesson: Object });
</script>

<template>
  <Link
    :href="`/lessons/${lesson.id}`"
    class="py-2 rounded-xl border border-gray text-center font-bold bg-emerald-900 bg-opacity-5 hover:bg-opacity-20"
  >
    {{ lesson.name }}
  </Link>
</template>
