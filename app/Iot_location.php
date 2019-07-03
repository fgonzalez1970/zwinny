<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Iot_location extends Model
{
    protected $fillable = [
        'description','address','coordinates','radius','date_up','date_down','created_at','updated_at',
    ];
    //

    
    public function getDescById($id_loc)
	{
		$name_bd = session('name_bd');
        //dd($name_bd);
        $host = getenv('HOST_DB');
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => $host,
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
		$loc = Iot_location::findOrFail($id_loc);
    	return $loc->description;
	}
}
