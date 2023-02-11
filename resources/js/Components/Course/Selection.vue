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
    <section>
        <div class="-m-3 mb-3 px-5 py-3 bg-white bg-opacity-50">
            <div class="text-sm tracking-wider font-stone-900 uppercase opacity-30">
                What will you learn today?
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <CoursesByLang
                v-for="nativeLang in nativeLangs()"
                :courses="forSpeakersOf(nativeLang)"
            />
        </div>
    </section>
</template>
