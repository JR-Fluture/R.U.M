<?php

namespace App\Http\Controllers;
session_start();


use App\Models\Contrato;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ContratosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:contratos.index')->only('index');
        $this->middleware('can:contratos.show')->only('show');
        $this->middleware('can:contratos.create')->only('create','store');
        $this->middleware('can:contratos.edit')->only('edit','update');
        $this->middleware('can:contratos.destroy')->only('destroy');
    }
    public $search;
    public function index()
    {
        $contratos = Contrato::paginate(6);
        
        return view('contratos.index',compact('contratos'));
    }

    public function create()
    {
        $proveedores=Proveedores::get()->pluck('name','id');
        return view('contratos.create',compact('proveedores'));
    }
    
    public function store(Request $request)
    {

        Contrato::create($request->all());
        return redirect()->route('contratos.index')->with('info',__('The contract was saved successfully'));
    }

    public function show(Contrato $contrato)
    {
        $proveedores=Proveedores::get()->pluck('name','id');

        return view('contratos.show',compact('contrato','proveedores'));
    }

    public function edit(Contrato $contrato)
    {
        $proveedores=Proveedores::get()->pluck('name','id');
        return view('contratos.edit',compact('contrato','proveedores'));
    }

    public function update(Request $request, Contrato $contrato)
    {
        $contrato->update($request->all());
        return redirect()->route('contratos.index')->with('info',__('The contract was successfully updated'));
    }

    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('contratos.index')->with('info',__('The contract has been successfully deleted'));
    }
}
