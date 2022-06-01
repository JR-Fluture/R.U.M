<?php
namespace App\Http\Controllers;
session_start();

use App\Http\Livewire\SimIndex;
use App\Models\FormatosSims;
use App\Models\Departamento;
use App\Models\Sim;
use App\Models\Linea;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SimsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:sims.index')->only('index');
        $this->middleware('can:sims.show')->only('show');
        $this->middleware('can:sims.create')->only('create','store');
        $this->middleware('can:sims.edit')->only('edit','update');
        $this->middleware('can:sims.destroy')->only('destroy');
        $this->middleware('can:sims.pdf')->only('pdf');
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
        
        return view('sims.index');
    }

    public function create()
    {
        $formato_sim=FormatosSims::get()->pluck('name','id');
        $linea=Linea::get()->pluck('numero_movil','id');
        return view('sims.create',compact('linea','formato_sim'));
    }
    
    public function store(Request $request)
    {
        Sim::create($request->all());
        return redirect()->route('sims.index')->with('info',__('The sim was saved successfully'));
    }
    
    public function show(Sim $sim)
    {
        $formato_sim=FormatosSims::get()->pluck('name','id');
        $linea=Linea::get()->pluck('numero_movil','id');
        return view('sims.show',compact('sim','linea','formato_sim'));
    }
    
    public function edit(Sim $sim)
    {
        $formato_sim=FormatosSims::get()->pluck('name','id');
        $linea=Linea::get()->pluck('numero_movil','id');
        return view('sims.edit',compact('sim','linea','formato_sim'));
    }
    
    public function update(Request $request, Sim $sim)
    {
        $sim->update($request->all());
        return redirect()->route('sims.index')->with('info',__('The sim was successfully updated'));
    }
    
    public function destroy(Sim $sim)
    {
        $sim->delete();
        return redirect()->route('sims.index')->with('info',__('The sim has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $sims = Sim::whereIn('linea_id', function ($query) {
                $query->select('id')->from('lineas')
                    ->where('numero_movil', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('numero_interno', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('numero_fijo', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('numero_sim', 'LIKE', '%' . $this->search . '%')
            ->orWhere('pin', 'LIKE', '%' . $this->search . '%')
            ->orWhere('puk', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();

        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];
            $sims = Sim::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('sims.pdf', ['sims' => $sims])->setPaper('a4', 'landscape');
        return $pdf->download('sims.pdf');
        //return $pdf->stream(); 
    }
}
