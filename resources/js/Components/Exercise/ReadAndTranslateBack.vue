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
    <section class="flex flex-col h-full pb-10">
        <div class="w-4/5 mx-auto text-right text-2xl font-extralight text-gray-600 opacity-60 mb-10">
            {{ exercise.type.description }}
        </div>

        <div class="flex-1 w-4/5 mx-auto font-bold">
            <div>
                <div
                    class="flex gap-3 py-2 items-center leading-none rounded-2xl text-xl cursor-pointer text-stone-900"
                    title="Click to show translation"
                >
                    <div class="flex-shrink-0 rounded-full p-5 mr-2 bg-stone-900 bg-opacity-10">
                        <img :src="speakerUrl" class="h-8 w-8" @click="say" />
                    </div>

                    <div>
                        <div @hover="showTranslation = true" @click="showTranslation = true">
                            {{ learnable.learnable }}
                        </div>
                    </div>
                </div>

            </div>

            <textarea
                ref="guessInput"
                v-model="guess"
                rows="5"
                data-enable-grammarly="false"
                class="mt-8 mx-auto w-full rounded-lg py-2 border-none placeholder-gray-400
                     bg-gray-300 bg-opacity-5 ring-1 ring-blue-100 focus:ring-blue-400"
            />
        </div>

        <div class="h-18 w-4/5 mx-auto text-xs">
            <div v-if="showTranslation" class="h-full p-3 rounded-xl text-lg text-blue-900 opacity-90 bg-blue-900 bg-opacity-10">
                <div class="text-xs font-bold pb-3">Translation</div>
                <div>{{ translation() }}</div>
            </div>
        </div>


        <div class="flex flex-row mx-auto justify-around gap-6 text-sm mt-6">
            <PrimaryButton
                @click="guess ? check() : null"
                :color="color"
                :class="guess ? 'cursor-pointer opacity-100' : 'cursor-not-allowed opacity-40'"
                class="px-20 text-blue-100 bg-blue-900"
            >
                Check
            </PrimaryButton>
        </div>
    </section>
</template>
