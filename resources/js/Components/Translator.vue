<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'
import PrimaryButton from '@/Bag/Components/PrimaryButton.vue';
import Practice from './Icons/Practice.vue';

const props = defineProps({
    original: String,
    translate: String,
});

const translation = ref('');
const showTranslation = ref(false);

const next = () => {
    translation.value = '';
    router.reload({ only: Practice });
}

const check = () => {
    const correct = matches(translation.value, props.translate);

    showTranslation.value = !correct;

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
    <section class="flex flex-col center-items">
        <div>Can you translate the following?</div>
        <div class="my-5">{{ original }} <span v-if="showTranslation">({{ translate }})</span></div>

        <input
            type="text"
            @keyup.enter="check"
            v-model="translation"
            placeholder="Enter your translation"
            class="appearance-none block bg-gray-100 text-gray-700 border border-black rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" />

            <div class="flex justify-between">
            <PrimaryButton @click="check" class="mt-3">Confirm</PrimaryButton>
            <PrimaryButton @click="next" class="mt-3">Skip</PrimaryButton>
        </div>
    </section>
</template>
