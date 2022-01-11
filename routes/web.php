<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang', function () {
    return __("auth.failed");
});

Route::get('/setter/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return $lang;
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'actionLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin/pelanggan', function () {
    return view('admin.pelanggan');
});

Route::get('/test', function () {
    $sql = "SELECT * FROM pelanggan WHERE id = :id";
    $result = DB::selectOne($sql, ["id" => 1]);
    dd($result->nama);
    return view('welcome');
});

Route::get('/bootstrap', function () {
    return view('bootstrap');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/keluhan', [KeluhanController::class, 'index']);

Route::get('/keluhan/{name}', [KeluhanController::class, 'detail']);


Route::post('/keluhan', [KeluhanController::class, 'action']);

Route::put('/action-formulir', function () {
    return 'Formulir Berhasil diubah';
});
Route::group(["middleware" => "auth"], function () {
    Route::resource('/pelanggan', PelangganController::class);
    Route::get("/supplier", function () {
        return view("supplier");
    });
    Route::get("/dashboard", function () {
        return view("dashboard");
    });
});
