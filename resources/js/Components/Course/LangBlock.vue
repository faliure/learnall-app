<script setup>
    import { usePage } from '@inertiajs/vue3';
    import CourseCard from '@/Components/Course/Card.vue';

    const props = defineProps({
        courses: Array,
    });

    const activeCourse = (course) => usePage().props.user.course_id === course.id;
</script>

<template>
    <div class="flex flex-wrap justify-items-stretch gap-4 py-1">
        <CourseCard
            v-for="course in courses"
            :course="course"
            :class="{
                'cursor-default shadow-lg bg-opacity-30': activeCourse(course),
                'cursor-pointer bg-opacity-5 hover:bg-opacity-30': ! activeCourse(course),
            }"
            class="flex items-center grow gap-2 p-3 rounded-lg bg-stone-900 shadow-md hover:shadow-lg"
        />
    </div>
</template>
