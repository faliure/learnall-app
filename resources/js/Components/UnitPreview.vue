<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    unit: Object,
});
</script>

<template>
    <Link :href="`/units/${unit.slug}`" class="block my-4 rounded-xl border border-solid border-black text-center py-2 font-extrabold mb-5 hover:bg-green-200">
        {{ unit.name }}
    </Link>
</template>
