<?php

use Illuminate\Database\Seeder;
use App\Statustenant;
class StatustenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Agregamos los status de los inquilinos
        Statustenant::create([
        		'name'=> 'Iniciado',
                'description'=> 'Iniciado en la plataforma. Período prueba',
        ]);
        Statustenant::create([
        		'name'=> 'Contrato',
                'description'=> 'Iniciado en la plataforma',
        ]);
        Statustenant::create([
        		'name'=> 'Suspendido',
                'description'=> 'Suspendido en la plataforma',
        ]);
    }
}
