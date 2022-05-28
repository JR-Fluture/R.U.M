<?php

namespace App\Http\Controllers;
session_start();


use App\Models\TiposTerminales;
use Illuminate\Http\Request;

class TiposTerminalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:tipos-terminales.index')->only('index');
        $this->middleware('can:tipos-terminales.show')->only('show');
        $this->middleware('can:tipos-terminales.create')->only('create','store');
        $this->middleware('can:tipos-terminales.edit')->only('edit','update');
        $this->middleware('can:tipos-terminales.destroy')->only('destroy');
    }
    public $search;
    public function index()
    {
        $tipos_terminales = TiposTerminales::all();
        
        return view('tipos-terminales.index',compact('tipos_terminales'));
    }

    public function create()
    {
        return view('tipos-terminales.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tipos_terminale=TiposTerminales::create($request->all());
        
        return redirect()->route('tipos-terminales.index')->with('info',__('The type terminal was saved successfully'));
    }

    public function show(TiposTerminales $tipos_terminale)
    {
        return view('tipos-terminales.show',compact('tipos_terminale'));
    }

    public function edit(TiposTerminales $tipos_terminale)
    {
        return view('tipos-terminales.edit',compact('tipos_terminale'));
    }

    public function update(Request $request, TiposTerminales $tipos_terminale)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $tipos_terminale->update($request->all());
        return redirect()->route('tipos-terminales.index')->with('info',__('The type terminal was successfully updated'));
    }

    public function destroy(TiposTerminales $tipos_terminale)
    {
        $tipos_terminale->delete();
        return redirect()->route('tipos-terminales.index')->with('info',__('The type terminal has been successfully deleted'));
    }
}
