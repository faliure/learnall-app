<script setup>
  import CourseCard from '@/Components/Course/Card.vue';

  const props = defineProps({
    courses: Array,
  });

</script>

<template>
  <div class="flex flex-wrap justify-items-stretch gap-4 py-1">
    <CourseCard
      v-for="course in courses"
      :course="course"
      class="flex items-center grow gap-2 p-3 cursor-pointer rounded-lg
             shadow-md hover:shadow-sm bg-stone-900 bg-opacity-5 hover:bg-opacity-30"
    />
  </div>
</template>
