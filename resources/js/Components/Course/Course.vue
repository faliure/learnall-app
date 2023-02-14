<script setup>
    import Card from '@/Components/Unit/Card.vue';

    const props = defineProps({
        course: Object,
    });
</script>

<template>
    <div v-if="! course.units.length">
        <div class="flex justify-center my-auto">
            Page under construction
        </div>

        <hr class="mt-4 mb-6" />
    </div>

    <section>
        <div class="flex flex-wrap gap-y-5 justify-center w-full">
            <Card
                v-for="(unit, index) in course.units"
                :unit="unit"
                :index="index"
                :class="[
                    index % 5 < 3 ? 'w-1/3' : 'w-2/5',
                    index < 4 ? 'opacity-100' : 'opacity-40',
                ]"
            />
        </div>
    </section>
</template>
