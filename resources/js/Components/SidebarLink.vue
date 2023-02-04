<script setup>
  defineProps({ link: Object });
</script>

<template>
  <Link
    :href="link.target"
    class="rounded-xl flex items-center text-lg hover:bg-blue-100 uppercase"
    :class="{'rborder border-gray font-extrabold bg-blue-300 hover:bg-blue-100': $page.component === link.component}"
  >
    <component :is="link.icon" class="mr-5" />

    <span class="font-bold">{{ link.label }}</span>
  </Link>
</template>
