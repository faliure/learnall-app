<script setup>
    import { ref } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { speak } from '@/Shared/tts';
    import speakerUrl from '/resources/img/speaker.png';
    import { shuffle } from '@/Shared/arrays';
    import { translation, matches } from '@/Shared/translation';
    import SelectableOptions from '@/Components/Exercise/Partials/SelectableOptions.vue';

    const props = defineProps({
        exercise: Object,
    });

    const emit = defineEmits([
        'done',
    ]);

    const learnable  = props.exercise.learnables[0];
    const definition = props.exercise.definition;

    const options = ref(shuffle([
        ...translation(learnable).split(' '),
        ...definition.fillers.slice(0, definition.fillerCount),
    ]).map(o => ({ text: o, active: true })));

    const selectedOptions = ref([]);

    const guess           = ref(null);
    const showTranslation = ref(false);

    const optionSelected = option => {
        const selected = options.value.find(o => o.text === option.text);

        selectedOptions.value.push({ ...selected });
        selected.active = false;
        guess.value = selectedOptions.value.map(o => o.text).join(' ');
    };

    const optionUnselected = option => {
        options.value.find(o => o.text === option.text).active = true;
        selectedOptions.value = selectedOptions.value.filter(o => o.text !== option.text);
        guess.value = selectedOptions.value.map(o => o.text).join(' ');
    };

    const check = () => {
        const correct = matches(guess.value, learnable.translations.map(t => t.translation));
        alert(correct ? "That's right! But that's all I have for now :-(" : 'Not really. But come back later, I may be wrong');
        showTranslation.value = ! correct;

        correct && emit('done', true); // Solved = true
    };

    const say = e => speak(learnable.learnable, usePage().props.user.course.language.name, 0.8);
</script>

<template>
    <section class="flex flex-col h-full pb-10">
        <div class="flex-1 w-4/5 mx-auto font-bold">
            <div>
                <div
                    class="flex gap-3 py-2 items-center leading-none rounded-2xl text-xl cursor-pointer text-stone-900"
                    title="Click to show translation"
                >
                    <div class="flex-shrink-0 rounded-full p-3 mr-2 bg-stone-900 bg-opacity-10">
                        <img :src="speakerUrl" class="h-6 w-6" @click="say" />
                    </div>

                    <div>
                        <div @hover="showTranslation = true" @click="showTranslation = true">
                            {{ learnable.learnable }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-10 mt-3 text-sm font-bold border-b-2 border-b-stone border-dotted">
                <SelectableOptions class="gap-2" :options="selectedOptions" @selected="optionUnselected" />
            </div>

            <div class="my-8 p-5 bg-stone-50 border-2 border-gray-300 rounded-2xl">
                <SelectableOptions class="gap-4 text-sm font-semibold" :options="options" @selected="optionSelected" />
            </div>
        </div>

        <div class="h-18 w-4/5 mx-auto text-xs">
            <div v-if="showTranslation" class="h-full p-3 rounded-xl text-lg text-blue-900 opacity-90 bg-blue-900 bg-opacity-10">
                <div class="text-xs font-bold pb-3">Translation</div>
                <div>{{ translation(learnable) }}</div>
            </div>
        </div>

        <div class="flex flex-row mx-auto justify-around gap-6 text-sm mt-6">
            <PrimaryButton
                @click="guess ? check() : null"
                :class="guess ? 'cursor-pointer opacity-100' : 'cursor-not-allowed opacity-40'"
                class="px-20 text-blue-100 bg-blue-900"
            >
                Check
            </PrimaryButton>
        </div>
    </section>
</template>
