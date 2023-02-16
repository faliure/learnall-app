<script setup>
    import Card from '@/Components/Unit/Card.vue';

    const props = defineProps({
        course: Object,
    });

    const cellClass = (index) => {
        const colStart = ((index * 2 + 1) % 5) || 5;
        const opacity  = index < 4 ? 'opacity-100' : 'opacity-40';

        return `col-start-${colStart} ${opacity}`;
    };
</script>

<template>
    <div v-if="! course.units.length">
        <div class="flex justify-center my-auto">
            Page under construction
        </div>

        <hr class="mt-4 mb-6" />
    </div>

    <section>
        <div class="grid gap-x-5 gap-y-8 place-content-center">
            <Card
                v-for="(unit, index) in course.units"
                :unit="unit"
                :index="index"
                :class="cellClass(index)"
                class="col-span-2"
            />
        </div>
    </section>
</template>
