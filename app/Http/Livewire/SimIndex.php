<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\Sim;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class SimIndex extends Component
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

        $sims = Sim::whereIn('linea_id', function ($query) {
                $query->select('id')->from('lineas')
                    ->where('numero_movil', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('numero_interno', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('numero_fijo', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('numero_sim', 'LIKE', '%' . $this->search . '%')
            ->orWhere('pin', 'LIKE', '%' . $this->search . '%')
            ->orWhere('puk', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(6);
        
        $_SESSION['search']=$this->search;
        
        return view('livewire.sim-index', compact('sims'));
    }
}
