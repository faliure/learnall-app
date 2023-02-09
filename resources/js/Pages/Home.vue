<script setup>
  import Translator from '@/Components/Translator.vue';

  defineProps({
    learnable: Object,
  });
</script>

<template>
  <Translator
    class="h-full py-6"
    :original="learnable.learnable"
    :translate="learnable.translation.translation"
  />
</template>
