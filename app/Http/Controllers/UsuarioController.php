<?php

namespace App\Http\Controllers;
session_start();

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:usuarios.index')->only('index');
        $this->middleware('can:usuarios.show')->only('show');
        $this->middleware('can:usuarios.create')->only('create','store');
        $this->middleware('can:usuarios.edit')->only('edit','update');
        $this->middleware('can:usuarios.destroy')->only('destroy');
        $this->middleware('can:usuarios.pdf')->only('pdf');
    }
    public $search;
    public function index()
    {
        if (isset($_GET["condicional"])) {
            if (isset($_SESSION["condicional"])) {
                if ($_SESSION["condicional"]!=$_GET["condicional"]) {
                    $_GET["orden"]='DESC';
                }
            }
            $_SESSION["condicional"]=$_GET["condicional"];
        }else{
            $_SESSION["condicional"]='id';
        }

        if (isset($_GET["orden"])) {
            if ($_GET["orden"]=='ASC') {
                $_SESSION["orden"]='DESC';
            }else{
                $_SESSION["orden"]='ASC';
            }
        }else{
            $_SESSION["orden"]='ASC';
        }
        
        return view('usuarios.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create',compact('roles'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password(8), 'confirmed'],
        ]);
        
        $usuario=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'email_verified_at' => now(),
        ]);
        $usuario->roles()->sync(2);
        
        return redirect()->route('usuarios.index')->with('info',__('The pc use was saved successfully'));
    }

    public function show(User $usuario)
    {
        return view('usuarios.show',compact('usuario'));
    }

    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('usuarios.edit',compact('usuario','roles'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => "required",
        ]);
        
        if ($request['password']!='') {
            $request['password']=bcrypt($request->password);
        }else{
            $request['password']=$usuario->password;
        }

        $usuario->update($request->all());
        $usuario->roles()->sync($request->roles);
        return redirect()->route('usuarios.index')->with('info',__('The user was successfully updated'));
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('info',__('The user has been successfully deleted'));
    }

    public function pdf()
    {
        if (isset($_SESSION['search'])) {
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $this->search=$_SESSION['search'];

            $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orderBy($condicional, $orden)
            ->get();
        }else{
            $condicional=$_SESSION["condicional"];
            $orden=$_SESSION["orden"];
            $usuarios = User::orderBy($condicional, $orden)
            ->get();
        }
        
        $pdf = Pdf::loadView('usuarios.pdf', ['usuarios' => $usuarios])->setPaper('a4', 'landscape');
        return $pdf->download('usuarios.pdf');
        //return $pdf->stream(); 
    }
}
