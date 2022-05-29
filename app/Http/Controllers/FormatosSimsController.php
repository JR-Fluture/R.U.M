<?php

namespace App\Http\Controllers;
session_start();


use App\Models\FormatosSims;
use Illuminate\Http\Request;

class FormatosSimsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:formatos-sims.index')->only('index');
        $this->middleware('can:formatos-sims.show')->only('show');
        $this->middleware('can:formatos-sims.create')->only('create','store');
        $this->middleware('can:formatos-sims.edit')->only('edit','update');
        $this->middleware('can:formatos-sims.destroy')->only('destroy');
    }
    public $search;
    public function index()
    {
        $formatos_sims = FormatosSims::paginate(6);
        
        return view('formatos-sims.index',compact('formatos_sims'));
    }

    public function create()
    {
        return view('formatos-sims.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $request['cod']=strtoupper($request->cod);
        $formatos_sim=FormatosSims::create($request->all());
        
        return redirect()->route('formatos-sims.index')->with('info',__('The format sim was saved successfully'));
    }

    public function show(FormatosSims $formatos_sim)
    {
        return view('formatos-sims.show',compact('formatos_sim'));
    }

    public function edit(FormatosSims $formatos_sim)
    {
        return view('formatos-sims.edit',compact('formatos_sim'));
    }

    public function update(Request $request, FormatosSims $formatos_sim)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $formatos_sim->update($request->all());
        return redirect()->route('formatos-sims.index')->with('info',__('The format sim was successfully updated'));
    }

    public function destroy(FormatosSims $formatos_sim)
    {
        $formatos_sim->delete();
        return redirect()->route('formatos-sims.index')->with('info',__('The format sim has been successfully deleted'));
    }
}
