<?php

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/partes/elementos/{id}',[App\Http\Controllers\ElementosController::class,'list_data_elements_api_elemntparte']);

Route::post('/partes/addelement',[App\Http\Controllers\ElementosController::class,'save_ajax_api_elementos']);