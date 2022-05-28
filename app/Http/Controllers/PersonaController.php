<?php
namespace App\Http\Controllers;
session_start();

use App\Http\Livewire\PersonaIndex;
use App\Models\Departamento;
use App\Models\Persona;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:personas.index')->only('index');
        $this->middleware('can:personas.show')->only('show');
        $this->middleware('can:personas.create')->only('create','store');
        $this->middleware('can:personas.edit')->only('edit','update');
        $this->middleware('can:personas.destroy')->only('destroy');
        $this->middleware('can:personas.pdf')->only('pdf');
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
        
        return view('personas.index');
    }

    public function create()
    {
        $dpts=Departamento::get()->pluck('name','id');
        
        return view('personas.create',compact('dpts'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dni' => "required|unique:personas",
            'email' => 'required'
        ]);

        $persona=Persona::create($request->all());
        return redirect()->route('personas.index')->with('info',__('The person was saved successfully'));
    }
    
    public function show(Persona $persona)
    {
        $dpts2=Persona::where('departamento_id', $persona->departamento_id)
        ->where('id', '!=', $persona->id)
        ->get();
        $dpts=Departamento::get()->pluck('name','id');
        return view('personas.show',compact('persona','dpts','dpts2'));
    }
    
    public function edit(Persona $persona)
    {
        $dpts=Departamento::get()->pluck('name','id');
        return view('personas.edit',compact('persona','dpts'));
    }
    
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'name' => 'required',
            'dni' => "required|unique:personas,dni,$persona->id",
            'email' => 'required'
        ]);
        $persona->update($request->all());
        return redirect()->route('personas.index')->with('info',__('The person was successfully updated'));
    }
    
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index')->with('info',__('The person has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $personas = Persona::whereIn('departamento_id', function ($query) {
                $query->select('id')->from('departamentos')
                    ->where('name', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];
            $personas = Persona::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('personas.pdf', ['personas' => $personas])->setPaper('a4', 'landscape');
        return $pdf->download('personas.pdf');
        //return $pdf->stream(); 
    }
}
