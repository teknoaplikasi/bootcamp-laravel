<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PelangganController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get("/pelanggan", [PelangganController::class, "index"]);
// Route::get("/pelanggan/{id}", [PelangganController::class, "show"]);
// Route::post("/pelanggan", [PelangganController::class, "store"]);
// Route::patch("/pelanggan/{id}", [PelangganController::class, "update"]);
// Route::delete("/pelanggan/{id}", [PelangganController::class, "destroy"]);

Route::resource('/pelanggan', PelangganController::class)->middleware("auth.rest");


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
