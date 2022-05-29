<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        //Menu
        Permission::create(['name' => 'personas','description'=>'show menu personas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'movil','description'=>'show menu movil'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'pc','description'=>'show menu pc'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'dashboard','description'=>'show menu dashboard'])->syncRoles([$role1,$role2]);

        //JetStream
        Permission::create(['name' => 'register','description'=>'Register user'])->syncRoles([$role1]);

        //Usuarios
        Permission::create(['name' => 'usuarios.index','description'=>'List from users'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.create','description'=>'Create user'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.edit','description'=>'Edit user'])->syncRoles([$role1]);
        //Permission::create(['name' => 'usuarios.show','description'=>'Show user'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.destroy','description'=>'Delete user'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.pdf','description'=>'Download PDF users'])->syncRoles([$role1]);

        //Roles
        Permission::create(['name' => 'roles.index','description'=>'List from roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create','description'=>'Create role'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit','description'=>'Edit role'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy','description'=>'Delete role'])->syncRoles([$role1]);

        //ModelosTerminales
        Permission::create(['name' => 'modelos-terminales.index','description'=>'List from model terminals'])->syncRoles([$role1]);
        Permission::create(['name' => 'modelos-terminales.create','description'=>'Create model terminal'])->syncRoles([$role1]);
        Permission::create(['name' => 'modelos-terminales.edit','description'=>'Edit model terminal'])->syncRoles([$role1]);
        Permission::create(['name' => 'modelos-terminales.show','description'=>'Show model terminal'])->syncRoles([$role1]);
        Permission::create(['name' => 'modelos-terminales.destroy','description'=>'Delete model terminal'])->syncRoles([$role1]);
        Permission::create(['name' => 'modelos-terminales.pdf','description'=>'Download PDF model terminals'])->syncRoles([$role1]);

        //SIMS
        Permission::create(['name' => 'sims.index','description'=>'List from sims'])->syncRoles([$role1]);
        Permission::create(['name' => 'sims.create','description'=>'Create sim'])->syncRoles([$role1]);
        Permission::create(['name' => 'sims.edit','description'=>'Edit sim'])->syncRoles([$role1]);
        Permission::create(['name' => 'sims.show','description'=>'Show sim'])->syncRoles([$role1]);
        Permission::create(['name' => 'sims.destroy','description'=>'Delete sim'])->syncRoles([$role1]);
        Permission::create(['name' => 'sims.pdf','description'=>'Download PDF sims'])->syncRoles([$role1]);

        //Lineas
        Permission::create(['name' => 'lineas.index','description'=>'List from lines'])->syncRoles([$role1]);
        Permission::create(['name' => 'lineas.create','description'=>'Create line'])->syncRoles([$role1]);
        Permission::create(['name' => 'lineas.edit','description'=>'Edit line'])->syncRoles([$role1]);
        Permission::create(['name' => 'lineas.show','description'=>'Show line'])->syncRoles([$role1]);
        Permission::create(['name' => 'lineas.destroy','description'=>'Delete line'])->syncRoles([$role1]);
        Permission::create(['name' => 'lineas.pdf','description'=>'Download PDF lines'])->syncRoles([$role1]);

        //Contratos
        Permission::create(['name' => 'contratos.index','description'=>'List from contracts'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'contratos.create','description'=>'Create contract'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'contratos.edit','description'=>'Edit contract'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'contratos.show','description'=>'Show contract'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'contratos.destroy','description'=>'Delete contract'])->syncRoles([$role1,$role2]);

        //Proveedores
        Permission::create(['name' => 'proveedores.index','description'=>'List from suppliers'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'proveedores.create','description'=>'Create supplier'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'proveedores.edit','description'=>'Edit supplier'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'proveedores.show','description'=>'Show supplier'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'proveedores.destroy','description'=>'Delete supplier'])->syncRoles([$role1,$role2]);

        //TiposCargadores
        Permission::create(['name' => 'tipos-cargadores.index','description'=>'List from type chargers'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-cargadores.create','description'=>'Create type charger'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-cargadores.edit','description'=>'Edit type charger'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-cargadores.destroy','description'=>'Delete type charger'])->syncRoles([$role1,$role2]);

        //TiposTerminales
        Permission::create(['name' => 'tipos-terminales.index','description'=>'List from type terminals'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-terminales.create','description'=>'Create type terminal'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-terminales.edit','description'=>'Edit type terminal'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-terminales.destroy','description'=>'Delete type terminal'])->syncRoles([$role1,$role2]);

        //MarcasTerminales
        Permission::create(['name' => 'marcas-terminales.index','description'=>'List from mark terminals'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'marcas-terminales.create','description'=>'Create mark terminal'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'marcas-terminales.edit','description'=>'Edit mark terminal'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'marcas-terminales.destroy','description'=>'Delete mark terminal'])->syncRoles([$role1,$role2]);

        //TiposLineas
        Permission::create(['name' => 'tipos-lineas.index','description'=>'List from type lines'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-lineas.create','description'=>'Create type line'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-lineas.edit','description'=>'Edit type line'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tipos-lineas.destroy','description'=>'Delete type line'])->syncRoles([$role1,$role2]);

        //FormatosSims
        Permission::create(['name' => 'formatos-sims.index','description'=>'List from format sims'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'formatos-sims.create','description'=>'Create format sim'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'formatos-sims.edit','description'=>'Edit format sim'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'formatos-sims.show','description'=>'Show format sim'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'formatos-sims.destroy','description'=>'Delete format sim'])->syncRoles([$role1,$role2]);
        
        //Departamentos
        Permission::create(['name' => 'departamentos.index','description'=>'List from departaments'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'departamentos.create','description'=>'Create departament'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'departamentos.edit','description'=>'Edit departament'])->syncRoles([$role1,$role2]);
        //Permission::create(['name' => 'departamentos.show','description'=>'Show departament'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'departamentos.destroy','description'=>'Delete departament'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'departamentos.pdf','description'=>'Download PDF departaments'])->syncRoles([$role1,$role2]);

        //IncidenciaPCs
        Permission::create(['name' => 'incidencias-pcs.index','description'=>'List from pc incidents'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'incidencias-pcs.create','description'=>'Create pc incident'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'incidencias-pcs.edit','description'=>'Edit pc incident'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'incidencias-pcs.show','description'=>'Show pc incident'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'incidencias-pcs.destroy','description'=>'Delete pc incident'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'incidencias-pcs.pdf','description'=>'Download PDF pc incidents'])->syncRoles([$role1,$role2]);

        //UsosPCs
        Permission::create(['name' => 'usopcs.index','description'=>'List from pcs use'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'usopcs.create','description'=>'Create pc use'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'usopcs.edit','description'=>'Edit pc use'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'usopcs.show','description'=>'Show pc use'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'usopcs.destroy','description'=>'Delete pc use'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'usopcs.pdf','description'=>'Download PDF pcs use'])->syncRoles([$role1,$role2]);

        //PCs
        Permission::create(['name' => 'pcs.index','description'=>'List from pcs'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'pcs.create','description'=>'Create pc'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'pcs.edit','description'=>'Edit pc'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'pcs.show','description'=>'Show pc'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'pcs.destroy','description'=>'Delete pc'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'pcs.pdf','description'=>'Download PDF pcs'])->syncRoles([$role1,$role2]);

        //Monitores
        Permission::create(['name' => 'monitores.index','description'=>'List from monitors'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'monitores.create','description'=>'Create monitor'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'monitores.edit','description'=>'Edit monitor'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'monitores.show','description'=>'Show monitor'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'monitores.destroy','description'=>'Delete monitor'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'monitores.pdf','description'=>'Download PDF monitors'])->syncRoles([$role1,$role2]);

        //Impresoras
        Permission::create(['name' => 'impresoras.index','description'=>'List from prints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'impresoras.create','description'=>'Create print'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'impresoras.edit','description'=>'Edit print'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'impresoras.show','description'=>'Show print'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'impresoras.destroy','description'=>'Delete print'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'impresoras.pdf','description'=>'Download PDF prints'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'impresoras.relacion','description'=>'Prints relation with person'])->syncRoles([$role1,$role2]);

        //Personas
        Permission::create(['name' => 'personas.index','description'=>'List from personas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'personas.create','description'=>'Create persona'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'personas.edit','description'=>'Edit persona'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'personas.show','description'=>'Show persona'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'personas.destroy','description'=>'Delete persona'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'personas.pdf','description'=>'Download PDF personas'])->syncRoles([$role1,$role2]);
        
    }
}
