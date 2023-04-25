<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfesorAuthApiController;
use App\Http\Controllers\Api\OdeljenjeApiController;
use App\Http\Controllers\Api\UcenikApiController;
use App\Http\Controllers\Api\OcenaApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::middleware(['auth:web'])->group(function () {
//     // samo za ulogovane administratore
//     Route::post('/user/logout', [UserAuthController::class, 'logout'])
//         ->name('user.logout');
// });


Route::middleware(['guest:admin'])->group(function () {
    Route::post('/profesor/login', [ProfesorAuthApiController::class, 'login'])
        ->name('api.profesor.login');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::post('/profesor/logout', [ProfesorAuthApiController::class, 'logout'])
        ->name('api.profesor.logout');


    //ODELJENJE PROFESOR RUTE
    Route::get('odeljenja', [OdeljenjeApiController::class, 'index'])->name('api.odeljenja');
    Route::get('odeljenja/{odeljenje}', [OdeljenjeApiController::class, 'show'])->name('api.odeljenja.show');
    Route::get('odeljenja/{odeljenje}/ucenik/{ucenik}', [UcenikApiController::class, 'show'])->name('api.odeljenja.show.ucenik');
    Route::post('odeljenja/{odeljenje}/ucenik/{ucenik}', [OcenaApiController::class, 'store'])->name('api.store.ocena');


    //ODELJENJE RAZREDNI RUTE
    Route::get('mojeOdeljenje', [OdeljenjeApiController::class, 'showRazredni'])->name('api.mojeOdeljenje.show');
    Route::get('mojeOdeljenje/ucenik/{ucenik}', [UcenikApiController::class, 'showRazredni'])->name('api.mojeOdeljenje.show.ucenik');

    Route::post('mojeOdeljenje/dodajUcenika', [UcenikApiController::class, 'store'])->name('api.mojeOdeljenje.add.ucenik');
});
