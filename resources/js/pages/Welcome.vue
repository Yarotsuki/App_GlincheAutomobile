<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

import DefaultLayout from '@/layouts/DefaultLayout.vue';

defineOptions({
    layout: DefaultLayout,
});
</script>

<template>
    <h1>Test</h1>
    <Link
        href="/vehicules"
        class="rounded-lg bg-black px-4 py-2 text-white"
    >
        Voir les véhicules
    </Link>

</template>
