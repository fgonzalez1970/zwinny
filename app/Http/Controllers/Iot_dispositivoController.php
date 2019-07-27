<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iot_dispositivo;
use App\Tenant;
use App\Iot_tipo_dispositivo;
use App\Iot_subtipo_dispositivo;
use App\Iot_dispositivos_tenant;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class Iot_dispositivoController extends Controller
{
    protected $rules =
    [
        'id_name' => 'bail|required|min:2|max:250',
        'id_tipo' => 'bail|required',
        'id_subtipo' => 'bail|required',
        'date_up' => 'nullable|date',
    ];

    protected $rulesImport =
    [
        'file_import' => 'bail|required',
        'id_source' => 'bail|required',
        'id_status' => 'bail|required',
        //'flag_owner' => 'bail|required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Iot_dispositivo::paginate();
        //traemos los count por status
        $counts[0] = count($devices);

        //asignados
        $hoy = date('Y-m-d');
        $counts[1] = Iot_dispositivos_tenant::where('date_down','>', $hoy)->count();
                
        return view('devices.index', compact('devices', 'counts'));
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
        return view('devices.create', compact('listTypes'));

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
       
        $dispo = Iot_dispositivo::create($data);
        $mess= trans('adminlte_lang::message.createOK'); 
        return redirect()->route('devices.index')->with('success',$mess);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //buscamos el dispositivo a editar
        $device = Iot_dispositivo::findOrFail($id);
        
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscamos el dispositivo a editar
        $device = Iot_dispositivo::findOrFail($id);
        //buscamos los tipos de disp
        $listTypes = Iot_tipo_dispositivo::all();
        //buscamos los subtipos de disp segun el id
        $listSubtypes = Iot_subtipo_dispositivo::where('id_tipo','=',$device->id_tipo)
        ->orderBy('name', 'asc')
               ->get();
        
        return view('devices.edit', compact('device', 'listTypes', 'listSubtypes'));
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
        
        
        //buscamos el dispositivo a editar
        $device = Iot_dispositivo::findOrFail($id)->update($data);
        $mess= trans('adminlte_lang::message.updateOK'); 
        return redirect()->route('devices.index')->with('success',$mess);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Iot_dispositivo::findOrFail($id);
        //verificamos si está vigente en algún inquilino
        $disp_tenants = Iot_dispositivos_tenant::where('id_dispositivo', $id)->get();
        //$disp_tenants = $device->haveTenants()->get();
        //dd($disp_tenants);
        if (count($disp_tenants)>0){
            //dd("tiene");
            $mess= trans('adminlte_lang::message.deleteDeviceNOK'); 
            return redirect()->route('devices.index')->with('error',$mess);
        } else {
            
            $device->delete();
            $mess= trans('adminlte_lang::message.deleteOK'); 
            return redirect()->route('devices.index')->with('success',$mess);
        }
        
    }

    /**
     * Display the specified resource: list of subtypes for an type
     *
     * @param  $id_type
     * @return \Illuminate\Http\Response
     */
    public function listSubtypes($id_type)
    {
        $listSubtypes = Iot_subtipo_dispositivo::where('id_tipo','=',$id_type)
        ->orderBy('name', 'asc')
               ->get();
        //dd($listResults);
        return response()->json($listSubtypes);
    }

    /**
     * Display the specified resource: list of devices for an subtype
     *
     * @param  $id_subtype
     * @return \Illuminate\Http\Response
     */
    public function listDevices($id_subtype)
    {
        $listDevices = Iot_dispositivo::where('id_subtipo','=',$id_subtype)
        ->orderBy('name', 'asc')
               ->get();
        //dd($listResults);
        return response()->json($listDevices);
    }

    /**
     * Display the specified resource: list of devices for an subtype that are not assigned
     *
     * @param  $id_subtype
     * @return \Illuminate\Http\Response
     */
    public function listDevicesNoAssign($id_subtype)
    {
        $hoy = date('Y-m-d');
        //$listDevices = DB::select('select Iot_dispositivos.* from Iot_dispositivos left join Iot_dispositivos_tenants ON Iot_dispositivos.id = Iot_dispositivos_tenants.id_tenant
        //where Iot_dispositivos_tenants.date_down<'.$hoy);
        $listDevices = DB::select("select iot_dispositivos.* from iot_dispositivos where id_subtipo='".$id_subtype."' and id not in (select id_dispositivo from iot_dispositivos_tenants where date_down>'".$hoy."')");
        //dd($listDevices);
        //$listDevices = Iot_dispositivo::where('id_subtipo','=',$id_subtype)
        //->orderBy('name', 'asc')
          //     ->get();
        //dd($listResults);
        return response()->json($listDevices);
    }

    public function showTypeName($id)
    {
        $type = Iot_tipo_dispositivo::findOrFail($id)->name;
        return $type;
    }

    public function showSubtypeName($id)
    {
        $subtype = Iot_subtipo_dispositivo::findOrFail($id)->name;
        return $subtype;
    }

    

    public function import(Request $request)
    {
        //import desde archivo excel
        $data = $request->all();
        $input = Input::all();
        $filename = $_FILES['file_import']['name'];
        $uploadedFile = '';
        $id_tipo = $_POST['id_tipo'];
        $id_subtipo = $_POST['id_subtipo'];      
        

        if(isset($_FILES['file_import']['name'])) {
            //return Response::json($filename);
            $arr_file = explode('.', $_FILES['file_import']['name']);
            $extension = end($arr_file);
            if('csv' == $extension) {
                $reader = new Csv();
            } else {
                $reader = new Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['file_import']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            //iniciamos transacción para ver que no ocurre ningún error en la insersión
            DB::beginTransaction();
            try {
                //recorremos las filas
                for ($i=1;$i<count($sheetData);$i++){
                //colocamos cada registro en un arreglo
                $dispo = [
                    'name' => $sheetData[$i][0],
                    'id_tipo' => $id_tipo,
                    'id_subtipo' => $id_subtipo,
                    'id_kontaktTag'    => $sheetData[$i][1],
                    'UUDD' => $sheetData[$i][2],
                    'date_up'   => $sheetData[$i][4],
                    'date_down' => $sheetData[$i][4],
                    ];

                    //insertamos el registro en la bd
                    $result = Iot_dispositivo::insert($dispo); 
                }//for
                
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                $error = $e->getMessage();
                DB::rollback();
                $mess=trans('adminlte_lang::message.importNOK').": ".$error;
                return Response::json(array('errors' => [$mess]));
            }

            if ($success) {
                $mess=trans('adminlte_lang::message.importOK');
                return response()->json(array('mnsj' => [$mess]));
            } 
            //print_r($sheetData);
        }//if file
        $mess= trans('adminlte_lang::message.updateOK'); 
        return redirect()->route('devices.index')->with('success',$mess);   
    }//function import

    public function importKontakt()
    {
        
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.kontakt.io',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $APIKEY = getenv('KKT_APIKEY');
        $response = $client->request('GET', '/device?access=SUPERVISOR& HTTP/1.1', [
'headers' => [
'Accept' => 'application/vnd.com.kontakt+json;version=10',
'Api-Key'=> $APIKEY,
'User-Agent' => 'Paw/3.1.4 (Macintosh; OS X/10.13.3) GCDHTTPRequest'

]]);
        $code = $response->getStatusCode();
        $body = json_decode($response->getBody()->getContents());
        $devices = $body->devices;
        //dd($devices);
    //simulo el arreglo de los devices, para seguir...
    /*$datos = array( 
        'devices' => array(  
            array('id' => "abcd",
                'uniqueId'  => "001",
                'alias'  => "aaaa",
                'deviceType' => 'BEACON',
                'model' => 'SMART_BEACON',
                'product' => 'Smart Beacon SB16-2'),
            array('id' => "efgh",
                'uniqueId'  => "002",
                'alias'  => "bbbb",
                'deviceType' => 'BEACON',
                'model' => 'SMART_BEACON',
                'product' => 'Smart Beacon SB16-2'),
        ),
        'searchMeta' => array(
                'count' => "2",
                'order'  => "ASC"
        )
    );*/
    $i=0;
    //iniciamos transacción en bd para hacer el import completo
    DB::beginTransaction();
    try {
    foreach ($devices as $device) {
        //$i++;
        $count = Iot_dispositivo::where('id_kontaktTag','=',$device->uniqueId)->count();
        //dd ($count);
        $today = date('Y-m-d H:i');
        $fecha = "2037-12-31 23:59:59";
        $nuevafecha = date("Y-m-d H:i",strtotime($fecha));
        
        if ($count==0){
            //dd('no existe');
            // Lo insertamos en la bd
            $id_tipo = ($device->deviceType=='BEACON')?1:2;
            $id_subtipo = ($device->model=='SMART_BEACON')?1:2;
            $dispo = [
                    'name' => $device->product,
                    'id_tipo' => $id_tipo,
                    'id_subtipo' => $id_subtipo,
                    'id_kontaktTag'    => $device->uniqueId,
                    'UUID' => $device->id,
                    'date_up' =>$today,
                    'date_down' =>$nuevafecha,
                    ];

                    //insertamos el registro en la bd
                    $result = Iot_dispositivo::insert($dispo); 
        }//if count
    }//foreach
    DB::commit();
    $success = true;
} catch (\Exception $e) {
    $success = false;
    $error= $e->getMessage();
    DB::rollback();
    $mess=trans('adminlte_lang::message.importKtkNOK').": ".$error;
    return redirect()->route('devices.index')->with('error',$mess);
}

    if ($success) {
        $mess=trans('adminlte_lang::message.importKtkOK');
        return redirect()->route('devices.index')->with('success',$mess);
    } 

    
}//function importKontakt

    public function importKontakt2()
    {
        $curl = curl_init();
        $url = 'https://api.kontakt.io/device?access=SUPERVISOR& HTTP/1.1';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Accept' => 'application/vnd.com.kontakt+json;version=10',
            'Api-Key' => '',
            'User-Agent' => 'Paw/3.1.4 (Macintosh; OS X/10.13.3) GCDHTTPRequest'
   ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //execute the POST request
        $response = curl_exec($curl);
        dd($response);
            
    }//function importKontakt
}//fin clase
