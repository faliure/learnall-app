<script setup>
  import { getCurrentPageRef } from '@/Shared/pages';

  const props = defineProps({
    page: Object,
  });

  const isCurrentPage = () => getCurrentPageRef().value.component === props.page.component;
</script>

<template>
  <Link
    :href="page.target"
    class="flex items-center text-lg uppercase font-extrabold rounded-lg"
    :class="isCurrentPage() ? `rborder border-gray opacity-100` : `hover:bg-${page.color}-100 hover:opacity-100 opacity-60`"
  >
    <component
      :is="page.icon"
      class="h-9 w-9 mr-3 rounded-full fill-white p-2 font-extrabold"
      :class="`bg-${page.color}-900`"
    />

    <div
      class="flex-0 text-left relative"
      :class="isCurrentPage() ? 'font-extra-bold' : 'font-bold'"
    >
      <div class="absolute b-0 -left-1 -right-1 h-3 bottom-0 opacity-30" :class="[
        isCurrentPage() ? `bg-${page.color}-500` : '',
      ]"></div>
      <div
        class="flex w-full text-lg tracking-wider"
        :class="`text-${page.color}-900`"
      >{{ page.label }}</div>
    </div>
  </Link>
</template>
