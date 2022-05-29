<?php
namespace App\Http\Controllers;
session_start();

use App\Http\Livewire\ModelosTerminalesIndex;
use App\Models\MarcasTerminales;
use App\Models\Departamento;
use App\Models\ModelosTerminales;
use App\Models\TiposCargadores;
use App\Models\TiposTerminales;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ModelosTerminalesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:modelos-terminales.index')->only('index');
        $this->middleware('can:modelos-terminales.show')->only('show');
        $this->middleware('can:modelos-terminales.create')->only('create','store');
        $this->middleware('can:modelos-terminales.edit')->only('edit','update');
        $this->middleware('can:modelos-terminales.destroy')->only('destroy');
        $this->middleware('can:modelos-terminales.pdf')->only('pdf');
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
        
        return view('modelos-terminales.index');
    }

    public function create()
    {
        $marcas_terminales=MarcasTerminales::get()->pluck('name','id');
        $tipos_terminales=TiposTerminales::get()->pluck('name','id');
        $tipos_cargadores=TiposCargadores::get()->pluck('name','id');
        return view('modelos-terminales.create',compact('tipos_terminales','marcas_terminales','tipos_cargadores'));
    }
    
    public function store(Request $request)
    {
        ModelosTerminales::create($request->all());
        return redirect()->route('modelos-terminales.index')->with('info',__('The line was saved successfully'));
    }
    
    public function show(ModelosTerminales $modelos_terminale)
    {
        $marcas_terminales=MarcasTerminales::get()->pluck('name','id');
        $tipos_terminales=TiposTerminales::get()->pluck('name','id');
        $tipos_cargadores=TiposCargadores::get()->pluck('name','id');
        return view('modelos-terminales.show',compact('modelos_terminale','tipos_terminales','marcas_terminales','tipos_cargadores'));
    }
    
    public function edit(ModelosTerminales $modelos_terminale)
    {
        $marcas_terminales=MarcasTerminales::get()->pluck('name','id');
        $tipos_terminales=TiposTerminales::get()->pluck('name','id');
        $tipos_cargadores=TiposCargadores::get()->pluck('name','id');
        return view('modelos-terminales.edit',compact('modelos_terminale','tipos_terminales','marcas_terminales','tipos_cargadores'));
    }
    
    public function update(Request $request, ModelosTerminales $modelos_terminale)
    {
        $modelos_terminale->update($request->all());
        return redirect()->route('modelos-terminales.index')->with('info',__('The line was successfully updated'));
    }
    
    public function destroy(ModelosTerminales $modelos_terminale)
    {
        $modelos_terminale->delete();
        return redirect()->route('modelos-terminales.index')->with('info',__('The line has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $modelos_terminales = ModelosTerminales::whereIn('tipo_terminal_id', function ($query) {
                $query->select('id')->from('tipos_terminales')
                    ->where('name', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere(function($subquery){
                $subquery->whereIn('marca_terminal_id', function ($query) {
                    $query->select('id')->from('marcas_terminales')
                        ->where('name', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->orWhere(function($subquery){
                $subquery->whereIn('tipo_cargador_id', function ($query) {
                    $query->select('id')->from('tipos_cargadores')
                        ->where('name', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('sistema_operativo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('almacenamiento_interno', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();

        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];
            $modelos_terminales = ModelosTerminales::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('modelos-terminales.pdf', ['modelos_terminales' => $modelos_terminales])->setPaper('a4', 'landscape');
        return $pdf->download('modelos-terminales.pdf');
        //return $pdf->stream(); 
    }
}
