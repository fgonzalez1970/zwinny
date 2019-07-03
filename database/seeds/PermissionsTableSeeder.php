<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);
        //Tenants
        Permission::create([
            'name'          => 'Navegar inquilinos',
            'slug'          => 'tenants.index',
            'description'   => 'Lista y navega todos los inquilinos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de un inquilino',
            'slug'          => 'tenants.show',
            'description'   => 'Ve en detalle cada inquilino del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de inquilinos',
            'slug'          => 'tenants.create',
            'description'   => 'Podría crear nuevos inquilinos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de inquilinos',
            'slug'          => 'tenants.edit',
            'description'   => 'Podría editar cualquier dato de un inquilino del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar inquilino',
            'slug'          => 'tenants.destroy',
            'description'   => 'Podría eliminar cualquier inquilino del sistema',      
        ]);
        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ]);
        //Prospectos
        Permission::create([
            'name'          => 'Navegar prospectos',
            'slug'          => 'leads.index',
            'description'   => 'Lista y navega todos los prospectos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de un prospecto',
            'slug'          => 'leads.show',
            'description'   => 'Ve en detalle cada prospecto del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de prospectos',
            'slug'          => 'leads.create',
            'description'   => 'Podría crear nuevos prospectos en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de prospectos',
            'slug'          => 'leads.edit',
            'description'   => 'Podría editar cualquier dato de un prospecto del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar prospectos',
            'slug'          => 'leads.destroy',
            'description'   => 'Podría eliminar cualquier prospecto del sistema',      
        ]);
    }
}
