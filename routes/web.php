<?php

use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\IncidenciaPcController;
use App\Http\Controllers\MonitoresController;
use App\Http\Controllers\PcController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsoPcController;
use Illuminate\Routing\RouteGroup;
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
    return view('home');
})->name('home')->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('personas/pdf',[PersonaController::class,'pdf'])->name('personas.pdf')->middleware('auth');
Route::resource('personas',PersonaController::class)->middleware('auth');

Route::get('impresoras/pdf',[ImpresoraController::class,'pdf'])->name('impresoras.pdf')->middleware('auth');
Route::post('impresoras/relacion/{impresora}',[ImpresoraController::class,'relacion'])->name('impresoras.relacion')->middleware('auth');
Route::resource('impresoras',ImpresoraController::class)->middleware('auth');

Route::get('monitores/pdf',[MonitoresController::class,'pdf'])->name('monitores.pdf')->middleware('auth');
Route::controller(MonitoresController::class)->group(function(){
    Route::get('monitores', "index")->name("monitores.index")->middleware('auth');
    Route::get('monitores/create', "create")->name("monitores.create")->middleware('auth');
    Route::post('monitores', "store")->name("monitores.store")->middleware('auth'); 
    Route::get('monitores/{monitor}', "show")->name("monitores.show")->middleware('auth');
    Route::get('monitores/{monitor}/edit', "edit")->name("monitores.edit")->middleware('auth');
    Route::put('monitores/{monitor}', "update")->name("monitores.update")->middleware('auth');
    Route::delete('monitores/{monitor}', "destroy")->name("monitores.destroy")->middleware('auth');
});

Route::get('pcs/pdf',[PcController::class,'pdf'])->name('pcs.pdf')->middleware('auth');
Route::resource('pcs',PcController::class)->middleware('auth');

Route::get('usopcs/pdf',[UsoPcController::class,'pdf'])->name('usopcs.pdf')->middleware('auth');
Route::resource('usopcs',UsoPcController::class)->middleware('auth');

Route::get('incidencias-pcs/pdf',[IncidenciaPcController::class,'pdf'])->name('incidencias-pcs.pdf')->middleware('auth');
Route::resource('incidencias-pcs',IncidenciaPcController::class)->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
