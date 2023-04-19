<?php

use App\Http\Controllers\datosController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('recaudador.token',[datosController::class,'token'])
->middleware('can:recaudador.token','auth')->name('recaudador.token');

Route::get('punto.datos',[datosController::class,'datos'])
->middleware('can:punto.datos','auth')->name('punto.datos');

Route::get('users.nuevo', [UserController::class,'nuevo'])->name('users.nuevo')
->middleware('auth');
Route::post('users.actualizar', [UserController::class,'actualizar'])->name('users.actualizar')
->middleware('auth');
Route::get('users.reset/{users}', [UserController::class,'reset'])->name('users.reset')
->middleware('auth');

Route::resource('users',UserController::class)->names('users')
->middleware('auth');

Route::get('datos.imagen/{user}',[datosController::class,'imagen'])
->middleware('auth')->name('datos.imagen');
Route::post('datos.foto',[datosController::class,'foto'])
->middleware('auth')->name('datos.foto');

Route::post('datos.subir',[datosController::class,'subir'])
->middleware('auth')->name('datos.subir');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

