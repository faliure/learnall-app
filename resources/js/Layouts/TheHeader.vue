<script setup>
  import LearnAllIcon from '@/Components/Icons/LearnAll.vue';
</script>

<template>
  <header
    class="z-10 h-40 border-b-2 border-b-blue-100"
  >
    <section class="flex justify-between w-full p-6">
      <LearnAllIcon class="flex-row h-28 fill-gray-800" />

      <nav class="flex items-center text-right">
        <div v-if="$page.props.user" class="p-3 pt-1 text-right flex-auto">
          <div class="text-xs mb-3 text-gray-800">Welcome, {{ $page.props.user.name }} !</div>
          <Link
            class="block px-2 w-20 py-1 text-center float-right text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-200"
            href="/logout" method="post" as="button">Logout</Link>
        </div>

        <div v-if="!$page.props.user" class="flex items-end gap-8 font-bold flex-row p-3 pt-2 text-right">
          <Link href="/login">Login</Link>
          <Link href="/register">Register</Link>
        </div>
      </nav>
    </section>
  </header>
</template>
