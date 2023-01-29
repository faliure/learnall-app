<script setup>
  import LearnAllIcon from '@/Components/Icons/LearnAll.vue';
</script>

<template>
  <div class="header sticky top-0 z-10 h-28 mb-12 p-3 border-b-2 rounded-b-2xl shadow-sm shadow-black leading-6 bg-white">
    <section class="flex justify-between w-full">
      <LearnAllIcon class="w-56 mt-0" />

      <div v-if="$page.props.user" class="p-3 pt-2 text-right">
        <Link href="/logout" method="post">Logout</Link>
      </div>

      <div v-if="! $page.props.user" class="p-3 pt-2 text-right">
        <Link href="/login">Login</Link> | <Link href="/register">Register</Link>
      </div>
    </section>
  </div>
</template>
