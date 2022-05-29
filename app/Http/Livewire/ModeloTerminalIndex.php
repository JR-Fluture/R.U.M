<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\ModelosTerminales;
use App\Models\Sim;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class ModeloTerminalIndex extends Component
{
    use WithPagination;

    //protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $condicional=$_SESSION["condicional"];
        $orden=$_SESSION["orden"];

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
        ->paginate(6);
        
        //$modelos_terminales = ModelosTerminales::paginate(6);
        $_SESSION['search']=$this->search;
        
        return view('livewire.modelo-terminal-index', compact('modelos_terminales'));
    }
}
