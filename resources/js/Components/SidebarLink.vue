<script setup>
  defineProps({ link: Object });
</script>

<template>
  <Link
    :href="link.target"
    class="rounded-xl flex items-center mb-1 px-3 py-2 hover:bg-green-200"
    :class="{'rborder border-gray font-extrabold hover:bg-blue-200 bg-blue-200': $page.component === link.component}"
  >
    <component :is="link.icon" class="mr-3 h-8" />
    <span class="text-gray-500 font-bold">{{ link.label }}</span>
  </Link>
</template>
