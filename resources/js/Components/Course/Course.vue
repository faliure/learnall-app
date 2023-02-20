<script setup>
    import Card from '@/Components/Unit/Card.vue';

    const props = defineProps({
        course: Object,
    });

    const units = [ ...props.course.units ].map(unit => ({ ...unit }));
    const groups = Object.fromEntries(units.map(unit => [ `L${unit.levelId}`, []]));

    units.forEach(unit => groups[`L${unit.levelId}`].push(unit));

    const levels = Object.values(groups).sort((l1, l2) => l1[0].levelId - l2[0].levelId);
    levels.forEach(level => level.sort((u1, u2) => u1.id - u2.id));

    const cellClass = (index) => {
        const colStart = ((index * 2) % 5) + 1;
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

    <section class="h-full overflow-auto scrollbar-hide flex flex-col gap-y-16">
        <div v-for="level in levels" class="flex flex-1 gap-8 justify-center">
            <Card
                v-for="(unit, index) in level"
                :unit="unit"
                :index="index"
            />
        </div>
    </section>
</template>
