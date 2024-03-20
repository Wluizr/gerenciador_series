<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'series');

//  São todas as rotas controlada por SeriesController.
    // Route::controller(SeriesController::class)->group(function(){
    //     Route::get('/series', 'index')->name('series.index');
    //     Route::get('/series/criar', 'create')->name('series.create');
    //     Route::post('/series/nova-serie', 'store')->name('series.store');

    //     Route::get('/series/{series}/edit', 'edit')->name('series.edit');
    //     Route::post('/series/{series}/update', 'update')->name('series.update');

    //     Route::delete('/series/destroy/{serie}', 'destroy')->name('series.destroy');
    // });

/* Jeito mais simples 
Route::resource('/series', SeriesController::class)
    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
*/

Route::resource('/series', SeriesController::class)
    ->except('show');

Route::get('/series/{series}/seasons', [ SeasonsController::class, 'index' ])->name('seasons.index');

Route::get('season/{season}/episodes', [ EpisodesController::class, 'index' ])->name('episodes.index');
Route::post('season/{season}/episodes', function (Request $request){

    dd($request->all());
});





# --------------------------------------------------------------------------------

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'logar'])->name('logar');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'register'])->name('user.register');
Route::get('/logout', [LoginController::class, 'deslogar'])->name('deslogar');


#-------------------

