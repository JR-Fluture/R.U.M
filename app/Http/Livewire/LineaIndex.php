<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\Linea;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class LineaIndex extends Component
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

        $lineas = Linea::whereIn('tipo_linea_id', function ($query) {
                $query->select('id')->from('tipos_lineas')
                    ->where('tipo_linea', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('numero_movil', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_interno', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_fijo', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(6);
        
        $_SESSION['search']=$this->search;
        
        return view('livewire.linea-index', compact('lineas'));
    }
}
