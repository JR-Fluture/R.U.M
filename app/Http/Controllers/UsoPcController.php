<?php
namespace App\Http\Controllers;
session_start();

use App\Http\Livewire\PersonaIndex;
use App\Models\Departamento;
use App\Models\Monitores;
use App\Models\Pc;
use App\Models\Persona;
use App\Models\UsosPc;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UsoPcController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:usopcs.index')->only('index');
        $this->middleware('can:usopcs.show')->only('show');
        $this->middleware('can:usopcs.create')->only('create','store');
        $this->middleware('can:usopcs.edit')->only('edit','update');
        $this->middleware('can:usopcs.destroy')->only('destroy');
        $this->middleware('can:usopcs.pdf')->only('pdf');
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
        
        return view('usopcs.index');
    }

    public function create()
    {
        $allPersonas=Persona::all();
        $personas=[''];
        foreach ($allPersonas as $persona) {
            array_push($personas, $persona->id.'.-'.$persona->name.' /-/ '.$persona->dni);
        }

        $allPcs=Pc::all();
        $pcs=[''];
        foreach ($allPcs as $pc) {
            array_push($pcs, $pc->id.'.-'.$pc->microprocesador.' /-/ '.$pc->placa_base.' /-/ '.$pc->sistema_operativo);
        }
        $allMonitores=Monitores::all();
        $monitores=[''];
        foreach ($allMonitores as $monitor) {
            array_push($monitores, $monitor->id.'.-'.$monitor->marca.' /-/ '.$monitor->modelo);
        }
        
        return view('usopcs.create',compact('personas','pcs','monitores'));
    }
    
    public function store(Request $request)
    {
        $usopc=UsosPc::create($request->all());
        return redirect()->route('usopcs.index')->with('info',__('The pc use was saved successfully'));
    }
    
    public function show(UsosPc $usopc)
    {
        $allPersonas=Persona::all();
        $personas=[''];
        foreach ($allPersonas as $persona) {
            array_push($personas, $persona->id.'.-'.$persona->name.' /-/ '.$persona->dni);
        }

        $allPcs=Pc::all();
        $pcs=[''];
        foreach ($allPcs as $pc) {
            array_push($pcs, $pc->id.'.-'.$pc->microprocesador.' /-/ '.$pc->placa_base.' /-/ '.$pc->sistema_operativo);
        }
        $allMonitores=Monitores::all();
        $monitores=[''];
        foreach ($allMonitores as $monitor) {
            array_push($monitores, $monitor->id.'.-'.$monitor->marca.' /-/ '.$monitor->modelo);
        }
        return view('usopcs.show',compact('usopc','personas','pcs','monitores'));
    }
    
    public function edit(UsosPc $usopc)
    {
        $allPersonas=Persona::all();
        $personas=[''];
        foreach ($allPersonas as $persona) {
            array_push($personas, $persona->id.'.-'.$persona->name.' /-/ '.$persona->dni);
        }

        $allPcs=Pc::all();
        $pcs=[''];
        foreach ($allPcs as $pc) {
            array_push($pcs, $pc->id.'.-'.$pc->microprocesador.' /-/ '.$pc->placa_base.' /-/ '.$pc->sistema_operativo);
        }
        $allMonitores=Monitores::all();
        $monitores=[''];
        
        foreach ($allMonitores as $monitor) {
            array_push($monitores, $monitor->id.'.-'.$monitor->marca.' /-/ '.$monitor->modelo);
        }
        
        return view('usopcs.edit',compact('usopc','personas','pcs','monitores'));
    }
    
    public function update(Request $request, UsosPc $usopc)
    {
        /* $request['persona_id']=$request['persona_id']+1;
        $request['monitor_id']=$request['monitor_id']+1;
        $request['pc_id']=$request['pc_id']+1;
        var_dump($request->all()); */
        $usopc->update($request->all());
        return redirect()->route('usopcs.index')->with('info',__('The pc use was successfully updated'));
    }
    
    public function destroy(UsosPc $usopc)
    {
        $usopc->delete();
        return redirect()->route('usopcs.index')->with('info',__('The pc use has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $usopcs = UsosPc::whereIn('persona_id', function ($query) {
                $query->select('id')->from('personas')
                    ->whereIn('departamento_id', function ($query2) {
                        $query2->select('id')->from('departamentos')
                            ->where('name', 'LIKE', '%' . $this->search . '%');
                    })    
                    ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('dni', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere(function($subquery){
                $subquery->whereIn('pc_id', function ($query) {
                $query->select('id')->from('pcs')
                    ->orWhere('microprocesador', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('placa_base', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('sistema_operativo', 'LIKE', '%' . $this->search . '%');
            });
            })
            ->orWhere(function($subquery){
                $subquery->whereIn('monitor_id', function ($query) {
                    $query->select('id')->from('monitores')
                        ->where('marca', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];
            
            $usopcs = UsosPc::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('usopcs.pdf', ['usopcs' => $usopcs])->setPaper('a4', 'landscape');
        return $pdf->download('usopcs.pdf');
        //return $pdf->stream(); 
    }
}
