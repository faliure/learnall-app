<script setup>
  defineProps({
    page: Object,
  });
</script>

<template>
  <Link
    :href="page.target"
    class="rounded-lg flex items-center text-lg uppercase"
    :class="[
      `hover:bg-${page.color}-100`,
      $page.component === page.component ? `rborder border-gray font-extrabold bg-${page.color}-300 hover:bg-${page.color}-300` : ''
    ]"
  >
    <component
      :is="page.icon"
      class="mr-5 rounded-full h-12 w-12 fill-white p-2 font-extrabold"
      :class="`bg-${page.color}-400`"
    />

    <span :class="`text-${page.color}-900 font-bold`">{{ page.label }}</span>
  </Link>
</template>
