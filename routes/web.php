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

Route::get('/', function () {
    return "HOME";
})->name("home");

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

// Route::middleware(['guest:profesor', 'guest:ucenik'])->group(function () {
//     // moze da pristupi samo neko ko NIJE  profesor
//     Route::get('/login', [ProfesorAuthController::class, 'loginShow'])
//         ->name('login.show');

//     Route::post('/login', [ProfesorAuthController::class, 'login'])
//         ->name('login.store');
// });
Route::get('/login', [ProfesorAuthController::class, 'loginShow']);
Route::post('/login', [ProfesorAuthController::class, 'login'])
    ->name('login.store');

// Route::middleware(['auth:profesor'])->group(function () {
//     // samo za ulogovane profesore
//     Route::post('/logout', [ProfesorAuthController::class, 'logout'])
//         ->name('logout');
// });
