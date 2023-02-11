<script setup>
  import { Link } from '@inertiajs/vue3';
  import CourseFlag from '@/Components/CourseFlag.vue';

  defineProps({
    course: Object,
  });

</script>

<template>
  <Link :href="`/api/users/${$page.props.user.id}`" method="put" as="button" :data="{ active_course: course.id }">
    <CourseFlag :fromLang="course.fromLanguage" :toLang="course.language" />
    <div>
      <div class="text-lg font-bold text-blue-900 opacity-70">{{ course.language.name }}</div>
      <div class="text-[0.6rem]">For {{ course.fromLanguage.name }} speakers</div>
    </div>
  </Link>
</template>
