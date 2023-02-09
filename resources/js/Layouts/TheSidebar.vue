<script setup>
  import { onMounted } from 'vue';
  import { router } from '@inertiajs/vue3'
  import SidebarLink from '@/Layouts/SidebarLink.vue';
  import HomeIcon from '@/Components/Icons/Home.vue';
  import LearnIcon from '@/Components/Icons/Learn.vue';
  import PracticeIcon from '@/Components/Icons/Practice.vue';
  import LeaderboardIcon from '@/Components/Icons/Compete.vue';
  import ExploreIcon from '@/Components/Icons/Explore.vue';
  import TheHeader from '@/Layouts/TheHeader.vue';
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
