<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\ModelosTerminales;
use App\Models\Sim;
use App\Models\Persona;
use App\Models\Terminales;
use Livewire\Component;
use Livewire\WithPagination;

class TerminalIndex extends Component
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
        ->paginate(6);

        $_SESSION['search']=$this->search;
        
        return view('livewire.terminal-index', compact('terminales'));
    }
}
