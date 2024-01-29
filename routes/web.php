<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstacionesController;
use App\Http\Controllers\CampaniasController;
use App\Http\Controllers\EquiposController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#-------------- CRUD estaciones ---------------------
Route::resource('estaciones', EstacionesController::class)->except(['show'])
->middleware('auth');
Route::get('/delete-estacion/{estaciones_id}', array(
    'as' => 'estacionesDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\EstacionesController@LogicDelete'
));

#-------------- CRUD campanias ---------------------
Route::resource('campanias', CampaniasController::class)->except(['show'])
    ->middleware('auth');
Route::get('/delete-campania/{campania_id}', array(
    'as' => 'campaniasDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\CampaniasController@LogicDelete'
));

#-------------- CRUD equipos ---------------------
Route::resource('equipos', EquiposController::class)->except(['show'])
    ->middleware('auth');
Route::get('/delete-equipo/{equipos_id}', array(
    'as' => 'equiposDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\EquiposController@LogicDelete'
));
     
