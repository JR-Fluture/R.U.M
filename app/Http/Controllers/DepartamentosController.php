<?php

namespace App\Http\Controllers;
session_start();


use App\Models\Departamento;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:departamentos.index')->only('index');
        $this->middleware('can:departamentos.show')->only('show');
        $this->middleware('can:departamentos.create')->only('create','store');
        $this->middleware('can:departamentos.edit')->only('edit','update');
        $this->middleware('can:departamentos.destroy')->only('destroy');
        $this->middleware('can:departamentos.pdf')->only('pdf');
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
        
        return view('departamentos.index');
    }

    public function create()
    {
        return view('departamentos.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cod' => 'required|unique:departamentos|max:3',
        ]);
        $request['cod']=strtoupper($request->cod);
        $departamento=Departamento::create($request->all());
        
        return redirect()->route('departamentos.index')->with('info',__('The departament was saved successfully'));
    }

    public function show(Departamento $departamento)
    {
        return view('departamentos.show',compact('departamento'));
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit',compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'name' => 'required',
            'cod' => "required|unique:departamentos,cod,$departamento->id|max:3",
        ]);
        
        $request['cod']=strtoupper($request->cod);
        $departamento->update($request->all());
        return redirect()->route('departamentos.index')->with('info',__('The departament was successfully updated'));
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('info',__('The departament has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $departamentos = Departamento::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('cod', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $departamentos = Departamento::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('departamentos.pdf', ['departamentos' => $departamentos])->setPaper('a4', 'landscape');
        return $pdf->download('departamentos.pdf');
        //return $pdf->stream(); 
    }
}
