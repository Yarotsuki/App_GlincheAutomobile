<script setup lang="ts">
import {Head, Link} from '@inertiajs/vue3';

import DefaultLayout from '@/layouts/DefaultLayout.vue';
import {computed, ref} from 'vue'
import {vehicules} from "@/routes";

import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from '@/components/ui/popover'

defineOptions({
    layout: DefaultLayout,
});

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
}>();

const brands = [...new Set(props.vehicles.map(vehicle => vehicle.vehicle.manufacturer))];

const selectedBrands = ref<string[]>([])

const vehiculeFiltre = computed(()=>{
    if (appliedBrand.value.length !== 0) {
        return props.vehicles.filter((vehicle) => {
            return selectedBrands.value.includes(vehicle.vehicle.manufacturer);
        });
    }
    return props.vehicles
})

const appliedBrand = ref<string[]>([])


</script>

<template>



        <div class="bg-[#202d55] text-white py-10 text-center">
            <h1 class="text-3xl md:text-4xl font-bold">
                Véhicules d'occasion disponibles
            </h1>
            <p class="mt-2 text-slate-200">
                Trouvez le véhicule qui vous correspond
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="text-sm text-slate-500 mb-6">
                <Link href="/"> Accueil </Link> / <span class="font-semibold text-[#284c9b]">Nos véhicules</span>
            </div>

            <!--Filtre de marque -->
            <Popover>
                <PopoverTrigger class="border-1 border-black p-2 rounded-sm hover:cursor-pointer hover:bg-gray-100 ">Filtrez par marques</PopoverTrigger>
                <PopoverContent class="flex flex-col gap-2">
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

                    <button class="bg-green-200 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" @click="appliedBrand = [...selectedBrands]">
                        Appliquer les filtre  les filtres
                    </button>

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" @click="selectedBrands = []">
                        Réinitialiser les filtres
                    </button>
                </PopoverContent>
            </Popover>
            <br />




            <div class="mt-6 mb-6">
                <p class="text-slate-700">
                    {{ vehiculeFiltre.length }} véhicules disponibles
                </p>
            </div>

            <!-- TA GRID ACTUELLE -->


        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 px-4">

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
                        <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                            {{ vehicle.vehicle.manufacturer }} {{ vehicle.vehicle.model }}
                        </h6>

                        <p class="text-slate-600 leading-normal font-light">
                            <p>{{ vehicle.vehicle.finish }}</p>
                            <p>{{ vehicle.vehicle.mileage }} km</p>
                            <p>{{ vehicle.vehicle.energy }}</p>
                            <p>{{ vehicle.vehicle.prices.merchantPrice }} €</p>
                        </p>
                    </div>

                    <div class="px-4 pb-4 pt-0 mt-auto">
                        <button
                            class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg hover:cursor-pointer focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button"
                        >
                            Read article
                        </button>
                    </div>
                </div>
            </div>

        </div>
        </div>

</template>

<style scoped>

</style>
