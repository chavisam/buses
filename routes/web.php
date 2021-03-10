<?php

use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Models\Parada;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/lista_paradas', App\Http\Livewire\ListaParadasComponent::class)->name('listaparadas');
Route::get('/buses', App\Http\Livewire\Buses::class)->name('buses');
Route::get('/usuarios', App\Http\Livewire\Usuarios::class)->name('usuarios');
Route::get('/rutas', App\Http\Livewire\Rutas::class)->name('rutas');
Route::get('/listadorutas', App\Http\Livewire\ListadoRutas::class)->name('listadorutas');
Route::get('/book', App\Http\Livewire\HacerReserva::class)->name('book');
Route::get('/dispo', App\Http\Livewire\Dispo::class)->name('dispo');
Route::get('/calendar', App\Http\Livewire\Calendar::class)->name('calendar');



//para ver las relaciones de la tabla pivot car_parada
Route::get('/y', function(){
    // $car = Car::findOrFail(1);
    //      return $car->paradas;

    $parada = Parada::findOrFail(3);
    return $parada->cars;
});
