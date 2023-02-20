<script setup>
    import { ref, watch } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { getCurrentPage } from '@/Shared/pages';
    import { speak } from '@/Shared/tts';
    import speakerUrl from '/resources/img/speaker.png';

    const emit = defineEmits([
        'done',
    ]);

    const props = defineProps({
        learnable: Object,
    });

    const color           = getCurrentPage().color;
    const guess           = ref(null);
    const guessInput      = ref(null);
    const showTranslation = ref(false);
    const learnableText   = ref(null);

    let translation,
        translations;

    watch(props.learnable, (learnable) => {
        if (! learnable.value) {
            return;
        }

        guess.value           = '';
        showTranslation.value = false;
        learnableText.value   = learnable.value.learnable;

        translations = learnable.value.translations
                    || [ learnable.value.translation ];

        translation = (
            learnable.value.translation
            || translations.find(t => t.authoritative)
            || translations[0]
        ).translation;


        guessInput.value.focus();
    });

    const check = () => {
        const correct = matches(guess.value, translations.map(t => t.translation));

        showTranslation.value = ! correct;

        correct && emit('done', true, translation); // Solved = true
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

    const say = (learnable, rate) => {
        speak(learnable.value.learnable, usePage().props.user.course.language.name, rate);
    }
</script>

<template>
    <section class="flex flex-col center-items text-center h-full py-6">
        <div class="h-16 w-4/5 mx-auto font-bold">
            <div
                class="flex justify-center items-center gap-3 py-2 rounded-2xl text-xl cursor-pointer"
                :class="`text-${color}-900`"
                title="Click to show translation"
            >
                <img :src="speakerUrl" class="h-5 w-5 mt-0.5" @click="say(learnable, 0.8)" />

                <div @click="showTranslation = true">
                    {{ learnableText }}
                </div>
            </div>
            <div class="w-4/5 mx-auto text-xs" v-if="showTranslation">{{ translation }}</div>
        </div>

        <input
            ref="guessInput"
            type="text"
            @keyup.enter="check"
            v-model="guess"
            placeholder="Give it a try!"
            class="my-4 mx-auto w-4/5 text-center rounded-lg py-2 border-none placeholder-gray-400"
            :class="`bg-${color}-900 bg-opacity-5 focus:ring-${color}-200`"
        />

        <div class="flex flex-row m-auto justify-around gap-6 text-sm mt-6">
            <PrimaryButton
                @click="check"
                :color="color"
                :class="`text-${color}-100 bg-${color}-900`"
            >
                Submit
            </PrimaryButton>

            <PrimaryButton
                @click="$emit('done', false)"
                class="bg-transparent border"
                :class="`text-${color}-500 border-${color}-100`"
                :color="color"
            >
                Skip <span class="text-lg align-middle ml-1">😞</span>
            </PrimaryButton>
        </div>
    </section>
</template>
