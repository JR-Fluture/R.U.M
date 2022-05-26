<?php

namespace App\Http\Controllers;
session_start();

use App\Models\Monitores;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MonitoresController extends Controller
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
        
        return view('monitores.index');
    }

    public function create()
    {
        return view('monitores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => "required",
        ]);

        $monitor=Monitores::create($request->all());
        return redirect()->route('monitores.index')->with('info',__('The monitor was saved successfully'));
    }

    public function show(Monitores $monitor)
    {
        return view('monitores.show',compact('monitor'));
    }

    public function edit(Monitores $monitor)
    {
        return view('monitores.edit',compact('monitor'));
    }

    public function update(Request $request, Monitores $monitor)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => "required",
        ]);

        $monitor->update($request->all());
        return redirect()->route('monitores.index')->with('info',__('The monitor was successfully updated'));
    }

    public function destroy(Monitores $monitor)
    {
        $monitor->delete();
        return redirect()->route('monitores.index')->with('info',__('The monitor has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $monitores = Monitores::where('marca', 'LIKE', '%' . $this->search . '%')
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $monitores = Monitores::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('monitores.pdf', ['monitores' => $monitores])->setPaper('a4', 'landscape');
        return $pdf->download('monitores.pdf');
        //return $pdf->stream(); 
    }
}
