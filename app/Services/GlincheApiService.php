<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

class GlincheApiService
{

    // Fonction pour se connecter a l'api -> réponse = token de connexion
    public function login()
    {




            $response = Http::timeout(10)->post(
                env('GLINCHE_API_URL') . '/login',
                [
                    'email' => env('GLINCHE_API_EMAIL'),
                    'password' => env('GLINCHE_API_PASSWORD'),
                ]
            );
            $response -> throw();

            return  $response;
    }

    public function getVehicles($token){
       $response =  Http::timeout(10)->withHeader('Authorization', 'Bearer ' . $token)
        ->get(
            env('GLINCHE_API_URL') . '/vehicles'
        );
        $response -> throw();
        return $response;
    }
}
