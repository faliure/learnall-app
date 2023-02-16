<script setup>
    import { Link } from '@inertiajs/vue3';
    import CourseFlag from '@/Components/Course/Flag.vue';

    defineProps({
        course: Object,
    });
</script>

<template>
    <Link
        :href="`/api/users/${$page.props.user.id}`"
        method="put"
        as="button"
        :data="{ active_course: course.id, redirectTo: 'home' }"
    >
        <CourseFlag :fromLang="course.fromLanguage" :toLang="course.language" />

        <div>
            <div class="text-lg font-bold text-blue-900 opacity-70 text-left">
                {{ course.language.name }}
            </div>
            <div class="text-[0.6rem] shrink-0">
                For {{ course.fromLanguage.name }} speakers
            </div>
        </div>
    </Link>
</template>
