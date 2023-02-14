<script setup>
    import Card from '@/Components/Unit/Card.vue';

    const props = defineProps({
        course: Object,
    });
</script>

<template>
    <div class="flex justify-center my-auto">Page under construction</div>
    <hr class="mt-4 mb-6" />
    <section>
        <div class="flex flex-wrap gap-6 place-content-evenly w-full p-3">
            <Card v-for="unit in course.units" :unit="unit" />
        </div>
    </section>
</template>
