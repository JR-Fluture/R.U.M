<?php

use App\Http\Controllers\ContratosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\FormatosSimsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\IncidenciaPcController;
use App\Http\Controllers\IncidenciaTerminalesController;
use App\Http\Controllers\LineasController;
use App\Http\Controllers\MarcasTerminalesController;
use App\Http\Controllers\ModelosTerminalesController;
use App\Http\Controllers\MonitoresController;
use App\Http\Controllers\PcController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\SimsController;
use App\Http\Controllers\TerminalesController;
use App\Http\Controllers\TiposCargadoresController;
use App\Http\Controllers\TiposLineasController;
use App\Http\Controllers\TiposTerminalesController;
use App\Http\Controllers\UsoPcController;
use App\Http\Controllers\UsoTerminalesController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

//* Otros
Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('panel', function () {
    return view('panel');
})->name('panel')->middleware('auth');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//* Personas
Route::get('personas/pdf',[PersonaController::class,'pdf'])->name('personas.pdf')->middleware('auth');
Route::resource('personas',PersonaController::class)->middleware('auth');
    //* Personas DashBoard
    Route::get('departamentos/pdf',[DepartamentosController::class,'pdf'])->name('departamentos.pdf')->middleware('auth');
    Route::resource('departamentos',DepartamentosController::class)->middleware('auth');

//* PCs
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

//* Moviles
Route::get('lineas/pdf',[LineasController::class,'pdf'])->name('lineas.pdf')->middleware('auth');
Route::resource('lineas',LineasController::class)->middleware('auth');

Route::get('sims/pdf',[SimsController::class,'pdf'])->name('sims.pdf')->middleware('auth');
Route::resource('sims',SimsController::class)->middleware('auth');

Route::get('modelos-terminales/pdf',[ModelosTerminalesController::class,'pdf'])->name('modelos-terminales.pdf')->middleware('auth');
Route::resource('modelos-terminales',ModelosTerminalesController::class)->middleware('auth');

Route::get('terminales/pdf',[TerminalesController::class,'pdf'])->name('terminales.pdf')->middleware('auth');
Route::resource('terminales',TerminalesController::class)->middleware('auth');

Route::get('usos-terminales/pdf',[UsoTerminalesController::class,'pdf'])->name('usos-terminales.pdf')->middleware('auth');
Route::resource('usos-terminales',UsoTerminalesController::class)->middleware('auth');

Route::get('incidencias-terminales/pdf',[IncidenciaTerminalesController::class,'pdf'])->name('incidencias-terminales.pdf')->middleware('auth');
Route::resource('incidencias-terminales',IncidenciaTerminalesController::class)->middleware('auth');
    //* Movil DashBoard
    Route::resource('formatos-sims',FormatosSimsController::class)->except('show')->middleware('auth');
    Route::resource('tipos-lineas',TiposLineasController::class)->except('show')->middleware('auth');
    Route::resource('marcas-terminales',MarcasTerminalesController::class)->except('show')->middleware('auth');
    Route::resource('tipos-terminales',TiposTerminalesController::class)->except('show')->middleware('auth');
    Route::resource('tipos-cargadores',TiposCargadoresController::class)->except('show')->middleware('auth');
    Route::resource('proveedores',ProveedoresController::class)->middleware('auth');
    Route::resource('contratos',ContratosController::class)->middleware('auth');

//* Usuarios DashBoard
    Route::get('panel/usuarios/pdf',[UsuarioController::class,'pdf'])->name('usuarios.pdf')->middleware('auth');
    Route::resource('panel/usuarios',UsuarioController::class)->except('show')->middleware('auth');

    Route::resource('roles',RoleController::class)->except('show')->middleware('auth');