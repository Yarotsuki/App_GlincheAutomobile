<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="flex items-center justify-between px-6 py-4 bg-slate-800 text-white">
        <Link href="/" class="text-xl font-bold">
            Glinche Vehicles
        </Link>

        <Link href="/vehicules" class="hover:text-slate-300">
            Véhicules
        </Link>
    </nav>
</template>
