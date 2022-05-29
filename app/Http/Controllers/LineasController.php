<?php
namespace App\Http\Controllers;
session_start();

use App\Http\Livewire\LineaIndex;
use App\Models\Contrato;
use App\Models\Departamento;
use App\Models\Linea;
use App\Models\TiposLineas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LineasController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:lineas.index')->only('index');
        $this->middleware('can:lineas.show')->only('show');
        $this->middleware('can:lineas.create')->only('create','store');
        $this->middleware('can:lineas.edit')->only('edit','update');
        $this->middleware('can:lineas.destroy')->only('destroy');
        $this->middleware('can:lineas.pdf')->only('pdf');
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
        
        return view('lineas.index');
    }

    public function create()
    {
        $contratos=Contrato::get()->pluck('IDCONTACTO','id');
        $tipos_linea=TiposLineas::get()->pluck('tipo_linea','id');
        return view('lineas.create',compact('tipos_linea','contratos'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'numero_movil' => 'required',
            'numero_interno' => 'required'
        ]);

        $linea=Linea::create($request->all());
        return redirect()->route('lineas.index')->with('info',__('The line was saved successfully'));
    }
    
    public function show(Linea $linea)
    {
        $contratos=Contrato::get()->pluck('IDCONTACTO','id');
        $tipos_linea=TiposLineas::get()->pluck('tipo_linea','id');
        return view('lineas.show',compact('linea','tipos_linea','contratos'));
    }
    
    public function edit(Linea $linea)
    {
        $contratos=Contrato::get()->pluck('IDCONTACTO','id');
        $tipos_linea=TiposLineas::get()->pluck('tipo_linea','id');
        return view('lineas.edit',compact('linea','tipos_linea','contratos'));
    }
    
    public function update(Request $request, Linea $linea)
    {
        $request->validate([
            'numero_movil' => 'required',
            'numero_interno' => 'required'
        ]);
        $linea->update($request->all());
        return redirect()->route('lineas.index')->with('info',__('The line was successfully updated'));
    }
    
    public function destroy(Linea $linea)
    {
        $linea->delete();
        return redirect()->route('lineas.index')->with('info',__('The line has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $lineas = Linea::whereIn('tipo_linea_id', function ($query) {
                $query->select('id')->from('tipos_lineas')
                    ->where('tipo_linea', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('numero_movil', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_interno', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_fijo', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];
            $lineas = Linea::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('lineas.pdf', ['lineas' => $lineas])->setPaper('a4', 'landscape');
        return $pdf->download('lineas.pdf');
        //return $pdf->stream(); 
    }
}
