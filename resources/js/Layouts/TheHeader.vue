<script setup>
  import LearnAllIcon from '@/Components/Icons/LearnAll.vue';
</script>

<template>
  <div class="header flex sticky top-0 z-10 bg-white border-b-2 h-24 mb-12 pl-3 pt-2 leading-6 rounded-b-2xl shadow-sm shadow-black">
    <LearnAllIcon class="h-32 -mt-5" />
    <div class="p-3 pt-0 text-right w-full">
      <Link href="/login">Login</Link> | <Link href="/register">Register</Link>
    </div>
  </div>
</template>
