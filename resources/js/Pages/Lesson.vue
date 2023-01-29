<script lang="ts">
  import TheLayout from '@/Layouts/TheLayout.vue';

  export default {
    props: { lesson: Object },

    layout: TheLayout,
  };
</script>

<template>
  <div v-for="exercise in lesson.exercises" :key="exercise.id" class="block p-3 my-4 rounded-xl border border-solid border-black">
    <div>{{ exercise.question }}</div>
    <div class="text-gray-300 mt-3 text-right">Answer: {{ exercise.answer }}</div>
  </div>
</template>
