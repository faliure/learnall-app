<script setup>
  import CourseSelection from '@/Components/Course/Selection.vue';

  const props = defineProps({
    courses: Array,
  });
</script>

<template>
  <CourseSelection :courses="courses" />
</template>
