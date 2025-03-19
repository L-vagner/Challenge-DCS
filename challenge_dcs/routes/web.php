<?php

use App\Http\Controllers\DCSChartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){return view('welcome');});

Route::get('/topDix', [DCSChartController::class, 'topDix'] );

Route::get('/topCinq', [DCSChartController::class, 'topCinq']);

Route::get('/volumeProduit', [DCSChartController::class, 'volumeProduit']);
