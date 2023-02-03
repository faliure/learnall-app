<script setup>
  import LearnAllIcon from '@/Components/Icons/LearnAll.vue';
</script>

<template>
  <header
    class="sticky top-0 z-10 h-24 p-3 border-b-2 rounded-b-xl shadow-sm shadow-black leading-6 bg-white"
  >
    <section class="flex justify-between w-full">
      <LearnAllIcon class="h-24 -mt-1" />

      <div v-if="$page.props.user" class="p-3 pt-1 text-right flex-auto">
        <div class="text-xs mb-3 text-gray-800">Welcome, {{ $page.props.user.name }} !</div>
        <Link
          class="block px-2 w-20 py-1 text-center float-right text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-200"
          href="/logout" method="post">Logout</Link>
      </div>

      <div v-if="!$page.props.user" class="p-3 pt-2 text-right">
        <Link href="/login">Login</Link> |
        <Link href="/register">Register</Link>
      </div>
    </section>
  </header>
</template>
