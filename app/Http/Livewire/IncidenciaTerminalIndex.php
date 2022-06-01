<?php

namespace App\Http\Livewire;

use App\Models\IncidenciasPc;
use App\Models\IncidenciasTerminales;
use Livewire\Component;
use Livewire\WithPagination;

class IncidenciaTerminalIndex extends Component
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

        $incidencias_terminales = IncidenciasTerminales::where('asunto', 'LIKE', '%' . $this->search . '%')
            ->orWhere('comentarios', 'LIKE', '%' . $this->search . '%')
            ->orWhere('conclusion', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(3);

        $_SESSION['search']=$this->search;
        
        return view('livewire.incidencia-terminal-index', compact('incidencias_terminales'));
    }
}
