<?php

namespace App\Http\Livewire;

use App\Models\Impresora;
use Livewire\Component;
use Livewire\WithPagination;

class ImpresoraIndex extends Component
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

        $impresoras = Impresora::where('marca', 'LIKE', '%' . $this->search . '%')
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(6);

        $_SESSION['search']=$this->search;
        
        return view('livewire.impresora-index', compact('impresoras'));
    }
}
