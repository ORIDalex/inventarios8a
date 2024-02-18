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
Route::get('/estaciones-delete/{estaciones_id}', array(
    'as' => 'estacionesDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\EstacionesController@LogicDelete'
));


#-------------- CRUD campanias ---------------------
Route::resource('/campanias', CampaniasController::class)->except(['show'])
    ->middleware('auth');
    Route::get('/campanias/LogicDelete/{id}', array(
        'as' => 'campaniasDelete',
        'middleware' => 'auth',
        'uses' => '\App\Http\Controllers\CampaniasController@LogicDelete'
    ));
    Route::get('/campanias-edit', array(
        'as' => 'edit-campania',
        'middleware' => 'auth',
        'uses' => '\App\Http\Controllers\CampaniasController@edit'
    ));
    Route::post('/campanias-update', array(
        'as' => 'campanias-update',
        'middleware' => 'auth',
        'uses' => '\App\Http\Controllers\CampaniasController@update'
    ));
    Route::get('/campanias.create', array(
        'as' => 'create-campania',
        'middleware' => 'auth',
        'uses' => '\App\Http\Controllers\CampaniasController@create'
    ));
    Route::get('/campanias', array(
        'as' => 'campanias',
        'middleware' => 'auth',
        'uses' => '\App\Http\Controllers\CampaniasController@index'
    ));

#-------------- CRUD equipos ---------------------
Route::resource('equipos', EquiposController::class)->except(['show'])
    ->middleware('auth');
Route::get('/delete-equipo/{equipos_id}', array(
    'as' => 'equiposDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\EquiposController@LogicDelete'
));

#-------------- Imprimir PDF ---------------------
Route::name('print')->get('/print', '\App\Http\Controllers\CampaniasController@imprimir');
     

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});