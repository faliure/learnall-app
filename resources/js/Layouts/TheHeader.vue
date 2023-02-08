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
        <LearnAllIcon :class="`h-16 md:h-28 fill-stone-900`" />
        <LearnAllIcon :class="`h-16 md:h-28 bottom-0 absolute fill-${currentPage.color}-900 opacity-20 blur-lg`" />
      </div>

      <nav class="hidden md:flex justify-center items-center w-full md:w-1/4 text-stone-800">
        <div v-if="$page.props.user" class="flex flex-col gap-4 text-right">
          <div class="text-sm text-gray-500">Welcome, {{ $page.props.user.name }}!</div>
          <Link href="/logout" method="POST" class="opacity-70 hover:opacity-100">
              Logout</Link>
        </div>

        <div v-if="!$page.props.user" class="flex flex-wrap gap-2">
          <Link
            href="/login"
            class="px-6 py-1 opacity-60 hover:opacity-100 bg-stone-500 bg-opacity-10 hover:bg-opacity-20 rounded-lg"
          >
            Login
          </Link>
          <Link href="/register"
            class="px-6 py-1 opacity-60 hover:opacity-100 bg-stone-500 bg-opacity-10 hover:bg-opacity-20 rounded-lg"
          >
            Register
          </Link>
        </div>
      </nav>
    </section>
  </header>
</template>
