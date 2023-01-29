<script setup>
  defineProps({ lesson: Object });
</script>

<template>
  <Link
    :href="`/lessons/${lesson.id}`"
    class="block my-4 rounded-xl border border-gray text-center py-2 font-extrabold mb-5 hover:bg-green-200"
  >
    {{ lesson.name }}
  </Link>
</template>
