<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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


Route::get('/places-to-visit', [ApiController::class, 'getPlacesToVisit']);
Route::get('/services', [ApiController::class, 'getServices']);
Route::get('/services-images/{id}', [ApiController::class, 'getServicesImages']);
Route::get('/service-gallery/{id}', [ApiController::class, 'getServiceGalleryByKF']);
Route::get('/hotel-images/{id}', [ApiController::class, 'getHotelImages']);
Route::post('/create-client', [ApiController::class, 'createClient']);
Route::post('/login', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
