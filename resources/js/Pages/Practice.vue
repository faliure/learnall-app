<script setup>
import Translator from '@/Components/Translator.vue';

  defineProps({ word: Object });
</script>

<template>
  <Translator :original="word.word" :translate="word.meaning" />
</template>
