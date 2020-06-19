<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->prefix('auth')->namespace('Auth')->group(function() {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::prefix('auth')->namespace('Auth')->group(function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
});

Route::middleware('auth:api')->group(function() {
    Route::apiResource('garden', 'GardenController');
    Route::apiResource('plant', 'PlantController');
    Route::post('add-plant', 'PlantController@addPlant');
    Route::post('remove-plant', 'PlantController@removePlant');
});
