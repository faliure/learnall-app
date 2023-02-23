<script setup>
    import { onMounted, ref, watch } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { speak } from '@/Shared/tts';
    import speakerUrl from '/resources/img/speaker.png';
    import { translation, matches } from '@/Shared/translation';
    import CheckOrSkip from '@/Components/Exercise/Partials/CheckOrSkip.vue';

    onMounted(() => {
        guessInput.value.focus()
    });

    const props = defineProps({
        exercise: Object,
        canSkip: Boolean,
    });

    const emit = defineEmits([
        'solved',
        'skipped',
    ]);

    const learnable = props.exercise.learnables[0];

    const guess           = ref(null);
    const guessInput      = ref(null);
    const showTranslation = ref(false);

    const check = () => {
        const correct = matches(guess.value, learnable.translations.map(t => t.translation));

        showTranslation.value = ! correct;

        correct && emit('solved');
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
                <div>{{ translation(learnable) }}</div>
            </div>
        </div>

        <CheckOrSkip
            :canCheck="!! guess"
            :canSkip="canSkip"
            @check="check"
            @skip="$emit('skipped')"
        />
    </section>
</template>
