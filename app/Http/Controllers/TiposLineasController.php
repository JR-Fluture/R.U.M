<?php

namespace App\Http\Controllers;
session_start();


use App\Models\TiposLineas;
use Illuminate\Http\Request;

class TiposLineasController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:tipos-lineas.index')->only('index');
        $this->middleware('can:tipos-lineas.show')->only('show');
        $this->middleware('can:tipos-lineas.create')->only('create','store');
        $this->middleware('can:tipos-lineas.edit')->only('edit','update');
        $this->middleware('can:tipos-lineas.destroy')->only('destroy');
    }
    public $search;
    public function index()
    {
        $tipos_lineas = TiposLineas::all();
        
        return view('tipos-lineas.index',compact('tipos_lineas'));
    }

    public function create()
    {
        return view('tipos-lineas.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'tipo_linea' => 'required',
            'descripcion' => 'required',
        ]);
        $tipos_linea=TiposLineas::create($request->all());
        
        return redirect()->route('tipos-lineas.index')->with('info',__('The type line was saved successfully'));
    }

    public function show(TiposLineas $tipos_linea)
    {
        return view('tipos-lineas.show',compact('tipos_linea'));
    }

    public function edit(TiposLineas $tipos_linea)
    {
        return view('tipos-lineas.edit',compact('tipos_linea'));
    }

    public function update(Request $request, TiposLineas $tipos_linea)
    {
        $request->validate([
            'tipo_linea' => 'required',
            'descripcion' => 'required',
        ]);
        
        $tipos_linea->update($request->all());
        return redirect()->route('tipos-lineas.index')->with('info',__('The type line was successfully updated'));
    }

    public function destroy(TiposLineas $tipos_linea)
    {
        $tipos_linea->delete();
        return redirect()->route('tipos-lineas.index')->with('info',__('The type line has been successfully deleted'));
    }
}
