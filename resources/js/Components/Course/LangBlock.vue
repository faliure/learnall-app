<script setup>
    import { usePage } from '@inertiajs/vue3';
    import CourseCard from '@/Components/Course/Card.vue';

    const props = defineProps({
        courses: Array,
    });

    const activeCourse = (course) => usePage().props.user.course_id === course.id;
</script>

<template>
    <div class="flex justify-items-stretch flex-col gap-4 -mx-2 mb-2">
        <div class="flex items-center -mb-3 pl-1 bg-white">
            <div class="fflag ff-md" :class="`fflag-${courses[0].fromLanguage.flag}`"></div>
            <div class="ml-2 text-sm text-stone-900 opacity-40">{{ courses[0].fromLanguage.name }} speakers</div>
        </div>

        <div class="grid grid-cols-[repeat(auto-fill,minmax(12rem,0.5fr))] gap-2 bg-stone-200 bg-opacity-10 rounded-xl">
            <CourseCard
                v-for="course in courses"
                :course="course"
                :class="{
                    'cursor-default shadow-lg bg-opacity-30': activeCourse(course),
                    'cursor-pointer bg-opacity-5 hover:bg-opacity-30': ! activeCourse(course),
                }"
                class="flex items-center gap-2 p-2 min-w-fit rounded-lg bg-stone-900 shadow-md hover:shadow-lg"
            />
        </div>
    </div>
</template>
