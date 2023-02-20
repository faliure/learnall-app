<script setup>
    import { onMounted, ref, watch } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { getCurrentPage } from '@/Shared/pages';
    import { speak } from '@/Shared/tts';
    import speakerUrl from '/resources/img/speaker.png';

    onMounted(() => {
        guessInput.value.focus()
    });

    const props = defineProps({
        exercise: Object,
    });

    const emit = defineEmits([
        'done',
    ]);

    const learnable = props.exercise.learnables[0];

    const color           = getCurrentPage().color;
    const guess           = ref(null);
    const guessInput      = ref(null);
    const showTranslation = ref(false);

    const translation = () => (
        learnable.translation
        || learnable.translations.find(t => t.authoritative)
        || learnable.translations[0]
    ).translation;

    const check = () => {
        const correct = matches(guess.value, learnable.translations.map(t => t.translation));
        alert(correct ? "That's right! But that's all I have for now :-(" : 'Not really. But come back later, I may be wrong');
        showTranslation.value = ! correct;

        correct && emit('done', true); // Solved = true
    };

    const clean = x => x.toLowerCase()
                        .replace(/\(.+?\)/g, '')
                        .replace(/[^\w,]/g, '')
                        .trim();

    const matches = (input, expected) => {
        const accepted = (typeof expected === 'string' ? [ expected ] : expected)
                        .map(x => clean(x).split(','))
                        .flat();

        return accepted.includes(clean(input));
    }

    const say = e => speak(learnable.learnable, usePage().props.user.course.language.name, 0.8);
</script>

<template>
    <section class="flex flex-col center-items text-center h-full py-6">
        <div class="h-16 w-4/5 mx-auto font-bold">
            <div
                class="flex justify-center items-center gap-3 py-2 rounded-2xl text-xl cursor-pointer"
                :class="`text-blue-900`"
                title="Click to show translation"
            >
                <img :src="speakerUrl" class="h-5 w-5 mt-0.5" @click="say" />

                <div @click="showTranslation = true">
                    {{ learnable.learnable }}
                </div>
            </div>
            <div class="w-4/5 mx-auto text-xs" v-if="showTranslation">{{ translation() }}</div>
        </div>

        <textarea
            ref="guessInput"
            v-model="guess"
            :placeholder="exercise.type.description"
            class="my-4 mx-auto w-4/5 text-center rounded-lg py-2 border-none placeholder-gray-400"
            :class="`bg-blue-900 bg-opacity-5 focus:ring-blue-200`"
        />

        <div class="flex flex-row m-auto justify-around gap-6 text-sm mt-6">
            <PrimaryButton
                @click="check"
                :color="color"
                :class="`text-blue-100 bg-blue-900`"
            >
                Submit
            </PrimaryButton>
        </div>
    </section>
</template>
