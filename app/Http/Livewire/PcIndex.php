<?php

namespace App\Http\Livewire;

use App\Models\Pc;
use Livewire\Component;
use Livewire\WithPagination;

class PcIndex extends Component
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

        $pcs = Pc::where('microprocesador', 'LIKE', '%' . $this->search . '%')
            ->orWhere('placa_base', 'LIKE', '%' . $this->search . '%')
            ->orWhere('sistema_operativo', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(6);

        $_SESSION['search']=$this->search;
        return view('livewire.pc-index', compact('pcs'));
    }
}
