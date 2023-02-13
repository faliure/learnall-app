<script setup>
  import Translator from '@/Components/Translator.vue';

  defineProps({
    learnable: Object,
  });

</script>

<template>
  <Translator
    v-if="learnable"
    :original="learnable.learnable"
    :translate="learnable.translation.translation"
  />
</template>
