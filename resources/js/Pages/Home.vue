<script setup>
    import CourseSelection from '@/Components/Course/Selection.vue';
    import Course from '@/Components/Course/Course.vue';

    const props = defineProps({
      courses: Array,
      course: Object,
    });
</script>

<template>
    <Course v-if="course" :course="course" />
    <CourseSelection v-else :courses="courses" />
</template>
