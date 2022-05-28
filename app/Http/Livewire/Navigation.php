<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $menu=array(
            [
                'rol'=>'pc',
                'name'=>'PC',
                'array'=>array(
                    [
                        'rol'=>'incidencias-pcs.index',
                        'ruta'=>route('incidencias-pcs.index'),
                        'name'=>'Incidents'
                    ],
                    [
                        'rol'=>'usopcs.index',
                        'ruta'=>route('usopcs.index'),
                        'name'=>'PC use'
                    ],
                    [
                        'rol'=>'pcs.index',
                        'ruta'=>route('pcs.index'),
                        'name'=>'PC'
                    ],
                    [
                        'rol'=>'monitores.index',
                        'ruta'=>route('monitores.index'),
                        'name'=>'Monitors'
                    ],
                    [
                        'rol'=>'impresoras.index',
                        'ruta'=>route('impresoras.index'),
                        'name'=>'Printers'
                    ]
                )
            ],
            [
                'rol'=>'movil',
                'name'=>'Mobile',
                'array'=>array(
                    [
                        'rol'=>'movil',
                        'ruta'=>route('home'),
                        'name'=>'Incidents'
                    ],
                    [
                        'rol'=>'movil',
                        'ruta'=>route('home'),
                        'name'=>'Terminal use'
                    ],
                    [
                        'rol'=>'movil',
                        'ruta'=>route('home'),
                        'name'=>'Terminals'
                    ],
                    [
                        'rol'=>'movil',
                        'ruta'=>route('home'),
                        'name'=>'Terminal models'
                    ],
                    [
                        'rol'=>'movil',
                        'ruta'=>route('home'),
                        'name'=>'SIM'
                    ],
                    [
                        'rol'=>'movil',
                        'ruta'=>route('home'),
                        'name'=>'Line'
                    ]
                )
            ],
            [
                'rol'=>'personas.index',
                'ruta'=>route('personas.index'),
                'name'=>'Person'
            ],
            [
                'rol'=>'dashboard',
                'ruta'=>route('panel'),
                'name'=>'Dashboard',
                /* 'array'=>array(
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Usuarios'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Departamentos'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Formato SIM'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Tipos de SIM'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Tipos de linea'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Marcas de terminal'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Tipos de terminal'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Tipos de cargador'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Contratos'
                    ],
                    [
                        'rol'=>'dashboard',
                        'ruta'=>route('home'),
                        'name'=>'Proveedores'
                    ],
                ) */
            ],
        );
        /* 
        foreach ($menu as $value) {
            print($value['name']."->");
            if (isset($value['array'])) {
                foreach ($value['array'] as $x) {

                    print("Name:".$x['name']."-URL:".$x['ruta']."/");
                }
            }else{
                print("Name:".$value['name']."-URL:".$value['ruta']."/");
            }
            print("</br>");
        } 
        */
        return view('livewire.navigation',compact('menu'));
    }
}
