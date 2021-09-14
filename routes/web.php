<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



//reseaux
Route::get('reseaux/liste', [App\Http\Controllers\ReseauController::class, 'index' ])->name('reseaus.index');

//fournisseurs
Route::get('fournisseurs/liste/{term?}/', [App\Http\Controllers\FournisseurController::class, 'index' ])->name('fournisseurs.index');

//activites
Route::get('rechargements/liste/{term?}/', [App\Http\Controllers\RechargementController::class, 'index' ])->name('rechargements.index');

//onlysearch
Route::get('rechargements/orange/', [App\Http\Controllers\RechargementController::class, 'orange' ])->name('rechargements.oranges');
Route::post('rechargements/orange/', [App\Http\Controllers\RechargementController::class, 'searchOrange' ]);
Route::get('rechargements/mtn/', [App\Http\Controllers\RechargementController::class, 'mtn' ])->name('rechargements.mtns');
Route::post('rechargements/mtn/', [App\Http\Controllers\RechargementController::class, 'searchMtn' ]);
Route::get('rechargements/moov/', [App\Http\Controllers\RechargementController::class, 'moov' ])->name('rechargements.moovs');
Route::post('rechargements/moov/', [App\Http\Controllers\RechargementController::class, 'searchMoov' ]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::group(['auth:sanctum', 'verified'], function(){
    //reseaux
  Route::get('reseaux', [App\Http\Controllers\ReseauController::class, 'create'])->name('reseaus.create');
  Route::post('reseaux', [App\Http\Controllers\ReseauController::class, 'store']);
//   Route::get('reseaux/reseaux/{id}', [App\Http\Controllers\ReseauController::class, 'show'])->name('reseaus.show');
    Route::get('reseaux/reseaux/edit/{id}', [App\Http\Controllers\ReseauController::class, 'edit']);
    Route::patch('reseaux/reseaux/{id}', [App\Http\Controllers\ReseauController::class, 'update']);
    Route::delete('reseaux/reseaux/{id}', [App\Http\Controllers\ReseauController::class, 'destroy']);

    //fournisseurs
    Route::get('fournisseurs', [App\Http\Controllers\FournisseurController::class, 'create'])->name('fournisseurs.create');
    Route::post('fournisseurs', [App\Http\Controllers\FournisseurController::class, 'store']);
    // Route::get('fournisseurs/fournisseurs/{id}', [App\Http\Controllers\FournisseurController::class, 'show'])->name('fournisseurs.show');
    Route::get('fournisseurs/fournisseurs/edit/{id}', [App\Http\Controllers\FournisseurController::class, 'edit']);
    Route::patch('fournisseurs/fournisseurs/{id}', [App\Http\Controllers\FournisseurController::class, 'update']);
    Route::delete('fournisseurs/fournisseurs/{id}', [App\Http\Controllers\FournisseurController::class, 'destroy']);

           //rechargements
           Route::get('rechargements', [App\Http\Controllers\RechargementController::class, 'create'])->name('rechargements.create');
           Route::post('rechargements', [App\Http\Controllers\RechargementController::class, 'store']);

           //oranges
           Route::get('rechargements/orange/edit/{id}', [App\Http\Controllers\RechargementController::class, 'editOrange']);
           Route::get('rechargements/orange/orange/edit/{id}', [App\Http\Controllers\RechargementController::class, 'editOrange']);
            Route::patch('rechargements/orange/{id}', [App\Http\Controllers\RechargementController::class, 'updateOrange']);
            Route::patch('rechargements/orange/orange/{id}', [App\Http\Controllers\RechargementController::class, 'updateOrange']);
            Route::delete('rechargements/orange/{id}', [App\Http\Controllers\RechargementController::class, 'destroyOrange']);
            Route::delete('rechargements/orange/orange/{id}', [App\Http\Controllers\RechargementController::class, 'destroyOrange']);

               //mtns
           Route::get('rechargements/mtn/edit/{id}', [App\Http\Controllers\RechargementController::class, 'editMtn']);
           Route::get('rechargements/mtn/mtn/edit/{id}', [App\Http\Controllers\RechargementController::class, 'editMtn']);
           Route::patch('rechargements/mtn/{id}', [App\Http\Controllers\RechargementController::class, 'updateMtn']);
           Route::patch('rechargements/mtn/mtn/{id}', [App\Http\Controllers\RechargementController::class, 'updateMtn']);
           Route::delete('rechargements/mtn/{id}', [App\Http\Controllers\RechargementController::class, 'destroyMtn']);
           Route::delete('rechargements/mtn/mtn/{id}', [App\Http\Controllers\RechargementController::class, 'destroyMtn']);

              //moovs
              Route::get('rechargements/moov/edit/{id}', [App\Http\Controllers\RechargementController::class, 'editMoov']);
              Route::get('rechargements/moov/moov/edit/{id}', [App\Http\Controllers\RechargementController::class, 'editMoov']);
              Route::patch('rechargements/moov/{id}', [App\Http\Controllers\RechargementController::class, 'updateMoov']);
              Route::patch('rechargements/moov/moov/{id}', [App\Http\Controllers\RechargementController::class, 'updateMoov']);
              Route::delete('rechargements/moov/{id}', [App\Http\Controllers\RechargementController::class, 'destroyMoov']);
              Route::delete('rechargements/moov/moov/{id}', [App\Http\Controllers\RechargementController::class, 'destroyMoov']);

});
