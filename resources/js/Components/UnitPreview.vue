<script setup>
  defineProps({ unit: Object });
</script>

<template>
  <Link
    :href="`/units/${unit.slug}`"
    class="py-2 rounded-xl border border-gray text-center font-bold bg-emerald-900 bg-opacity-5 hover:bg-opacity-20"
  >
    {{ unit.name }}
  </Link>
</template>
