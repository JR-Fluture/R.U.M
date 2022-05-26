<?php

namespace App\Http\Livewire;

use App\Models\IncidenciasPc;
use Livewire\Component;
use Livewire\WithPagination;

class IncidenciaPcIndex extends Component
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

        $incidencias_pcs = IncidenciasPc::where('asunto', 'LIKE', '%' . $this->search . '%')
            ->orWhere('comentarios', 'LIKE', '%' . $this->search . '%')
            ->orWhere('conclusion', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(3);

        $_SESSION['search']=$this->search;
        
        return view('livewire.incidencia-pc-index', compact('incidencias_pcs'));
    }
}
