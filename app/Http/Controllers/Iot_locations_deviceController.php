<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iot_locations_device;
use App\Iot_location;
use App\Iot_dispositivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class Iot_locations_deviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $locs_devs = new Iot_locations_device;
        $locs_devs->setConnection('bdcnxtemp');

        //recuperamos las relaciones devices/locations
        $locs_devs = Iot_locations_device::paginate();
        //traemos los count por status
        $counts[0] = count($locs_devs);
        //activos
        $hoy = date('Y-m-d');
        $counts[1] = Iot_locations_device::where('date_down','>=', $hoy)->count();
        //inactivos
        $counts[2] = Iot_locations_device::where('date_down','<', $hoy)->count();
        return view('locs_devs.index', compact('locs_devs', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recuperamos el id del tenant según usuario logueado
        $user = Auth::user();
        //dd($user->id_tenant);
        //traemos los devices asignados al id tenant del usuario
        $hoy=date('Y-m-d');
        //buscar los devices para este tenant
        $devices_ten = Iot_dispositivo::join('iot_dispositivos_tenants','iot_dispositivos.id','=','iot_dispositivos_tenants.id_dispositivo')->where('iot_dispositivos_tenants.id_tenant','=',$user->tenant_id)->where('iot_dispositivos_tenants.date_down','>',$hoy)->orderBy('name')->get();
        //dd($devices_ten);
        //buscar las localidades disponibles
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
        
        $locations = Iot_location::where('date_down','=',NULL)->orWhere('date_down','>',$hoy)->orderBy('description')->get();
        
        return view('locs_devs.create', compact('devices_ten','locations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
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
        $loc_dev = Iot_locations_device::create($data);
        
        return redirect()->route('locs_devs.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showLocDev($id)
    {
        //revisamos si el dispositivo ya está o no asignado a una localidad
        $device = Iot_device::findOrFail($id);
        $loc_dev = Iot_locations_device::where('id_device',$id)->get();
        //dependiendo si tiene 

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
        $loc_dev = Iot_locations_device::findOrFail($id);
        $loc_dev->delete();
        return redirect()->route('locs_devs.index')->with('success','Registro eliminado satisfactoriamente');   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDevLoc($id_loc)
    {
        $user = Auth::user();
        DB::setDefaultConnection('mysql');
        $hoy=date('Y-m-d');
        //buscar los devices para este tenant
        $devices_ten = Iot_dispositivo::join('iot_dispositivos_tenants','iot_dispositivos.id','=','iot_dispositivos_tenants.id_dispositivo')->where('iot_dispositivos_tenants.id_tenant','=',$user->tenant_id)->where('iot_dispositivos_tenants.date_down','>',$hoy)->orderBy('name')->get();

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
        $locs_devs = new Iot_locations_device;
        $locs_devs->setConnection('bdcnxtemp');

        //recuperamos las relaciones devices/locations para la localidad id_loc
        $locs_devs = Iot_locations_device::where('id_location',$id_loc)->orderBy('date_up')->get();
        //recuperamos la localidad en cuestion
        $location =  Iot_location::findOrFail($id_loc);
        //recuperamos las devices aun sin asignar localidad
        //recuperamos el id del tenant según usuario logueado
       
        

        return view('locs_devs.devloc', compact('locs_devs','devices_ten','location'));
    }
    /**
     * .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hasValidAssigned($id_device)
    {

        $hoy = date('Y-m-d');
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
        
        $list_dev = Iot_locations_device::where('id_device',$id_device)->where('date_down','>=',$hoy)->get();
        if (count($list_dev)>0){
            return true;
        } else{
            return false;
        }
    }

}
