<?php

use App\Http\Controllers\KeepsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/keeps', [KeepsController::class, 'index']);

Route::post('/keeps', [KeepsController::class, 'store']);

Route::get('/keeps/{id}', [KeepsController::class, 'show']);

Route::put('/keeps/{id}', [KeepsController::class, 'update']);

Route::delete('/keeps/{id}', [KeepsController::class, 'delete']);
