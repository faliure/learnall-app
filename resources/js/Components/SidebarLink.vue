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
    class="flex items-center gap-3 mr-8 p-2 min-w-fit text-lg tracking-wider uppercase font-bold rounded-full hover:bg-opacity-5"
    :class="isCurrentPage() ? `opacity-100` : `hover:bg-${page.color}-900 opacity-60 hover:opacity-100`"
  >
    <component
      :is="page.icon"
      class="h-9 w-9 p-1 rounded-full fill-gray-100"
      :class="`bg-${page.color}-900`"
    />

    <div class="relative hidden md:flex flex-col">
      <div :class="`text-${page.color}-900`">
        {{ page.label }}
      </div>

      <div v-show="isCurrentPage()"
        class="absolute bottom-1 -left-1 -right-1 h-2 opacity-10"
        :class="`bg-${page.color}-900`"
      ></div>
    </div>
  </Link>
</template>
