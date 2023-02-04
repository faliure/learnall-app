<script setup>
    import { ref, onMounted } from 'vue';
    import { router } from '@inertiajs/vue3'
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Practice from './Icons/Practice.vue';

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

    const clean = (word) => {
        return word.toLowerCase().replace(/\(.+?\)$/, '').replace(/\W/, '').trim();
    }

    const matches = (input, expected) => {
        const accepted = typeof expected === 'string'
            ? expected.split(',')
            : expected;

        return accepted.map(x => clean(x)).includes(clean(input));
    }
</script>

<template>
    <section class="flex flex-col center-items mt-5 text-center">
        <div class="m-4 w-4/5 mx-auto font-bold h-16">
            <div
                class="py-2 rounded-2xl text-xl bg-blue-50 cursor-pointer"
                @click="showTranslation = true"
                title="Click to show translation"
            >{{ original }}</div>
            <div class="mt-1 w-4/5 mx-auto text-xs" v-if="showTranslation">{{ translate }}</div>
        </div>

        <input
            ref="guessInput"
            type="text"
            @keyup.enter="check"
            v-model="guess"
            placeholder="Give it a try!"
            class="my-6 mx-auto w-4/5 text-center rounded-lg py-3 px-4 border-none shadow-inner shadow-gray-200 bg-gray-100 placeholder-gray-400" />

        <div class="flex flex-row m-auto justify-around gap-6 text-sm mt-6">
            <PrimaryButton @click="check">Submit</PrimaryButton>
            <PrimaryButton @click="next">
                Skip <span class="text-lg align-middle ml-1">😞</span>
            </PrimaryButton>
        </div>

        <div v-if="lastGuess" class="p-6 text-sm mx-auto text-center text-gray-400">
            <div>Previous word:</div>
            <div class="text-gray-800">{{ lastGuess }}</div>
        </div>
    </section>
</template>
