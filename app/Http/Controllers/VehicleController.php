<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\GlincheApiService;

class VehicleController extends Controller
{
    //
    public function index(GlincheApiService $glincheApi)
    {

        try{
            $response = $glincheApi->login()['token'];

            $vehicles = $glincheApi->getVehicles($response);
            $listVehicles = $vehicles->json();

            return Inertia::render('Vehicules', [
                'vehicles' => $listVehicles
            ]);
        }catch(\Exception $e){

            return Inertia::render('Vehicules', [
                'vehicles' => [],
                'message' => "Une erreur est survenue lors de la recupération des véhicules.",
            ]);
        }


    }
}
