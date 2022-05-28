<?php

namespace App\Http\Controllers;
session_start();


use App\Models\TiposCargadores;
use Illuminate\Http\Request;

class TiposCargadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:tipos-cargadores.index')->only('index');
        $this->middleware('can:tipos-cargadores.show')->only('show');
        $this->middleware('can:tipos-cargadores.create')->only('create','store');
        $this->middleware('can:tipos-cargadores.edit')->only('edit','update');
        $this->middleware('can:tipos-cargadores.destroy')->only('destroy');
    }
    public $search;
    public function index()
    {
        $tipos_cargadores = TiposCargadores::all();
        
        return view('tipos-cargadores.index',compact('tipos_cargadores'));
    }

    public function create()
    {
        return view('tipos-cargadores.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        TiposCargadores::create($request->all());
        
        return redirect()->route('tipos-cargadores.index')->with('info',__('The type charger was saved successfully'));
    }

    public function show(TiposCargadores $tipos_cargadore)
    {
        return view('tipos-cargadores.show',compact('tipos_cargadore'));
    }

    public function edit(TiposCargadores $tipos_cargadore)
    {
        return view('tipos-cargadores.edit',compact('tipos_cargadore'));
    }

    public function update(Request $request, TiposCargadores $tipos_cargadore)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $tipos_cargadore->update($request->all());
        return redirect()->route('tipos-cargadores.index')->with('info',__('The type charger was successfully updated'));
    }

    public function destroy(TiposCargadores $tipos_cargadore)
    {
        $tipos_cargadore->delete();
        return redirect()->route('tipos-cargadores.index')->with('info',__('The type charger has been successfully deleted'));
    }
}
