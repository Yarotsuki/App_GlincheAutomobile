```vue
<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import DefaultLayout from '@/layouts/DefaultLayout.vue';

defineOptions({
    layout: DefaultLayout,
});
</script>

<template>
    <Head title="Accueil" />

    <main class="overflow-hidden bg-white text-slate-900">
        <!-- Hero -->
        <section class="relative isolate overflow-hidden bg-slate-950">
            <div
                class="absolute inset-0 -z-10 bg-gradient-to-r from-slate-950 via-slate-950/90 to-slate-800/40"
            ></div>

            <div
                class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 sm:py-28 lg:grid-cols-2 lg:px-8"
            >
                <div>
                    <p
                        class="mb-5 inline-flex rounded-full border border-white/20 px-4 py-2 text-sm text-slate-200"
                    >
                        Votre prochain véhicule vous attend
                    </p>

                    <h1
                        class="max-w-xl text-4xl font-bold tracking-tight text-white sm:text-6xl"
                    >
                        Trouvez la voiture qui vous correspond.
                    </h1>

                    <p class="mt-6 max-w-lg text-lg leading-8 text-slate-300">
                        Découvrez une sélection de véhicules et trouvez celui
                        qui accompagnera vos prochains trajets.
                    </p>

                    <div class="mt-9 flex flex-wrap gap-4">
                        <Link
                            href="/vehicules"
                            class="rounded-xl bg-white px-6 py-3 font-semibold text-slate-950 transition hover:bg-slate-200"
                        >
                            Découvrir les véhicules
                        </Link>

                        <a
                            href="#decouvrir"
                            class="rounded-xl border border-white/25 px-6 py-3 font-semibold text-white transition hover:bg-white/10"
                        >
                            En savoir plus
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="absolute -inset-4 rounded-3xl bg-white/5 blur-2xl"
                    ></div>

                    <img
                        src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1400&q=85"
                        alt="Voiture photographiée en extérieur"
                        class="relative aspect-[4/3] w-full rounded-3xl object-cover shadow-2xl"
                    />
                </div>
            </div>
        </section>

        <!-- Arguments -->
        <section id="decouvrir" class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">
                    Découvrez notre catalogue
                </p>

                <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">
                    Le bon véhicule, en quelques clics.
                </h2>

                <p class="mt-4 leading-7 text-slate-600">
                    Parcourez les véhicules disponibles, comparez leurs
                    caractéristiques et filtrez les résultats selon vos envies.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                <article
                    class="rounded-2xl border border-slate-200 p-7 transition hover:-translate-y-1 hover:shadow-lg"
                >
                    <div
                        class="flex size-12 items-center justify-center rounded-xl bg-slate-100 text-xl"
                        aria-hidden="true"
                    >
                        ↗
                    </div>

                    <h3 class="mt-5 text-lg font-semibold">
                        Un catalogue accessible
                    </h3>

                    <p class="mt-2 leading-7 text-slate-600">
                        Retrouvez les véhicules et leurs informations
                        essentielles dans une interface claire.
                    </p>
                </article>

                <article
                    class="rounded-2xl border border-slate-200 p-7 transition hover:-translate-y-1 hover:shadow-lg"
                >
                    <div
                        class="flex size-12 items-center justify-center rounded-xl bg-slate-100 text-xl"
                        aria-hidden="true"
                    >
                        ⌕
                    </div>

                    <h3 class="mt-5 text-lg font-semibold">
                        Une recherche simplifiée
                    </h3>

                    <p class="mt-2 leading-7 text-slate-600">
                        Utilisez le filtre par marque pour retrouver plus
                        facilement les modèles qui vous intéressent.
                    </p>
                </article>

                <article
                    class="rounded-2xl border border-slate-200 p-7 transition hover:-translate-y-1 hover:shadow-lg"
                >
                    <div
                        class="flex size-12 items-center justify-center rounded-xl bg-slate-100 text-xl"
                        aria-hidden="true"
                    >
                        ✓
                    </div>

                    <h3 class="mt-5 text-lg font-semibold">
                        Les informations essentielles
                    </h3>

                    <p class="mt-2 leading-7 text-slate-600">
                        Consultez notamment le kilométrage, l'énergie,
                        la finition et le prix des véhicules.
                    </p>
                </article>
            </div>

            <div
                class="mt-12 flex flex-col items-start justify-between gap-6 rounded-3xl bg-slate-50 p-8 sm:flex-row sm:items-center sm:p-10"
            >
                <div>
                    <h2 class="text-2xl font-bold">
                        Prêt à trouver votre prochain véhicule ?
                    </h2>

                    <p class="mt-2 text-slate-600">
                        Explorez dès maintenant les véhicules du catalogue.
                    </p>
                </div>

                <Link
                    href="/vehicules"
                    class="shrink-0 rounded-xl bg-slate-950 px-6 py-3 font-semibold text-white transition hover:bg-slate-800"
                >
                    Voir le catalogue →
                </Link>
            </div>
        </section>
    </main>
</template>
```
