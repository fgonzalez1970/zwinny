<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Iot_location;
use App\Iot_locations_device;

class Iot_locationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = new Iot_location;
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
        $location->setConnection('bdcnxtemp');
        $locations = Iot_location::paginate();
        //dd($leads);
        //traemos los count por status
        $counts[0] = count($locations);
        //asignados
        $hoy = date('Y-m-d');
        $counts[1] = Iot_locations_device::where('date_down','>', $hoy)->count();
        //$counts[1] = Iot_dispositivo::where('id_status', 1)->count();
        
        
        return view('locations.index', compact('locations', 'counts'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
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
       
        $name_bd = session('name_bd');
        $loc = new Iot_location;
        
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
        $loc->setConnection('bdcnxtemp');
        $loc = Iot_location::create($data);
        
        return redirect()->route('locations.index')->with('success','Registro creado satisfactoriamente');
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
        $name_bd = session('name_bd');
        //dd($lead->nombre_lead);
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
        $location = new Iot_location;
        $location->setConnection('bdcnxtemp');
        $location = Iot_location::findOrFail($id);
        return view('locations.edit', compact('location'));
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
        //$input = Input::all();
        //$validator = Validator::make(Input::all(), $this->rules);
       
        $name_bd = session('name_bd');
        $loc = new Iot_location;
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
        $loc->setConnection('bdcnxtemp');
        $loc = Iot_location::findOrFail($id)->update($data);
        
        return redirect()->route('locations.index')->with('success','Registro modificado satisfactoriamente');   
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
        $loc = new Iot_location;
        $loc->setConnection('bdcnxtemp');
        $loc = Iot_location::findOrFail($id);
        //$loc->delete();

        //verificamos si tiene dispositivos asignados vencidos o vigentes
        $disp_loc = Iot_locations_device::where('id_location', $id)->get();
        //$disp_tenants = $device->haveTenants()->get();
        //dd($disp_tenants);
        if (count($disp_loc)>0){
            //dd("tiene");
            return redirect()->route('locations.index')->with('error','La localidad tiene asignado al menos un dispostivo');
        } else {
            $loc->delete();
            return redirect()->route('locations.index')->with('success','Registro eliminado satisfactoriamente');
        }
    }

}
