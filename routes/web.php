<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::inertia('/', 'Welcome')->name('home');


Route::get('/vehicules', [VehicleController::class, 'index'])->name('vehicules');
