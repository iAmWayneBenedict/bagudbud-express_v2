<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\rider\RiderController;

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


Route::controller(HomeController::class)->group(function() {
    Route::get('/home', 'index')->name('home');
});

Route::controller(ClientController::class)->group(function() {
    // Route::get("/users", "viewLoad");
    Route::get("/client-signup", "clientSignup");
    Route::post("/store", "store")->name("store");
    Route::get("/client-login", "clientLogin");
    Route::post("/login_Auth", "login_Auth")->name("login_Auth");
});

Route::controller(RiderController::class)->group(function() {
    // Route::get("/users", "viewLoad");
    Route::get("/rider-signup", "riderSignup");
    Route::get("/rider-login", "riderLogin");
});

Route::controller(ForgotPassController::class)->group(function () {
    Route::get('/forgot-password', 'index')->name('forgot-password');
    Route::post('/client_SC', 'client_send_code')->name('client_SC');
    Route::post('/rider_SC', 'rider_send_code')->name('rider_SC');
    Route::post('/client_RC', 'client_reset_code')->name('client_RC');
    Route::post('/rider_RC', 'rider_reset_code')->name('rider_RC');
});