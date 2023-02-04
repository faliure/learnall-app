<script setup>
  import SidebarLink from '@/Components/SidebarLink.vue';
  import HomeIcon from '@/Components/Icons/Home.vue';
  import LearnIcon from '@/Components/Icons/Learn.vue';
  import PracticeIcon from '@/Components/Icons/Practice.vue';
  import LeaderboardIcon from '@/Components/Icons/Leaderboard.vue';
  import ExploreIcon from '@/Components/Icons/Explore.vue';

  const links = [
      { label: "Home", target: "/home", component: 'Home', icon: HomeIcon },
      { label: "Learn", target: "/learn", component: 'Learn', icon: LearnIcon },
      { label: "Practice", target: "/practice", component: 'Practice', icon: PracticeIcon },
      { label: "Explore", target: "/explore", component: 'Explore', icon: ExploreIcon },
      { label: "Leaderboard", target: "/leaderboard", component: 'Leaderboard', icon: LeaderboardIcon },
  ];
</script>

<template>
  <nav class="tracking-wider overflow-y-auto">
    <SidebarLink v-for="link in links" :link="link" class="p-3 mb-2" />
  </nav>
</template>
