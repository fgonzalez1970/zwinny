<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Iot_dispositivos_tenant;
use App\Iot_dispositivo;
use App\Iot_tipo_dispositivo;
use App\Iot_subtipo_dispositivo;
use App\Iot_locations_device;
use App\User;
use App\Tenant;

class Iot_dispositivos_tenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices_ten = Iot_dispositivos_tenant::paginate();
        //dd($leads);
        //traemos los count por status
        //$counts[0] = count($devices);
        $counts[0] = count($devices_ten);
        //asignados activos
        $hoy = date('Y-m-d');
        $counts[1] = Iot_dispositivos_tenant::where('date_down','>', $hoy)->count();
        //asignados inactivos
        $hoy = date('Y-m-d');
        $counts[2] = Iot_dispositivos_tenant::where('date_down','<', $hoy)->count();
        //$counts[1] = Iot_dispositivo::where('id_status', 1)->count();
        
        
        return view('assignements.index', compact('devices_ten', 'counts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTenant()
    {
        //recuperamos el id del tenant según usuario logueado
        $user = Auth::user();
        //dd($user->id_tenant);
        //traemos los devices asignados al id tenant del usuario
        $devices_ten = Iot_dispositivos_tenant::where('id_tenant',$user->tenant_id)->paginate();
        //dd($devices_ten);
        //traemos los count por status
        //$counts[0] = count($devices);
        $counts[0] = count($devices_ten);
        //asignados activos
        $hoy = date('Y-m-d');
        //dd($hoy);
        $counts[1] = Iot_dispositivos_tenant::where('id_tenant',$user->tenant_id)->where('date_down','>', $hoy)->count();
        //asignados inactivos
        
        $counts[2] = Iot_dispositivos_tenant::where('id_tenant',$user->tenant_id)->where('date_down','<', $hoy)->count();
        //colocados en localidad
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
        $counts[3] = Iot_locations_device::where('date_down','>',$hoy)->count();
        //$counts[1] = Iot_dispositivo::where('id_status', 1)->count();
        
        
        return view('assignements.indexTenant', compact('devices_ten', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //buscar los tipos de dispositivos
        $listTypes = Iot_tipo_dispositivo::all();
        //buscar los inquilinos
        $tenants = Tenant::all();
        return view('assignements.create', compact('listTypes','tenants'));
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
        //$input = Input::all();
        //$validator = Validator::make(Input::all(), $this->rules);
       
        $dispo_ten = Iot_dispositivos_tenant::create($data);
        
        return redirect()->route('assignements.index')->with('success','Registro creado satisfactoriamente');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscamos el assignement a editar
        $assign = Iot_dispositivos_tenant::findOrFail($id);
        //buscamos el device asignado
        $device = Iot_dispositivo::findOrFail($assign->id_dispositivo);
        //buscamos los tipos de disp
        $listTypes = Iot_tipo_dispositivo::all();
        //buscamos los subtipos de disp segun el id
        $listSubtypes = Iot_subtipo_dispositivo::where('id_tipo','=',$device->id_tipo)
        ->orderBy('name', 'asc')
               ->get();
        //buscamos los devices según el subtipo
        $listDevices = Iot_dispositivo::where('id_subtipo','=',$device->id_subtipo)
        ->orderBy('name', 'asc')
               ->get();
        //buscar los inquilinos
        $tenants = Tenant::all();
        return view('assignements.edit', compact('assign', 'device', 'listTypes', 'listSubtypes', 'listDevices', 'tenants'));
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
        $data = $request->all();
        
        
        //buscamos la asignación a editar
        $assign = Iot_dispositivos_tenant::findOrFail($id)->update($data);
        
        return redirect()->route('assignements.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign = Iot_dispositivos_tenant::findOrFail($id);
        //OJOOOO VALIDAR SI ESTÁ ASIGNADO A UNA LOCALIDAD?
        $assign->delete();
        return redirect()->route('assignements.index')->with('success','Registro eliminado satisfactoriamente');   
    }

    public function showDeviceName($id)
    {
        $device = Iot_dispositivo::findOrFail($id)->name;
        return $device;
    }

    public function showTenantName($id)
    {
        $tenant = Tenant::findOrFail($id)->name;
        return $tenant;
    }
}
