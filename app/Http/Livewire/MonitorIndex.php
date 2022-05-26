<?php

namespace App\Http\Livewire;

use App\Models\Monitores;
use Livewire\Component;

use Livewire\WithPagination;

class MonitorIndex extends Component
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

        $monitores = Monitores::where('marca', 'LIKE', '%' . $this->search . '%')
            ->orWhere('modelo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('numero_serie', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(6);

        $_SESSION['search']=$this->search;
        return view('livewire.monitor-index', compact('monitores'));
    }
}
