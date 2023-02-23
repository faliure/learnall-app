<script setup>
    import { ref, defineAsyncComponent } from 'vue';

    const props = defineProps({
        lesson: Object,
    });

    const index = ref(0);

    const exercises = props.lesson.exercises;

    const typeComponent = exercise => ({
        ReadAndTranslateBack: defineAsyncComponent(() => import("@/Components/Exercise/ReadAndTranslateBack.vue")),
        ReadAndPickTheWords:  defineAsyncComponent(() => import("@/Components/Exercise/ReadAndPickTheWords.vue")),
    })[exercise.type.type];

    const hasMore = () => exercises.filter(e => ! e.solved).length > 1;

    const next = () => {
        if (! exercises.find(e => ! e.solved)) {
            alert('yay');
        } else if (index.value === exercises.length - 1) {
            index.value = exercises.findIndex(e => ! e.solved);
        } else {
            index.value = exercises.findIndex((e, idx) => idx > index.value && ! e.solved);
        }
    }

    const solved = () => {
        exercises[index.value].solved = true;

        next();
    }
</script>

<template>
    <div v-if="! exercises">Oops! Looks like this lesson has no exercises yet :-/</div>

    <div v-else>
        <div class="w-4/5 mx-auto text-right text-lg font-extralight text-gray-600 opacity-60 mb-5">
            {{ exercises[index].type.description }}
        </div>

        <component
            :is="typeComponent(exercises[index])"
            :exercise="exercises[index]"
            :canSkip="hasMore()"
            @solved="solved"
            @skipped="next"
        />
    </div>
</template>
