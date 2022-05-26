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

        //JetStream
        Permission::create(['name' => 'register','description'=>'Register user'])->syncRoles([$role1]);

        //Menu
        Permission::create(['name' => 'personas','description'=>'shomw menu personas'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'movil','description'=>'shomw menu movil'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'pc','description'=>'shomw menu pc'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'dashboard','description'=>'shomw menu dashboard'])->syncRoles([$role1,$role2]);

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

        //Permission::create(['name' => 'admin.home','description'=>'Show dashboard'])->syncRoles([$role1,$role2]);//Dashboard
/*
        //Usuarios
        Permission::create(['name' => 'admin.users.index','description'=>'List from users'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description'=>'Edit user'])->syncRoles([$role1]);

        //Roles
        Permission::create(['name' => 'admin.roles.index','description'=>'List from roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create','description'=>'Create role'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit','description'=>'Edit role'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy','description'=>'Delete role'])->syncRoles([$role1]);

        //Categorias
        Permission::create(['name' => 'admin.categories.index','description'=>'List from categories'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.create','description'=>'Create category'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit','description'=>'Edit category'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy','description'=>'Delete category'])->syncRoles([$role1]);

        //Tags
        Permission::create(['name' => 'admin.tags.index','description'=>'List from tags'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.tags.create','description'=>'Create tag'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit','description'=>'Edit tag'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy','description'=>'Delete tag'])->syncRoles([$role1]);

        //Posts
        Permission::create(['name' => 'admin.posts.index','description'=>'List from posts'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.create','description'=>'Create post'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.edit','description'=>'Edit post'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.destroy','description'=>'Delete post'])->syncRoles([$role1,$role2]);
 */
        
    }
}
