<script lang="ts">
  import TheLayout from '@/Layouts/TheLayout.vue';
  import LessonPreview from '@/Components/LessonPreview.vue';

  export default {
    components: { LessonPreview },

    props: { unit: Object },

    layout: TheLayout,
  };
</script>

<template>
  <LessonPreview v-for="lesson in unit.lessons" :key="lesson.id" :lesson="lesson" />
</template>
