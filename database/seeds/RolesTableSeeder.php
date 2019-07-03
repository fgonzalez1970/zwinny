<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Agregamos los permisos por defecto
        Role::create([
        		'name'=> 'Admin Zwinny',
        		'slug'=> 'slug',
                'description'=> 'Administrador Global Zwinny',
                'special' => 'all-access',
        ]);
         Role::create([
        		'name'=> 'Admin Gral',
        		'slug'=> 'slug2',
                'description'=> 'Administrador General',
        ]);

        //agregamos permisos reducidos al role 2
        DB::table('permission_role')->insert([
                'permission_id'=> '15',
                'role_id'=> '2',
        ]);
        DB::table('permission_role')->insert([
                'permission_id'=> '16',
                'role_id'=> '2',
        ]);
         DB::table('permission_role')->insert([
                'permission_id'=> '17',
                'role_id'=> '2',
        ]);
          DB::table('permission_role')->insert([
                'permission_id'=> '18',
                'role_id'=> '2',
        ]);
           
        //agregamos el rol 1 al usuario 1
        DB::table('role_user')->insert([
                'role_id'=> '1',
                'user_id'=> '1',
        ]);
    }
}
