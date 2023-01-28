<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  lesson: Object,
})
</script>

<template>
    <Link :href="`/lessons/${lesson.id}`" class="block my-4 rounded-xl border border-solid border-black text-center py-2 font-extrabold mb-5 hover:bg-green-200">
        {{ lesson.name }}
    </Link>
</template>
