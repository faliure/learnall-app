<script setup>
  import SidebarLink from '@/Components/SidebarLink.vue';
  import LearnIcon from '@/Components/Icons/Learn.vue';
  import PracticeIcon from '@/Components/Icons/Practice.vue';
  import LeaderboardIcon from '@/Components/Icons/Leaderboard.vue';
  import StatsIcon from '@/Components/Icons/Stats.vue';
  import ExploreIcon from '@/Components/Icons/Explore.vue';

  const links = [
      { label: "Learn", target: "/learn", component: 'Learn', icon: LearnIcon },
      { label: "Practice", target: "/practice", component: 'Practice', icon: PracticeIcon },
      { label: "Leaderboard", target: "/leaderboard", component: 'Leaderboard', icon: LeaderboardIcon },
      { label: "Explore", target: "/explore", component: 'Explore', icon: ExploreIcon },
      { label: "Stats", target: "/stats", component: 'Stats', icon: StatsIcon },
  ];
</script>

<template>
  <section class="sidebar">
    <div class="sticky-content sticky top-14 text-base uppercase font-bold tracking-wider">
      <SidebarLink v-for="link in links" :link="link" />
    </div>
  </section>
</template>
