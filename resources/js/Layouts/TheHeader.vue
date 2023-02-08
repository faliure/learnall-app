<script setup>
  import { onMounted } from 'vue';
  import TheSidebar from '@/Layouts/TheSidebar.vue';
  import LearnAllIcon from '@/Components/Icons/LearnAll.vue';
  import { getCurrentPageRef } from '@/Shared/pages';

  let currentPage = getCurrentPageRef();
</script>

<template>
  <header
    class="flex flex-col p-6 pb-4"
    :class="`border-${currentPage.color}-900`"
  >
    <section class="flex justify-between">
      <div class="relative">
        <LearnAllIcon :class="`h-16 sm:h-28 fill-stone-900`" />
        <LearnAllIcon :class="`h-16 sm:h-28 bottom-0 absolute fill-${currentPage.color}-900 opacity-20 blur-lg`" />
      </div>

      <nav class="flex items-center text-stone-800">
        <div v-if="$page.props.user" class="flex flex-col gap-4 text-right">
          <div class="text-sm text-gray-500">Welcome, {{ $page.props.user.name }}!</div>
          <Link href="/logout" method="POST" class="opacity-70 hover:opacity-100">Logout</Link>
        </div>

        <div v-if="!$page.props.user" class="flex gap-6 font-bold">
          <Link href="/login" class="opacity-70 hover:opacity-100">Login</Link>
          <Link href="/register" class="opacity-70 hover:opacity-100">Register</Link>
        </div>
      </nav>
    </section>

    <nav class="md:hidden pt-5">
      <TheSidebar class="flex justify-around" />
    </nav>
  </header>
</template>
