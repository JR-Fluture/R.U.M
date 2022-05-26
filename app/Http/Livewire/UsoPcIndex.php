<?php

namespace App\Http\Livewire;

use App\Models\Monitores;
use App\Models\Pc;
use App\Models\Persona;
use App\Models\UsosPc;
use Livewire\Component;
use Livewire\WithPagination;

class UsoPcIndex extends Component
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

        $usopcs = UsosPc::whereIn('persona_id', function ($query) {
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
            $subquery->whereIn('pc_id', function ($query) {
               $query->select('id')->from('pcs')
                   ->orWhere('microprocesador', 'LIKE', '%' . $this->search . '%')
                   ->orWhere('placa_base', 'LIKE', '%' . $this->search . '%')
                   ->orWhere('sistema_operativo', 'LIKE', '%' . $this->search . '%');
           });
        })
        ->orWhere(function($subquery){
            $subquery->whereIn('monitor_id', function ($query) {
                $query->select('id')->from('monitores')
                    ->where('marca', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%');
            });
        })
        ->orderBy($condicional, $orden)
        ->paginate(6);

        $_SESSION['search']=$this->search;

        return view('livewire.uso-pc-index', compact('usopcs'));
    }
}
