<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\T02m11_sourcescontact;
use App\T02m12_statuscontact;
use App\T02m13_resultscontact;

class T02_contact extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'subject', 'date', 'flag_prog','id_way','id_source','id_status', 'id_result','duration_hr','duration_seg','time_ini', 'time_fin','id_lead','desc_contact',  'action', 'id_user',
    ];

    public function showWayName()
    {
    	if ($this->id_way=='1')
        	$way = 'Entrante';
        else {
        	$way = 'Saliente';
        }
        return $way;
    }

    public function showSourceName()
    {
        $source = T02m11_sourcescontact::findOrFail($this->id_source)->name;
        return $source;
    }

    public function showStatusName()
    {
        $status = T02m12_statuscontact::findOrFail($this->id_status)->name;
        return $status;
    }

    public function showResultName()
    {
        $result = T02m13_resultscontact::findOrFail($this->id_result)->name;
        return $result;
    }

    public function showLeadName()
    {
        $lead = T01_lead::findOrFail($this->id_lead);
        $name = $lead->name_lead." ".$lead->lastname_lead;
        return $name;
    }

    function countContacts(){

      $name_bd = session('name_bd');
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
        $this->setConnection('bdcnxtemp');
        $cuenta = $this->all()->count();
        return $cuenta;
    }//function

  }