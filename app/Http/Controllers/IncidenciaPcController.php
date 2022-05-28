<?php
namespace App\Http\Controllers;
session_start();


use App\Models\Departamento;
use App\Models\IncidenciasPc;
use App\Models\UsosPc;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class IncidenciaPcController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:incidencias-pcs.index')->only('index');
        $this->middleware('can:incidencias-pcs.show')->only('show');
        $this->middleware('can:incidencias-pcs.create')->only('create','store');
        $this->middleware('can:incidencias-pcs.edit')->only('edit','update');
        $this->middleware('can:incidencias-pcs.destroy')->only('destroy');
        $this->middleware('can:incidencias-pcs.pdf')->only('pdf');
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
        
        return view('incidencias-pcs.index');
    }

    public function create()
    {
        $allUsos=UsosPc::all();
        $usos_pcs=[''];
        foreach ($allUsos as $uso_pc) {
            array_push($usos_pcs, $uso_pc->id.'.-'.$uso_pc->persona->name.' /-/ '.$uso_pc->pc->microprocesador.'--'.$uso_pc->pc->placa_base.'--'.$uso_pc->pc->sistema_operativo.' /-/ '.$uso_pc->monitor->marca.'--'.$uso_pc->monitor->modelo);
        }
        
        return view('incidencias-pcs.create',compact('usos_pcs'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'asunto' => 'required'
        ]);

        $incidencias_pc=IncidenciasPc::create($request->all());
        return redirect()->route('incidencias-pcs.index')->with('info',__('The pc incident was saved successfully'));
    }
    
    public function show(IncidenciasPc $incidencias_pc)
    {
        $allUsos=UsosPc::all();
        $usos_pcs=[''];
        foreach ($allUsos as $uso_pc) {
            array_push($usos_pcs, $uso_pc->id.'.-'.$uso_pc->persona->name.' /-/ '.$uso_pc->pc->microprocesador.'--'.$uso_pc->pc->placa_base.'--'.$uso_pc->pc->sistema_operativo.' /-/ '.$uso_pc->monitor->marca.'--'.$uso_pc->monitor->modelo);
        }

        return view('incidencias-pcs.show',compact('incidencias_pc','usos_pcs'));
    }
    
    public function edit(IncidenciasPc $incidencias_pc)
    {
        $allUsos=UsosPc::all();
        $usos_pcs=[''];
        foreach ($allUsos as $uso_pc) {
            array_push($usos_pcs, $uso_pc->id.'.-'.$uso_pc->persona->name.' /-/ '.$uso_pc->pc->microprocesador.'--'.$uso_pc->pc->placa_base.'--'.$uso_pc->pc->sistema_operativo.' /-/ '.$uso_pc->monitor->marca.'--'.$uso_pc->monitor->modelo);
        }

        return view('incidencias-pcs.edit',compact('incidencias_pc','usos_pcs'));
    }
    
    public function update(Request $request, IncidenciasPc $incidencias_pc)
    {
        $request->validate([
            'asunto' => 'required'
        ]);

        $incidencias_pc->update($request->all());
        return redirect()->route('incidencias-pcs.index')->with('info',__('The pc incident was successfully updated'));
    }
    
    public function destroy(IncidenciasPc $incidencias_pc)
    {
        $incidencias_pc->delete();
        return redirect()->route('incidencias-pcs.index')->with('info',__('The pc incident has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $incidencias_pcs = IncidenciasPc::where('asunto', 'LIKE', '%' . $this->search . '%')
            ->orWhere('comentarios', 'LIKE', '%' . $this->search . '%')
            ->orWhere('conclusion', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $incidencias_pcs = IncidenciasPc::orderBy($condicional, $orden)
                ->get();
        }
        
        $pdf = Pdf::loadView('incidencias-pcs.pdf', ['incidencias_pcs' => $incidencias_pcs])->setPaper('a4', 'landscape');
        return $pdf->download('incidencias-pcs.pdf');
        //return $pdf->stream(); 
    }
}
