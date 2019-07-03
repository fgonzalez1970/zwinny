<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class T01_lead extends Model
{
    //
    protected $fillable = [
        'id_cond_pay','id_entity','id_employee','id_branch','code_lead','name_lead', 'lastname_lead', 'email_lead','birthdate_lead','company','rfc','contact_lead','phone_fix','phone_mobile','address_txt','obs_lead','id_status','id_source','flag_owner', 'country', 'state', 'city', 'facebook', 'twitter', 'instagram', 'skype',
    ];

    /**
     * Sincroniza los usuarios a los que se les asignó el prospecto en el objeto.
     *
     * @return True si correcto, false si problema
     */
    function syncLeadsToUssers($array_users){

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
      	//primero borramos todas las relaciones existentes para el id lead
      	DB::statement('DELETE FROM `leads_users` WHERE id_lead='.$this->id);
      	//ahora creamos los registros con los usuarios venidos en el array
      	for ($i=0;$i<count($array_users);$i++){
      		try{
      			DB::statement("INSERT INTO leads_users (id_lead, id_user) VALUES (".$this->id.", ".$array_users[$i].")");
      		}catch (Exception $e) {
      			//debería borrar todo si no pudo asignarlos
      			DB::statement('DELETE FROM `leads_users` WHERE id_lead='.$this->id);
        		return false;
    		}
      	}//for
      	return true;
    }//function

    function deleteLeadsToUssers(){

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
      	//borramos todas las relaciones existentes para el id lead
      	DB::statement('DELETE FROM `leads_users` WHERE id_lead='.$this->id);
    }//function

    public function showBranchName()
    {
        $branche = T01m01_brancheslead::findOrFail($this->id_branch)->name;
        return $branche;
    }

    public function showSourceName()
    {
        $source = T01m02_sourceslead::findOrFail($this->id_source)->name;
        return $source;
    }

    public function showStatusName()
    {
        $status = T01m10_statuslead::findOrFail($this->id_status)->name;
        return $status;
    }
    public function isUserOwner($idUser)
    {
        try{
      			//$result = DB::statement("select count(id) from leads_users where id_lead=".$this->id." AND id_user=".$idUser);
      			//dd($result);
      			$res = DB::select('select count(id) as total from leads_users where id_user = :id and id_lead = :id2', ['id' => $idUser, 'id2' => $this->id]);
      			if($res[0]->total>0)
      				return true;
      			else
      				return false;
      		}catch (Exception $e) {
        		return false;
    		}
    }

    function countLeads(){

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
    
}//class
