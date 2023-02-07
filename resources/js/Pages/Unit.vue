<script setup>
  import LessonPreview from '@/Components/LessonPreview.vue';

  defineProps({ unit: Object});
</script>

<template>
  <section class="flex flex-col gap-1">
    <LessonPreview
    v-for="lesson in unit.lessons"
    :key="lesson.id"
    :lesson="lesson" />
  </section>
</template>
