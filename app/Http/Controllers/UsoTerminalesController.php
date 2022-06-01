<?php
namespace App\Http\Controllers;
session_start();

use App\Http\Livewire\PersonaIndex;
use App\Models\Departamento;
use App\Models\Sim;
use App\Models\Persona;
use App\Models\Terminales;
use App\Models\UsosTerminales;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\Console\Terminal;

class UsoTerminalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:usos-terminales.index')->only('index');
        $this->middleware('can:usos-terminales.show')->only('show');
        $this->middleware('can:usos-terminales.create')->only('create','store');
        $this->middleware('can:usos-terminales.edit')->only('edit','update');
        $this->middleware('can:usos-terminales.destroy')->only('destroy');
        $this->middleware('can:usos-terminales.pdf')->only('pdf');
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
        
        return view('usos-terminales.index');
    }

    public function create()
    {
        $allPersonas=Persona::all();
        $personas=[''];
        foreach ($allPersonas as $persona) {
            array_push($personas, $persona->id.'.-'.$persona->name.' /-/ '.$persona->dni);
        }

        $allTerminales=Terminales::all();
        $terminales=[''];
        foreach ($allTerminales as $terminal) {
            array_push($terminales, $terminal->id.'.-'.$terminal->modelo_terminal->marca_terminal->name.' /-/ '.$terminal->modelo_terminal->modelo.' /-/ '.$terminal->imei_1);
        }
        $allSim=Sim::all();
        $sims=[''];
        foreach ($allSim as $sim) {
            array_push($sims, $sim->id.'.-'.$sim->numero_sim.' /-/ '.$sim->pin.' /-/ '.$sim->linea->numero_movil);
        }
        
        return view('usos-terminales.create',compact('personas','terminales','sims'));
    }
    
    public function store(Request $request)
    {
        $usos_terminale=UsosTerminales::create($request->all());
        return redirect()->route('usos-terminales.index')->with('info',__('The terminal use was saved successfully'));
    }
    
    public function show(UsosTerminales $usos_terminale)
    {
        $allPersonas=Persona::all();
        $personas=[''];
        foreach ($allPersonas as $persona) {
            array_push($personas, $persona->id.'.-'.$persona->name.' /-/ '.$persona->dni);
        }

        $allTerminales=Terminales::all();
        $terminales=[''];
        foreach ($allTerminales as $terminal) {
            array_push($terminales, $terminal->id.'.-'.$terminal->modelo_terminal->marca_terminal->name.' /-/ '.$terminal->modelo_terminal->modelo.' /-/ '.$terminal->imei_1);
        }
        $allSim=Sim::all();
        $sims=[''];
        foreach ($allSim as $sim) {
            array_push($sims, $sim->id.'.-'.$sim->numero_sim.' /-/ '.$sim->pin.' /-/ '.$sim->linea->numero_movil);
        }
        return view('usos-terminales.show',compact('usos_terminale','personas','terminales','sims'));
    }
    
    public function edit(UsosTerminales $usos_terminale)
    {
        $allPersonas=Persona::all();
        $personas=[''];
        foreach ($allPersonas as $persona) {
            array_push($personas, $persona->id.'.-'.$persona->name.' /-/ '.$persona->dni);
        }

        $allTerminales=Terminales::all();
        $terminales=[''];
        foreach ($allTerminales as $terminal) {
            array_push($terminales, $terminal->id.'.-'.$terminal->modelo_terminal->marca_terminal->name.' /-/ '.$terminal->modelo_terminal->modelo.' /-/ '.$terminal->imei_1);
        }
        $allSim=Sim::all();
        $sims=[''];
        
        foreach ($allSim as $sim) {
            array_push($sims, $sim->id.'.-'.$sim->numero_sim.' /-/ '.$sim->pin.' /-/ '.$sim->linea->numero_movil);
        }
        
        return view('usos-terminales.edit',compact('usos_terminale','personas','terminales','sims'));
    }
    
    public function update(Request $request, UsosTerminales $usos_terminale)
    {
        $usos_terminale->update($request->all());
        return redirect()->route('usos-terminales.index')->with('info',__('The terminal use was successfully updated'));
    }
    
    public function destroy(UsosTerminales $usos_terminale)
    {
        $usos_terminale->delete();
        return redirect()->route('usos-terminales.index')->with('info',__('The terminal use has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $usos_terminales = UsosTerminales::whereIn('persona_id', function ($query) {
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
                $subquery->whereIn('terminal_id', function ($query) {
                $query->select('id')->from('terminales')
                    ->whereIn('modelo_terminal_id', function ($query2) {
                        $query2->select('id')->from('modelos_terminales')
                            ->where('modelo', 'LIKE', '%' . $this->search . '%');
                    })    
                    ->orWhere('imei_1', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('imei_2', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%');
            });
            })
            ->orWhere(function($subquery){
                $subquery->whereIn('sim_id', function ($query) {
                    $query->select('id')->from('sims')
                        ->where('numero_sim', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('pin', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('puk', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];
            
            $usos_terminales = UsosTerminales::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('usos-terminales.pdf', ['usos_terminales' => $usos_terminales])->setPaper('a4', 'landscape');
        return $pdf->download('usos-terminales.pdf');
        //return $pdf->stream(); 
    }
}
