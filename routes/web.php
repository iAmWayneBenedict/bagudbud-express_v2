<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RiderController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(ClientController::class)->group(function() {
    // Route::get("/users", "viewLoad");
    Route::get("/client-signup", "clientSignup");
    Route::post("/store", "store")->name("store");
    Route::get("/client-login", "clientLogin");
});

Route::controller(RiderController::class)->group(function() {
    // Route::get("/users", "viewLoad");
    Route::get("/rider-signup", "riderSignup");
    Route::get("/rider-login", "riderLogin");
});
