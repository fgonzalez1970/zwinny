<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T01_lead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Statuslead;
use App\lead_status;
use App\T01m01_brancheslead;
use App\T01m02_sourceslead;
use App\T01m10_statuslead;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class T01_leadController extends Controller
{

    protected $rules =
    [
        'id_source' => 'bail|required',
        'id_status' => 'bail|required',
        'id_branch' => 'bail|required',
        'name_lead' => 'bail|required|min:2|max:250',
        'lastname_lead' => 'bail|required|min:2|max:250',
        'email_lead' => 'bail|required|email',
        'birthdate_lead' => 'nullable|date_format:"d/m/Y"',
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
        //busco el listado de usuarios pertenecientes al mismo tenant para la ventana modal
        $user = Auth::user();
        $listUsers = User::where('tenant_id',$user->tenant_id)->get();
        $lead = new T01_lead;
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
        $lead->setConnection('bdcnxtemp');
        //$lead->connection = 'tenant2';
        //dd($lead->getconnection());
        //DB::setDefaultConnection('tenant2');
        $leads = T01_lead::paginate();
        //traemos los count por status
        $counts[0] = count($leads);
        $counts[1] = T01_lead::where('id_status', 1)->count();
        $counts[2] = T01_lead::where('id_status', 2)->count();
        $counts[3] = T01_lead::where('id_status', 3)->count();
        $counts[4] = T01_lead::where('id_status', 4)->count();
        $counts[5] = T01_lead::where('id_status', 5)->count();
        //dd($leads);
        return view('t01_leads.index', compact('leads', 'listUsers','counts'));

        //Modelo::on(\Session::get('nombredb'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $branche = new T01m01_brancheslead;
        $source = new T01m02_sourceslead;
        $status = new T01m10_statuslead;
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
        $branche->setConnection('bdcnxtemp');
        $source->setConnection('bdcnxtemp');
        $status->setConnection('bdcnxtemp');
        
        //buscamos los listados necesarios
        $listBranches = T01m01_brancheslead::all();
        $listSources = T01m02_sourceslead::all();
        $listStatus = T01m10_statuslead::all();
        //$listUsers = User::where('tenant_id',$user->tenant_id)
                        //->where('id','!=',$user->id)->get();
         $listUsers = User::where('tenant_id',$user->tenant_id)->get();
        //$statusList = T01m10_statuslead::pluck('name','id');
        //dd($listUsers);
        return view('t01_leads.create', compact('listStatus','listBranches','listSources','listUsers'));
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
        $input = Input::all();
        $validator = Validator::make(Input::all(), $this->rules);
        //dd("pasé");
        $name_bd = session('name_bd');
        //dd($name_bd);
        $lead = new T01_lead;
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
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::create($request->all());
        
        if ($request->flag_owner=='1'){
            //si no fué asignado a todos los usuarios
            if ($request->assigned_to){
                //dd('si tiene asignados');
                $lead->syncLeadsToUssers($request->assigned_to);
                //dd($request->assigned_to);
                
                //actualizamos sus permisos  
            } else {
                //lo borramos
                $lead->delete();
                $validator->errors()->add('assigned_to', 'El Prospecto debe estar asignado al menos a un usuario');
                Input::flash();
                return redirect()->back()->withErrors($validator->errors());
            }
        }
        return redirect()->route('t01_leads.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $Lead
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('aqui');
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
        $user = Auth::user();
        DB::setDefaultConnection('bdcnxtemp');
        $lead = new T01_lead;
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::find($id);
        //$listUsers = User::where('tenant_id',$user->tenant_id)
        //                ->where('id','!=',$user->id)->get();
        $listUsers = User::where('tenant_id',$user->tenant_id)->get();
         return view('t01_leads.show', compact('lead', 'listUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $branche = new T01m01_brancheslead;
        $source = new T01m02_sourceslead;
        $status = new T01m10_statuslead;
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
        $branche->setConnection('bdcnxtemp');
        $source->setConnection('bdcnxtemp');
        $status->setConnection('bdcnxtemp');
        
        //buscamos los listados necesarios
        $listBranches = T01m01_brancheslead::all();
        $listSources = T01m02_sourceslead::all();
        $listStatus = T01m10_statuslead::all();
        $listUsers = User::where('tenant_id',$user->tenant_id)
                        ->where('id','!=',$user->id)->get();

        $lead = new T01_lead;
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::findOrFail($id);
        return view('t01_leads.edit', compact('lead', 'listStatus','listBranches','listSources','listUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $data = $request->all();
        $input = Input::all();
        $validator = Validator::make(Input::all(), $this->rules);
        $name_bd = session('name_bd');
        $lead = new T01_lead;
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
        $lead->setConnection('bdcnxtemp');
        $lead = T01_lead::findOrFail($id);
        $lead->update($request->all());

        //validamos a quién fué asignado o si cambió
        if ($request->flag_owner=='1'){
            //si no fué asignado a todos los usuarios
            if ($request->assigned_to){
                $lead->syncLeadsToUssers($request->assigned_to);
            } else {
                //lo borramos
                $lead->delete();
                $validator->errors()->add('assigned_to', 'El Prospecto debe estar asignado al menos a un usuario');
                Input::flash();
                return redirect()->back()->withErrors($validator->errors());
            }
        } else {
            $lead->deleteLeadsToUssers();
        }
        //validamos si hubo cambio de status
        if ($request->last_status!=$request->id_status){
            $hoy = date('Y-m-d H:i');
            $leadstatus = new lead_status;
            $leadstatus->id_lead =  $lead->id;
            $leadstatus->id_status =  $request->id_status;
            $leadstatus->date_change =  $hoy;
            $leadstatus->id_user =  $user->id;
            $leadstatus->save();       
        }
        return redirect()->route('t01_leads.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
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
        $lead = new T01_lead;
        $lead = T01_lead::find($id);
        $lead->setConnection('bdcnxtemp');
        $lead->delete();

        return back()->with('info','Lead eliminado con éxito');
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function showBranchName($idBranche)
    {
        $branche = T01m01_brancheslead::findOrFail($idBranche)->name;
        return $branche;
    }

    public function showSourceName($idSource)
    {
        $source = T01m02_sourceslead::findOrFail($idSource)->name;
        return $source;
    }

    public function showStatusName($idStatus)
    {
        $status = T01m10_statuslead::findOrFail($idStatus)->name;
        return $status;
    }
    
    public function export()
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
        $lead = new T01_lead;
        $lead->setConnection('bdcnxtemp');
        /** Fuente de Datos Eloquent */
        $data = T01_lead::all();
        $fecha_hoy = date('dmY');
        $nombre = "crm_zwinny_leads_".$fecha_hoy;
        /** Creamos nuestro archivo Excel */
        Excel::create($nombre, function ($excel) use ($data) {

            /** Creamos una hoja */
            $excel->sheet('Leads', function ($sheet) use ($data) {
                /**
                 * Insertamos los datos en la hoja con el método with/fromArray
                 * Parametros: (
                 * Datos,
                 * Valores del encabezado de la columna,
                 * Celda de Inicio,
                 * Comparación estricta de los valores del encabezado
                 * Impresión de los encabezados
                 * )*/
                $sheet->with($data, null, 'A1', false, false);
            });

            /** Descargamos nuestro archivo pasandole la extensión deseada (xls, xlsx) */
        })->download('xlsx');
        
        return redirect()->route('t01_leads.index')->with('success','Exportación realizada satisfactoriamente');
    }

       
    public function import(Request $request)
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
        $leadObj = new T01_lead;
        $leadObj->setConnection('bdcnxtemp');
        $data = $request->all();
        $input = Input::all();
        $filename = $_FILES['file_import']['name'];
        $uploadedFile = '';
        $id_status = $_POST['id_status'];
        $id_source = $_POST['id_source'];
        $flag_owner = $_POST['flag_owner'];

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
                $lead = [
                    'code_lead' => $sheetData[$i][0],
                    'name_lead' => $sheetData[$i][1],
                    'lastname_lead' => $sheetData[$i][2],
                    'email_lead'    => $sheetData[$i][3],
                    'birthdate_lead' => $sheetData[$i][4],
                    'company'       => $sheetData[$i][5],
                    'rfc'           => $sheetData[$i][6],
                    'contact_lead'  => $sheetData[$i][7],
                    'phone_fix'     => $sheetData[$i][8],
                    'phone_mobile'  => $sheetData[$i][9],
                    'address_txt'   => $sheetData[$i][10],
                    'country'       => $sheetData[$i][11],
                    'state'         => $sheetData[$i][12],
                    'city'          => $sheetData[$i][13],
                    'obs_lead'      => $sheetData[$i][14],
                    'facebook'      => $sheetData[$i][15],
                    'twitter'       => $sheetData[$i][16], 
                    'instagram'     => $sheetData[$i][17],
                    'skype'         => $sheetData[$i][18],
                    'id_status'     => $id_status,
                    'id_source'     => $id_source,
                    'flag_owner'     => $flag_owner,
                    ];

                    //insertamos el registro en la bd
                    $result = T01_lead::insert($lead); 
                }//for
                
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                $error = $e->getMessage();
                DB::rollback();
                return Response::json(array('errors' => [$error]));
            }

            if ($success) {
                $mensaje="Importación realizada con éxito";
                return response()->json(array('mnsj' => ['Archivo importado con éxito.']));
            } 
            //print_r($sheetData);
        }//if file
            
    }//function import

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function listStatusLeads()
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
        $listStatus = T01m10_statuslead::all();
        return response()->json($listStatus);
    }//function listStatus

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function listSourcesLeads()
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
        $listSources = T01m02_sourceslead::all();
        return response()->json($listSources);
    }//function listStatus
}
