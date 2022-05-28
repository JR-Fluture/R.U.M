<?php

namespace App\Http\Controllers;
session_start();

use App\Models\Pc;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PcController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:pcs.index')->only('index');
        $this->middleware('can:pcs.show')->only('show');
        $this->middleware('can:pcs.create')->only('create','store');
        $this->middleware('can:pcs.edit')->only('edit','update');
        $this->middleware('can:pcs.destroy')->only('destroy');
        $this->middleware('can:pcs.pdf')->only('pdf');
    }
    public $search;
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
        
        return view('pcs.index');
    }

    public function create()
    {
        return view('pcs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'microprocesador' => 'required',
            'placa_base' => "required",
        ]);

        $pc=Pc::create($request->all());
        return redirect()->route('pcs.index')->with('info',__('The pc was saved successfully'));
    }

    public function show(Pc $pc)
    {
        return view('pcs.show',compact('pc'));
    }

    public function edit(Pc $pc)
    {
        return view('pcs.edit',compact('pc'));
    }

    public function update(Request $request, Pc $pc)
    {
        $request->validate([
            'microprocesador' => 'required',
            'placa_base' => "required",
        ]);

        $pc->update($request->all());
        return redirect()->route('pcs.index')->with('info',__('The pc was successfully updated'));
    }

    public function destroy(Pc $pc)
    {
        $pc->delete();
        return redirect()->route('pcs.index')->with('info',__('The pc has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $pcs = Pc::where('microprocesador', 'LIKE', '%' . $this->search . '%')
            ->orWhere('placa_base', 'LIKE', '%' . $this->search . '%')
            ->orWhere('sistema_operativo', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $pcs = Pc::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('pcs.pdf', ['pcs' => $pcs])->setPaper('a4', 'landscape');
        //return $pdf->download('pcs.pdf');
        return $pdf->stream(); 
    }
}
