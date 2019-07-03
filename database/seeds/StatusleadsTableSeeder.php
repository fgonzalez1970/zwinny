<?php

use Illuminate\Database\Seeder;
use App\Statuslead;

class StatusleadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	 //Agregamos los status de los prospectos
        Statuslead::create([
        		'name'=> 'Cargado',
                'description'=> 'Cargado en BD',
        ]);
        Statuslead::create([
        		'name'=> 'Contactado',
                'description'=> 'En negociación',
        ]);
        Statuslead::create([
        		'name'=> 'Cooptado',
                'description'=> 'Pasó a cliente',
        ]);
        Statuslead::create([
        		'name'=> 'Abandonado',
                'description'=> 'Se desistió de contactarlo',
        ]);
    }
}
