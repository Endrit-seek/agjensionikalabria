<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\StreetController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'products' => ProductController::class,
    'cities'=> CityController::class,
    'streets'=> StreetController::class,
]);

Route::post('/medias/process', [MediaController::class, 'process']);
Route::delete('/medias/revert', [MediaController::class, 'revert']);
