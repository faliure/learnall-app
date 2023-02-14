<script setup>
    import CoursesByLang from '@/Components/Course/LangBlock.vue';

    const props = defineProps({
      courses: Array,
    });

    const nativeLangs = () => [
      ...new Set(props.courses.map(c => c.fromLanguage.name))
    ];

    const forSpeakersOf = language => props.courses.filter(
      c => c.fromLanguage.name === language
    );
</script>

<template>
    <section class="flex flex-col relative overflow-hidden h-full">
        <div class="w-full absolute right-0 top-0 p-4 text-right text-xs tracking-wider text-zinc-900 uppercase opacity-60
                    bg-gradient-to-l from-blue-200 rounded-full">
            What will you learn today?
        </div>

        <div class="px-2 flex flex-col gap-6 mt-16 overflow-auto">
            <CoursesByLang
                v-for="nativeLang in nativeLangs()"
                :courses="forSpeakersOf(nativeLang)"
            />
        </div>
    </section>
</template>
