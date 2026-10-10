<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class GlincheApiService
{

    // Fonction pour se connecter a l'api -> réponse = token de connexion
    public function login()
    {
        $response = Http::post(
            env('GLINCHE_API_URL') . '/login',
            [
                'email' => env('GLINCHE_API_EMAIL'),
                'password' => env('GLINCHE_API_PASSWORD'),
            ]
        );

        return $response;
    }

    public function getVehicles($token){
       $response =  Http::withHeader('Authorization', 'Bearer ' . $token)
        ->get(
            env('GLINCHE_API_URL') . '/vehicles'
        );

        return $response;
    }
}
