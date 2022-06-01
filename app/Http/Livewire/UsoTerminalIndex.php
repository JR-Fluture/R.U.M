<?php

namespace App\Http\Livewire;

use App\Models\Monitores;
use App\Models\Pc;
use App\Models\Persona;
use App\Models\UsosPc;
use App\Models\UsosTerminales;
use Livewire\Component;
use Livewire\WithPagination;

class UsoTerminalIndex extends Component
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
        ->paginate(6);

        $_SESSION['search']=$this->search;

        return view('livewire.uso-terminal-index', compact('usos_terminales'));
    }
}
