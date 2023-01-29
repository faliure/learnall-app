<script setup>
  import LessonPreview from '@/Components/LessonPreview.vue';

  defineProps({ unit: Object});
</script>

<template>
  <LessonPreview v-for="lesson in unit.lessons" :key="lesson.id" :lesson="lesson" />
</template>
