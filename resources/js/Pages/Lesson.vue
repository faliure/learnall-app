<script setup>
  defineProps({ lesson: Object });
</script>

<template>
  <div v-for="exercise in lesson.exercises" class="block p-3 my-4 rounded-xl border border-gray">
    <div>{{ exercise.question }}</div>
    <div class="text-gray-300 mt-3 text-right">Answer: {{ exercise.answer }}</div>
  </div>
</template>
