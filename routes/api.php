<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('books', [BookController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/geolocation', [GeoLocationController::class, 'getGeoInfo']);
    Route::post('/history', [GeoLocationController::class, 'addHistory']);
    Route::get('/history', [GeoLocationController::class, 'getHistory']);
    Route::delete('/history', [GeoLocationController::class, 'deleteHistory']);
});