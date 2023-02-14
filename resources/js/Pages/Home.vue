<script setup>
    import CourseSelection from '@/Components/Course/Selection.vue';
    import Course from '@/Components/Course/Course.vue';

    const props = defineProps({
      courses: Array,
    });
</script>

<template>
    <CourseSelection v-if="! $page.props.course" :courses="courses" />
    <Course v-else :course="$page.props.course" />
</template>
