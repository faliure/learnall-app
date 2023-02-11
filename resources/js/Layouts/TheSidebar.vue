<script setup>
  import SidebarLink from '@/Layouts/SidebarLink.vue';
  import pages, { setCurrentPage } from '@/Shared/pages';
</script>

<template>
  <nav>
    <SidebarLink
      v-for="page in pages"
      :page="page"
      @click="() => setCurrentPage(page)"
    />
  </nav>
</template>
