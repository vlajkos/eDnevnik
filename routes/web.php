<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProfesorAuthController;
use App\Http\Controllers\Auth\UcenikAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return "HOME";
// })->name("home");

//Route::middleware([\App\Http\Middleware\IPBlockMiddleware::class])->group(function() {
// Route::middleware(['guest:ucenik'])->group(function () {
//     // moze da pristupi samo neko ko NIJE ucenik
//     Route::get('/login', [UcenikAuthController::class, 'loginShow'])
//         ->name('login.show');

//     Route::middleware(["throttle:limit-login"])
//         ->post('/login', [UcenikAuthController::class, 'login'])
//         ->name('login.store');
// });

// Route::middleware(['auth:ucenik'])->group(function () {
//     // samo za ulogovane ucenike
//     Route::post('/logout', [UcenikAuthController::class, 'logout'])
//         ->name('logout');
// });

// RUTE ZA LOGIN
Route::middleware(['guest:admin'])->group(function () {
    // moze da pristupi samo neko ko NIJE  profesor
    Route::get('ucenik/login', [UcenikAuthController::class, 'loginShow'])
        ->name('ucenik.login.show');

    Route::post('ucenik/login', [UcenikAuthController::class, 'login'])
        ->name('ucenik.login.store');
});
Route::middleware(['guest:web'])->group(function () {
    // moze da pristupi samo neko ko NIJE  ucenik
    Route::get('profesor/login', [ProfesorAuthController::class, 'loginShow'])
        ->name('profesor.login.show');

    Route::post('profesor/login', [ProfesorAuthController::class, 'login'])
        ->name('profesor.login.store');
});



//RUTE ZA LOGOUT
Route::middleware(['auth:web'])->group(function () {
    // samo za ulogovane ucenike
    Route::post('/logout', [UcenikAuthController::class, 'logout'])
        ->name('logout');
});
Route::middleware(['auth:admin'])->group(function () {
    // samo za ulogovane profesore
    Route::post('/logout', [ProfesorAuthController::class, 'logout'])
        ->name('logout');
});
