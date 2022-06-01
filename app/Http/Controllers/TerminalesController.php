<?php
namespace App\Http\Controllers;
session_start();

use App\Http\Livewire\PersonaIndex;
use App\Models\Departamento;
use App\Models\ModelosTerminales;
use App\Models\Monitores;
use App\Models\Pc;
use App\Models\Persona;
use App\Models\Terminales;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TerminalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:terminales.index')->only('index');
        $this->middleware('can:terminales.show')->only('show');
        $this->middleware('can:terminales.create')->only('create','store');
        $this->middleware('can:terminales.edit')->only('edit','update');
        $this->middleware('can:terminales.destroy')->only('destroy');
        $this->middleware('can:terminales.pdf')->only('pdf');
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
        
        return view('terminales.index');
    }

    public function create()
    {
        $allModelosTerminales=ModelosTerminales::all();
        $modelos=[''];
        foreach ($allModelosTerminales as $modelo) {
            array_push($modelos, $modelo->marca_terminal->name.' '.$modelo->modelo.' '.$modelo->sistema_operativo);
        }
        
        return view('terminales.create',compact('modelos'));
    }
    
    public function store(Request $request)
    {
        $terminale=Terminales::create($request->all());
        return redirect()->route('terminales.index')->with('info',__('The terminal was saved successfully'));
    }
    
    public function show(Terminales $terminale)
    {
        $allModelosTerminales=ModelosTerminales::all();
        $modelos=[''];
        foreach ($allModelosTerminales as $modelo) {
            array_push($modelos, $modelo->marca_terminal->name.' '.$modelo->modelo.' '.$modelo->sistema_operativo);
        }

        return view('terminales.show',compact('terminale','modelos'));
    }
    
    public function edit(Terminales $terminale)
    {
        $allModelosTerminales=ModelosTerminales::all();
        $modelos=[''];
        foreach ($allModelosTerminales as $modelo) {
            array_push($modelos, $modelo->marca_terminal->name.' '.$modelo->modelo.' '.$modelo->sistema_operativo);
        }
        
        return view('terminales.edit',compact('terminale','modelos'));
    }
    
    public function update(Request $request, Terminales $terminale)
    {
        $terminale->update($request->all());
        return redirect()->route('terminales.index')->with('info',__('The terminal was successfully updated'));
    }
    
    public function destroy(Terminales $terminale)
    {
        $terminale->delete();
        return redirect()->route('terminales.index')->with('info',__('The terminal has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $terminales = Terminales::whereIn('modelo_terminal_id', function ($query) {
                $query->select('id')->from('modelos_terminales')
                    ->where('modelo', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('sistema_operativo', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('almacenamiento_interno', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%')
            ->orWhere('imei_1', 'LIKE', '%' . $this->search . '%')
            ->orWhere('imei_2', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            
            $terminales = Terminales::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('terminales.pdf', ['terminales' => $terminales])->setPaper('a4', 'landscape');
        return $pdf->download('terminales.pdf');
        //return $pdf->stream(); 
    }
}
