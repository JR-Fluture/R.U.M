<?php

namespace App\Http\Controllers;
session_start();


use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:proveedores.index')->only('index');
        $this->middleware('can:proveedores.show')->only('show');
        $this->middleware('can:proveedores.create')->only('create','store');
        $this->middleware('can:proveedores.edit')->only('edit','update');
        $this->middleware('can:proveedores.destroy')->only('destroy');
    }
    public $search;
    public function index()
    {
        $proveedores = Proveedores::paginate(6);
        
        return view('proveedores.index',compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $proveedore=Proveedores::create($request->all());
        
        return redirect()->route('proveedores.index')->with('info',__('The supplier was saved successfully'));
    }

    public function show(Proveedores $proveedore)
    {
        return view('proveedores.show',compact('proveedore'));
    }

    public function edit(Proveedores $proveedore)
    {
        return view('proveedores.edit',compact('proveedore'));
    }

    public function update(Request $request, Proveedores $proveedore)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $proveedore->update($request->all());
        return redirect()->route('proveedores.index')->with('info',__('The supplier was successfully updated'));
    }

    public function destroy(Proveedores $proveedore)
    {
        $proveedore->delete();
        return redirect()->route('proveedores.index')->with('info',__('The supplier has been successfully deleted'));
    }
}
