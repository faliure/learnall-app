<script setup>
  import { onMounted } from 'vue';
  import TheSeparator from '@/Layouts/TheSeparator.vue';
  import LearnAllIcon from '@/Components/Icons/LearnAll.vue';
  import { getCurrentPageRef } from '@/Shared/pages';

  let currentPage = getCurrentPageRef();
</script>

<template>
  <header
    class="flex flex-col relative z-10 h-40"
    :class="`border-${currentPage.color}-900`"
  >
    <section class="flex justify-between w-full p-6 relative">
      <LearnAllIcon :class="`flex-row h-28 fill-${currentPage.color}-900 opacity-60 blur-md`" />
      <LearnAllIcon :class="`flex-row h-28 absolute left-6 top-6 fill-stone-800`" />

      <nav class="flex items-center text-right">
        <div v-if="$page.props.user" class="p-3 pt-1 text-right flex-auto">
          <div class="text-xs mb-3 text-gray-800">Welcome, {{ $page.props.user.name }} !</div>
          <Link
            class="block px-2 w-20 py-1 text-center float-right text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:text-blue-200"
            href="/logout" method="post" as="button">Logout</Link>
        </div>

        <div
          v-if="!$page.props.user"
          class="flex items-end gap-8 font-bold text-indigo-900 flex-row p-3 pt-2 text-right"
          >
          <Link href="/login" class="opacity-60 hover:opacity-100">Login</Link>
          <Link href="/register" class="opacity-60 hover:opacity-100">Register</Link>
        </div>
      </nav>
    </section>
    <TheSeparator class="-bottom-1" />
  </header>
</template>
