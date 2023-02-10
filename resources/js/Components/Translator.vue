<script setup>
    import { ref, onMounted } from 'vue';
    import { router } from '@inertiajs/vue3';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Practice from './Icons/Practice.vue';
    import { getCurrentPage } from '@/Shared/pages';

    onMounted(() => {
        guessInput.value.focus();
    });

    const props = defineProps({
        original: String,
        translate: String,
    });

    const guess = ref('');
    const lastGuess = ref('');
    const guessInput = ref(null);
    const showTranslation = ref(false);
    const color = getCurrentPage().color;

    const next = () => {
        guess.value = '';
        showTranslation.value = false;
        lastGuess.value = `${props.original} (${props.translate})`;

        router.reload({ only: Practice });

        guessInput.value.focus();
    }

    const check = () => {
        const correct = matches(guess.value, props.translate);

        showTranslation.value = ! correct;

        correct && next();
    };

    const clean = x => x.toLowerCase()
                        .replace(/\(.+?\)$/, '')
                        .replace(/[^\w,]/, '')
                        .trim();

    const matches = (input, expected) => {
        const accepted = (typeof expected === 'string' ? [ expected ] : expected)
                        .map(x => clean(x).split(','))
                        .flat();

        return accepted.includes(clean(input));
    }
</script>

<template>
    <section class="flex flex-col center-items text-center h-full py-6">
        <div class="h-16 w-4/5 mx-auto font-bold">
            <div
                class="py-2 rounded-2xl text-xl cursor-pointer"
                :class="`text-${color}-900`"
                @click="showTranslation = true"
                title="Click to show translation"
            >{{ original }}</div>
            <div class="w-4/5 mx-auto text-xs" v-if="showTranslation">{{ translate }}</div>
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
            <PrimaryButton @click="check" :color="color">
                Submit
            </PrimaryButton>

            <PrimaryButton
                @click="next"
                class="bg-transparent border"
                :class="`text-${color}-500 border-${color}-100`"
                :color="color"
            >
                Skip <span class="text-lg align-middle ml-1">😞</span>
            </PrimaryButton>
        </div>

        <div v-if="lastGuess" class="p-6 text-sm mx-auto text-center text-gray-400">
            <div>Previous Translation</div>
            <div class="text-gray-800">{{ lastGuess }}</div>
        </div>
    </section>
</template>
