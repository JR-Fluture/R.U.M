<?php

namespace App\Http\Livewire;

use App\Models\Monitores;
use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsuarioIndex extends Component
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

        $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->paginate(6);

        $_SESSION['search']=$this->search;
        return view('livewire.usuario-index', compact('usuarios'));
    }
}
