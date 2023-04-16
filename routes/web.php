<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProfesorAuthController;
use App\Http\Controllers\Auth\UcenikAuthController;
use App\Http\Controllers\ControllerTest;
use App\Http\Controllers\UcenikController;
use App\Http\Controllers\OdeljenjeController;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\PredmetController;

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
    Route::get('profesor/login', [ProfesorAuthController::class, 'loginShow'])
        ->name('profesor.login.show');

    Route::post('profesor/login', [ProfesorAuthController::class, 'login'])
        ->name('profesor.login.store');
    Route::get('ucenik/login', [UcenikAuthController::class, 'loginShow'])
        ->name('ucenik.login.show');

    Route::post('ucenik/login', [UcenikAuthController::class, 'login'])
        ->name('ucenik.login.store');
});
Route::middleware(['guest:web'])->group(function () {
    // moze da pristupi samo neko ko NIJE  ucenik
    Route::get('ucenik/login', [UcenikAuthController::class, 'loginShow'])
        ->name('ucenik.login.show');

    Route::post('ucenik/login', [UcenikAuthController::class, 'login'])
        ->name('ucenik.login.store');
    Route::get('profesor/login', [ProfesorAuthController::class, 'loginShow'])
        ->name('profesor.login.show');

    Route::post('profesor/login', [ProfesorAuthController::class, 'login'])
        ->name('profesor.login.store');
});



//RUTE ZA LOGOUT
Route::middleware(['auth:web'])->group(function () {
    // samo za ulogovane ucenike
    Route::post('ucenik/logout', [UcenikAuthController::class, 'logout'])
        ->name('ucenik.logout');

    Route::get('indexUcenik', [ControllerTest::class, 'indexUcenik'])->name("indexUcenik");
    Route::get('indexUcenik/ocena/{ucenik}/{ocena}', [OcenaController::class, 'show'])->name('ocena.show.ucenik');
});
//Rute kojima pristup ima samo profesor
Route::middleware(['auth:admin'])->group(function () {
    // samo za ulogovane profesore
    Route::post('profesor/logout', [ProfesorAuthController::class, 'logout'])
        ->name('profesor.logout');
    //RUTE ZA UCENIKE
    Route::get('mojeOdeljenje/dodajUcenika', [UcenikController::class, 'create'])->name('ucenik.store.show');
    Route::post('ucenici/dodaj', [UcenikController::class, 'store'])->name('ucenik.store');
    // Route::get('ucenici', [UcenikController::class, 'index'])->name('ucenici.show');



    //Rute za odeljenja
    //Razredni
    Route::get('mojeOdeljenje', [OdeljenjeController::class, 'indexOdeljenje'])->name('odeljenje');
    Route::get('mojeOdeljenje/ucenik/{ucenik}', [UcenikController::class, 'show'])->name('ucenik.show');
    Route::get('mojeOdeljenje/dodajPredmete', [PredmetController::class, 'show'])->name('predmet.store.show');
    Route::post('mojeOdeljenje/dodajPredmete', [PredmetController::class, 'store'])->name('predmet.store');

    Route::delete('mojeOdeljenje/dodajPredmete', [PredmetController::class, 'destroy'])->name('predmet.delete');

    //Ocene
    Route::get('mojeOdeljenje/ucenik/{ucenik}/ocena/{ocena}', [OcenaController::class, 'show'])->name('ocena.show');


    //Profesori
    Route::get('odeljenja', [OdeljenjeController::class, 'index'])->name('odeljenja');
    Route::get('odeljenja/{odeljenje}', [OdeljenjeController::class, 'show'])->name('odeljenje.show');






    //Rute za ucenike
    Route::get('/index', [ControllerTest::class, 'index'])->name("index");
    Route::get('/odeljenja/{odeljenje}/ucenici/{ucenik}', [UcenikController::class, 'showProfesor'])->name('ucenik.show.profesor');
    //Rute za ocene
    Route::post('odeljenja/{odeljenje}/ucenici/{ucenik}', [OcenaController::class, 'store'])->name('ocena.store');

    Route::get('odeljenja/{odeljenje}/ucenici/{ucenik}/ocena/{ocena}', [OcenaController::class, 'showProfesor'])->name('ocena.show.profesor');
});

//Rute kojima pristup imaju i ucenik i profesor
// Route::middleware(['auth:admin,web'])->group(function () {

//     Route::get('/ucenik/{ucenik}', [UcenikController::class, 'show'])->name('ucenik.show');
// });


Route::get('/login', [ControllerTest::class, 'index2'])->name("login");

//Rute 
