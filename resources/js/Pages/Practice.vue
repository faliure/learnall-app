<script setup>
    import { onMounted, ref, reactive } from 'vue';
    import { router } from '@inertiajs/vue3';
    import Translator from '@/Components/Translator.vue';

    onMounted(() => next());

    const props = defineProps({
        learnables: Array,
    });

    const lastGuess = ref(null);
    const learnable = reactive({});

    const next = (guessed, translation) => {
        if (learnable.value) {
            lastGuess.value = `${learnable.value.learnable} (${translation})`;
        }

        learnable.value = props.learnables.shift();

        if (props.learnables.length == 1) {
            router.reload({ only: this });
        }
    }
</script>

<template>
    <section>
        <Translator
            v-if="learnable"
            :learnable="learnable"
            @done="next"
        />

        <div v-if="lastGuess" class="p-6 text-sm mx-auto text-center text-gray-400">
            <div>Previous Translation</div>
            <div class="text-gray-800">{{ lastGuess }}</div>
        </div>
    </section>
</template>
