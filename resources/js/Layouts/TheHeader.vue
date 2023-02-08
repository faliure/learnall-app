<script setup>
  import { onMounted } from 'vue';
  import TheSidebar from '@/Layouts/TheSidebar.vue';
  import LearnAllIcon from '@/Components/Icons/LearnAll.vue';
  import { getCurrentPageRef } from '@/Shared/pages';

  let currentPage = getCurrentPageRef();
</script>

<template>
  <header
    class="flex flex-col px-6 py-4"
    :class="`border-${currentPage.color}-900`"
  >
    <section class="flex justify-between">
      <div class="relative pl-4">
        <LearnAllIcon :class="`h-16 sm:h-28 fill-stone-900`" />
        <LearnAllIcon :class="`h-16 sm:h-28 bottom-0 absolute fill-${currentPage.color}-900 opacity-20 blur-lg`" />
      </div>

      <nav class="flex justify-center items-center text-stone-800 w-1/4">
        <div v-if="$page.props.user" class="flex flex-col gap-4 text-right">
          <div class="text-sm text-gray-500">Welcome, {{ $page.props.user.name }}!</div>
          <Link href="/logout" method="POST" class="opacity-70 hover:opacity-100">Logout</Link>
        </div>

        <div v-if="!$page.props.user" class="flex gap-2">
          <Link href="/login" class="px-6 py-1 opacity-50 hover:opacity-100 bg-stone-500 bg-opacity-10 hover:bg-opacity-20 rounded-lg">
            Login
          </Link>
          <Link href="/register" class="px-6 py-1 opacity-50 hover:opacity-100 bg-stone-500 bg-opacity-10 hover:bg-opacity-20 rounded-lg">
            Register
          </Link>
        </div>
      </nav>
    </section>

    <nav class="md:hidden pt-5">
      <TheSidebar class="flex justify-around" />
    </nav>
  </header>
</template>
