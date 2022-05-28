<?php

namespace App\Http\Controllers;
session_start();


use App\Models\MarcasTerminales;
use Illuminate\Http\Request;

class MarcasTerminalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:marcas-terminales.index')->only('index');
        $this->middleware('can:marcas-terminales.show')->only('show');
        $this->middleware('can:marcas-terminales.create')->only('create','store');
        $this->middleware('can:marcas-terminales.edit')->only('edit','update');
        $this->middleware('can:marcas-terminales.destroy')->only('destroy');
    }
    public $search;
    public function index()
    {
        $marcas_terminales = MarcasTerminales::all();
        
        return view('marcas-terminales.index',compact('marcas_terminales'));
    }

    public function create()
    {
        return view('marcas-terminales.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $marcas_terminale=MarcasTerminales::create($request->all());
        
        return redirect()->route('marcas-terminales.index')->with('info',__('The mark terminal was saved successfully'));
    }

    public function show(MarcasTerminales $marcas_terminale)
    {
        return view('marcas-terminales.show',compact('marcas_terminale'));
    }

    public function edit(MarcasTerminales $marcas_terminale)
    {
        return view('marcas-terminales.edit',compact('marcas_terminale'));
    }

    public function update(Request $request, MarcasTerminales $marcas_terminale)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $marcas_terminale->update($request->all());
        return redirect()->route('marcas-terminales.index')->with('info',__('The mark terminal was successfully updated'));
    }

    public function destroy(MarcasTerminales $marcas_terminale)
    {
        $marcas_terminale->delete();
        return redirect()->route('marcas-terminales.index')->with('info',__('The mark terminal has been successfully deleted'));
    }
}
