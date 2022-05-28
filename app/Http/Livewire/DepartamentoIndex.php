<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use Livewire\Component;

use Livewire\WithPagination;

class DepartamentoIndex extends Component
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

        $departamentos = Departamento::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('cod', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(6);

        $_SESSION['search']=$this->search;
        return view('livewire.departamento-index', compact('departamentos'));
    }
}
