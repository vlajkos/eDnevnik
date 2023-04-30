<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfesorAuthApiController;
use App\Http\Controllers\Api\OdeljenjeApiController;
use App\Http\Controllers\Api\UcenikApiController;
use App\Http\Controllers\Api\OcenaApiController;
use App\Http\Controllers\Api\PredmetApiController;
use App\Http\Controllers\Api\ProfesorApiController;

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
    Route::get('odeljenja/{odeljenje}/ucenik/{ucenik}/ocena/{ocena}', [OcenaApiController::class, 'showProfesor'])->name('api.odeljenja.show.ocena');
    Route::post('odeljenja/{odeljenje}/ucenik/{ucenik}', [OcenaApiController::class, 'store'])->name('api.store.ocena');


    //ODELJENJE RAZREDNI RUTE
    Route::get('moje-odeljenje', [OdeljenjeApiController::class, 'showRazredni'])->name('api.moje-odeljenje.show');
    Route::get('moje-odeljenje/ucenik/{ucenik}', [UcenikApiController::class, 'showRazredni'])->name('api.moje-odeljenje.show.ucenik');
    Route::get('moje-odeljenje/ucenik/{ucenik}/ocena/{ocena}', [OcenaApiController::class, 'show'])->name('api.moje-odeljenje.show.ocena');

    Route::get('moje-odeljenje/predmeti', [PredmetApiController::class, 'index'])->name('api.moje-odeljenje.index.predmeti');
    Route::post('moje-odeljenje/predmeti', [PredmetApiController::class, 'store'])->name('api.moje-odeljenje.store.predmet');
    Route::delete('moje-odeljenje/predmeti', [PredmetApiController::class, 'destroy'])->name('api.moje-odeljenje.delete.predmet');

    Route::post('moje-odeljenje/dodajUcenika', [UcenikApiController::class, 'store'])->name('api.moje-odeljenje.add.ucenik');
    Route::get('profesori', [ProfesorApiController::class, 'index'])->name('api.index.profesori');
});


// Route::get('predmeti', [ProfesorApiController::class, 'showAllPredmeti'])->name('api.moje-odeljenje.show.all.predmeti');
