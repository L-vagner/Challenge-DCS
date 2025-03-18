<?php

use App\Http\Controllers\LgnCommandeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/topCinq', [LgnCommandeController::class, 'evol_top_cinq_client']);
Route::get('/voluProduit', [LgnCommandeController::class, 'evol_vol_produit']);
