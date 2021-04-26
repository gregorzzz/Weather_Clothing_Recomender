<?php

use Zttp\Zttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/currentWeather', function () {
    $apikey = config('services.openweathermap.key');
    $lat = request('lat');
    $lng = request('lng');
    $response = Zttp::get("http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lng&appid=$apikey&units=metric");
    return $response->json();
});

Route::get('/forecast', function () {
    $apikey = config('services.openweathermap.key');
    $lat = request('lat');
    $lng = request('lng');
    $response = Zttp::get("http://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lng&exclude={minutely,hourly}&appid=$apikey&units=metric");
    return $response->json();
});
