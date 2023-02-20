<script setup>
    import ReadAndTranslateBack from '@/Components/Exercise/ReadAndTranslateBack.vue';

    const props = defineProps({
        lesson: Object,
    });

    const exercise = props.lesson.exercises[0];
</script>

<template>
    <ReadAndTranslateBack v-if="exercise" :exercise="exercise" />

    <div v-else>Oops! Looks like this lesson has no exercises yet :-/</div>
</template>
