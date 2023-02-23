<script setup>
    import ReadAndTranslateBack from '@/Components/Exercise/ReadAndTranslateBack.vue';
    import ReadAndPickTheWords from '@/Components/Exercise/ReadAndPickTheWords.vue';

    const props = defineProps({
        lesson: Object,
    });

    const exercise = props.lesson.exercises[1];
</script>

<template>
    <div v-if="! exercise">Oops! Looks like this lesson has no exercises yet :-/</div>

    <div v-else>
        <div class="w-4/5 mx-auto text-right text-lg font-extralight text-gray-600 opacity-60 mb-5">
            {{ exercise.type.description }}
        </div>

        <ReadAndTranslateBack v-if="exercise.type.type === 'ReadAndTranslateBack'" :exercise="exercise" />
        <ReadAndPickTheWords v-else-if="exercise.type.type === 'ReadAndPickTheWords'" :exercise="exercise" />
    </div>


</template>
