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
    <section class="flex flex-col center-items mt-5">
        <div
            class="m-4 py-2 w-1/2 mx-auto text-xl font-bold text-center rounded-2xl bg-blue-600 text-white"
            @click="showTranslation = true"
        >
            {{ original }}
            <span v-if="showTranslation">({{ translate }})</span>
        </div>

        <input
            ref="guessInput"
            type="text"
            @keyup.enter="check"
            v-model="guess"
            placeholder="Give it a try!"
            class="my-3 mx-auto w-1/2 text-center rounded-lg py-3 px-4 border-gray-500 placeholder-gray-300" />

        <div class="flex flex-row m-auto justify-around gap-6">
            <PrimaryButton @click="check">Submit it!</PrimaryButton>
            <PrimaryButton @click="next" class="bg-blue-400">Skip It</PrimaryButton>
        </div>

        <div v-if="lastGuess" class="p-6 text-sm mx-auto text-center text-gray-400">
            <div>Previous word:</div>
            <div class="text-gray-800">{{ lastGuess }}</div>
        </div>
    </section>
</template>
