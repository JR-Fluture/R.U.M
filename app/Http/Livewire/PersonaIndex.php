<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class PersonaIndex extends Component
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

        $personas = Persona::whereIn('departamento_id', function ($query) {
                $query->select('id')->from('departamentos')
                    ->where('name', 'LIKE', '%' . $this->search . '%');
            })
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
//            ->latest($condicional)
            ->paginate(6);
        
        //Departamento::where('name','LIKE','%'.$this->search.'%')

        $_SESSION['search']=$this->search;
        
        return view('livewire.persona-index', compact('personas'));
    }
}
