<script setup>
  defineProps({ link: Object });
</script>

<template>
  <Link
    :href="link.target"
    class="rounded-lg flex items-center text-lg hover:bg-blue-100 uppercase"
    :class="{'rborder border-gray font-extrabold bg-blue-300 hover:bg-blue-300': $page.component === link.component}"
  >
    <component :is="link.icon" class="mr-5 rounded-full h-12 w-12 bg-blue-400 fill-white p-2 font-extrabold" />

    <span class="font-bold">{{ link.label }}</span>
  </Link>
</template>
