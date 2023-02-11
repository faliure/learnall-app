<script setup>
    import CoursesByLang from '@/Components/Course/LangBlock.vue';

    const props = defineProps({
      course: Object,
    });
</script>

<template>
    {{ course.units }}
</template>
