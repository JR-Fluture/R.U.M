<?php

namespace App\Http\Controllers;
session_start();

use App\Models\Impresora;
use App\Models\Persona;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ImpresoraController extends Controller
{

    public function index()
    {
        if (isset($_GET["condicional"])) {
            if (isset($_SESSION["condicional"])) {
                if ($_SESSION["condicional"]!=$_GET["condicional"]) {
                    $_GET["orden"]='DESC';
                }
            }
            $_SESSION["condicional"]=$_GET["condicional"];
        }else{
            $_SESSION["condicional"]='id';
        }

        if (isset($_GET["orden"])) {
            if ($_GET["orden"]=='ASC') {
                $_SESSION["orden"]='DESC';
            }else{
                $_SESSION["orden"]='ASC';
            }
        }else{
            $_SESSION["orden"]='ASC';
        }
        
        return view('impresoras.index');
    }

    public function create()
    {
        return view('impresoras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => "required",
        ]);

        $impresora=Impresora::create($request->all());
        return redirect()->route('impresoras.index')->with('info',__('The printer was saved successfully'));
    }

    public function show(Impresora $impresora)
    {
        $personas=Persona::join('impresora_persona', 'personas.id', '=', 'impresora_persona.persona_id')
            ->where('impresora_id', $impresora->id)
            ->latest('impresora_persona.id')
            ->get();
        $all=Persona::all();
        $all=Persona::get()->pluck('name','id');
        return view('impresoras.show',compact('impresora','personas','all'));
    }

    public function edit(Impresora $impresora)
    {
        return view('impresoras.edit',compact('impresora'));
    }

    public function update(Request $request, Impresora $impresora)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => "required",
        ]);

        $impresora->update($request->all());
        return redirect()->route('impresoras.index')->with('info',__('The printer was successfully updated'));
    }

    public function destroy(Impresora $impresora)
    {
        $impresora->delete();
        return redirect()->route('impresoras.index')->with('info',__('The printer has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $impresoras = Impresora::where('marca', 'LIKE', '%' . $this->search . '%')
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $impresoras = Impresora::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('impresoras.pdf', ['impresoras' => $impresoras])->setPaper('a4', 'landscape');
        return $pdf->download('impresoras.pdf');
        //return $pdf->stream(); 
    }

    public function relacion(Request $request, Impresora $impresora)
    {
        $persona=Persona::all()->where('id',$request->persona_select);
        /* print_r($persona[($request->persona_select)-1]);
        $persona=Persona::all()->random();
        print('<br>');
        print_r($persona); */
        $persona[($request->persona_select)-1]->impresora()->attach(
            $impresora->id
        );
        return redirect()->route('impresoras.show',compact('impresora'));
    }
}
