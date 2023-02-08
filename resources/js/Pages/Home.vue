<script setup>
  import Translator from '@/Components/Translator.vue';

  defineProps({
    word: Object,
  });
</script>

<template>
  <Translator
    class="h-full py-6"
    :original="word.word"
    :translate="word.meaning"
  />
</template>
