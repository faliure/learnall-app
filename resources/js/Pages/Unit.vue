<script setup>
import LessonPreview from '@/Components/LessonPreview.vue';
import TheLayout from '@/Layouts/TheLayout.vue';

defineProps({
  unit: Object,
});
</script>

<template>
  <TheLayout>
    <LessonPreview v-for="lesson in unit.lessons" :key="lesson.id" :lesson="lesson" />
  </TheLayout>
</template>
