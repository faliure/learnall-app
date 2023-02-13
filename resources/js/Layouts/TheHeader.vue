<script setup>
    import { Link } from '@inertiajs/vue3';
    import CourseFlag from '@/Components/Course/Flag.vue';
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
                <div class="flex flex-col gap-2 text-right">
                    <div v-if="$page.props.course" class="flex text-sm text-gray-500">
                        <Link href="/courses">
                            <CourseFlag
                                :fromLang="$page.props.course.fromLanguage"
                                :toLang="$page.props.course.language"
                                class="cursor-pointer"
                            />
                        </Link>
                    </div>

                    <Link href="/logout" method="POST" as="button" class="opacity-70 hover:opacity-100 text-right">
                        Logout
                    </Link>
                </div>
            </nav>
        </section>
    </header>
</template>
