<script setup lang="ts">
import {Link} from '@inertiajs/vue3';

import DefaultLayout from '@/layouts/DefaultLayout.vue';
import {computed, ref} from 'vue'
import {Fuel, Gauge} from '@lucide/vue';

import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover'

defineOptions({
    layout: DefaultLayout,
});

type Message = string

type Vehicle = {
    reference: string;
    title: string;
    pictures: {
        type: string;
        url: string;
    }[];
    vehicle: {
        manufacturer: string;
        model: string;
        finish: string;
        mileage: number;
        energy: string;
        prices: {
            merchantPrice: string;
            catalogPrice: string;
        };
    };
};

const props = defineProps<{
    vehicles: Vehicle[]
    message?: string
}>();

const brands = [...new Set(props.vehicles.map(vehicle => vehicle.vehicle.manufacturer))];

const selectedBrands = ref<string[]>([])
const appliedBrand = ref<string[]>([])


const vehiculeFiltre = computed(() => {
    if (appliedBrand.value.length > 0) {
        return props.vehicles.filter((vehicle) =>
            appliedBrand.value.includes(vehicle.vehicle.manufacturer)
        );
    }

    return props.vehicles;
});


const energyLabels: Record<string, string> = {
    ES: "Essence",
    GO: "Gasoil",
    EH: "Hybride",
    EL: "Electrique"
};


function applyFilters() {
    appliedBrand.value = [...selectedBrands.value];
    isFilterOpen.value = false;
}

const isFilterOpen = ref(false);

</script>

<template>



        <div class=" text-black py-10 text-center">
            <h1 class="text-3xl md:text-4xl font-bold">
               Nos Véhicules disponibles
            </h1>
            <p class="mt-2 text-black">
                Trouvez le véhicule qui vous correspond
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="text-sm text-slate-500 mb-6">
                <Link href="/"> Accueil </Link> / <span class="font-semibold text-[#284c9b]">Nos véhicules</span>
            </div>

            <!--Filtre de marque -->

            <div class="mt-6 mb-6">
                <p class="text-slate-700">
                    {{ vehiculeFiltre.length }} véhicules disponibles
                </p>
            </div>

            <!-- TA GRID ACTUELLE -->
            <div class="flex justify-end">



            <Popover  v-model:open="isFilterOpen" >
                <PopoverTrigger class="border-1 border-black p-2 rounded-sm hover:cursor-pointer hover:bg-gray-100 ">Filtrez par marques</PopoverTrigger>
                <PopoverContent  class="flex flex-col gap-2">

                    <h1 class="font-bold">Sélectionnez 1 ou plusieurs marques</h1>
                    <hr />
                    <div v-for="brand in brands" :key="brand" >

                        <input
                            v-model="selectedBrands"
                            :value="brand"
                            type="checkbox"
                            class="h-4 w-4 mr-4 cursor-pointer rounded border-slate-300 text-blue-600 accent-blue-600 focus:ring-2 focus:ring-blue-400"
                        />

                        <label class="font-bold">{{brand}}</label>
                        <br />

                    </div>

                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 border border-b-green-900 hover:cursor-pointer rounded" @click="applyFilters()">
                        Appliquer les filtre  les filtres
                    </button>

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded hover:cursor-pointer" @click="selectedBrands = []; appliedBrand = []; isFilterOpen = false">
                        Réinitialiser les filtres
                    </button>
                </PopoverContent>
            </Popover>

        </div>




            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 px-4 mb-9">

            <div
                v-for="vehicle in vehiculeFiltre"
                :key="vehicle.reference"
            >
                <div
                    class="cursor-pointer group relative flex flex-col h-full my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-full hover:shadow-lg transition-shadow duration-300"
                >
                    <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                        <img
                            class="w-full h-full object-cover transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110"
                            :src="vehicle.pictures[0].url"
                            :alt="vehicle.title"
                        />
                    </div>


                    <div class="p-4">
                        <h2 class="mb-3 text-xl font-bold text-slate-800">
                            {{ vehicle.vehicle.manufacturer }} {{ vehicle.vehicle.model }}
                        </h2>

                        <p class="mb-3 text-sm text-slate-500">
                            {{ vehicle.vehicle.finish }}
                        </p>

                        <div class="space-y-3 text-sm text-slate-600">
                            <div class="flex items-center gap-2">
                                <Gauge :size="18" class="shrink-0 text-slate-500" />
                                <span>{{ vehicle.vehicle.mileage.toLocaleString('fr-FR') }} km</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <Fuel :size="18" class="shrink-0 text-slate-500" />
                                <span>
                                    {{ energyLabels[vehicle.vehicle.energy] ?? vehicle.vehicle.energy }}
                                </span>
                            </div>
                        </div>

                        <p class="mt-5 text-xl font-bold text-slate-900">
                            {{ Number(vehicle.vehicle.prices.merchantPrice).toLocaleString('fr-FR') }} €
                        </p>
                    </div>

                    <div class="mt-auto px-4 pb-4">
                        <button
                            type="button"
                            class="w-full rounded-lg bg-[#202d55] px-4 py-3 font-semibold text-white transition hover:bg-[#304477] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#202d55]"
                        >
                            Voir le véhicule
                        </button>
                    </div>

                </div>
            </div>

        </div>
        </div>

    <div>
        <p v-if="props.message">
            {{ message }}
        </p>
    </div>

</template>

<style scoped>
.vehicle-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
</style>
