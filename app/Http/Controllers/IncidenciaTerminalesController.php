<?php
namespace App\Http\Controllers;
session_start();


use App\Models\Departamento;
use App\Models\IncidenciasTerminales;
use App\Models\UsosTerminales;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class IncidenciaTerminalesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:incidencias-terminales.index')->only('index');
        $this->middleware('can:incidencias-terminales.show')->only('show');
        $this->middleware('can:incidencias-terminales.create')->only('create','store');
        $this->middleware('can:incidencias-terminales.edit')->only('edit','update');
        $this->middleware('can:incidencias-terminales.destroy')->only('destroy');
        $this->middleware('can:incidencias-terminales.pdf')->only('pdf');
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
        
        return view('incidencias-terminales.index');
    }

    public function create()
    {
        $allUsos=UsosTerminales::all();
        $usos_terminales=[''];
        foreach ($allUsos as $uso_terminal) {
            array_push($usos_terminales, $uso_terminal->id.'.-'.$uso_terminal->persona->name.' /-/ '.$uso_terminal->terminal->modelo_terminal->marca_terminal->name.'--'.$uso_terminal->terminal->modelo_terminal->modelo.'--'.$uso_terminal->terminal->imei_1.' /-/ '.$uso_terminal->sim->numero_sim.'--'.$uso_terminal->sim->linea->numero_movil);
        }
        
        return view('incidencias-terminales.create',compact('usos_terminales'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'asunto' => 'required'
        ]);

        $incidencias_terminale=IncidenciasTerminales::create($request->all());
        return redirect()->route('incidencias-terminales.index')->with('info',__('The terminal incident was saved successfully'));
    }
    
    public function show(IncidenciasTerminales $incidencias_terminale)
    {
        $allUsos=UsosTerminales::all();
        $usos_terminales=[''];
        foreach ($allUsos as $uso_terminal) {
            array_push($usos_terminales, $uso_terminal->id.'.-'.$uso_terminal->persona->name.' /-/ '.$uso_terminal->terminal->modelo_terminal->marca_terminal->name.'--'.$uso_terminal->terminal->modelo_terminal->modelo.'--'.$uso_terminal->terminal->imei_1.' /-/ '.$uso_terminal->sim->numero_sim.'--'.$uso_terminal->sim->linea->numero_movil);
        }

        return view('incidencias-terminales.show',compact('incidencias_terminale','usos_terminales'));
    }
    
    public function edit(IncidenciasTerminales $incidencias_terminale)
    {
        $allUsos=UsosTerminales::all();
        $usos_terminales=[''];
        foreach ($allUsos as $uso_terminal) {
            array_push($usos_terminales, $uso_terminal->id.'.-'.$uso_terminal->persona->name.' /-/ '.$uso_terminal->terminal->modelo_terminal->marca_terminal->name.'--'.$uso_terminal->terminal->modelo_terminal->modelo.'--'.$uso_terminal->terminal->imei_1.' /-/ '.$uso_terminal->sim->numero_sim.'--'.$uso_terminal->sim->linea->numero_movil);
        }

        return view('incidencias-terminales.edit',compact('incidencias_terminale','usos_terminales'));
    }
    
    public function update(Request $request, IncidenciasTerminales $incidencias_terminale)
    {
        $request->validate([
            'asunto' => 'required'
        ]);

        $incidencias_terminale->update($request->all());
        return redirect()->route('incidencias-terminales.index')->with('info',__('The terminal incident was successfully updated'));
    }
    
    public function destroy(IncidenciasTerminales $incidencias_terminale)
    {
        $incidencias_terminale->delete();
        return redirect()->route('incidencias-terminales.index')->with('info',__('The terminal incident has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $incidencias_terminales = IncidenciasTerminales::where('asunto', 'LIKE', '%' . $this->search . '%')
            ->orWhere('comentarios', 'LIKE', '%' . $this->search . '%')
            ->orWhere('conclusion', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $incidencias_terminales = IncidenciasTerminales::orderBy($condicional, $orden)
                ->get();
        }
        
        $pdf = Pdf::loadView('incidencias-terminales.pdf', ['incidencias_terminales' => $incidencias_terminales])->setPaper('a4', 'landscape');
        return $pdf->download('incidencias-terminales.pdf');
        //return $pdf->stream(); 
    }
}
