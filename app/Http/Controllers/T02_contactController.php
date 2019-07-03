<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use \PhpOffice\PhpSpreadsheet\Reader\Csv;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\T01_lead;
use App\T02_contact;
use App\T02m11_sourcescontact;
use App\T02m12_statuscontact;
use App\T02m13_resultscontact;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class T02_contactController extends Controller
{
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
        $contact = new T02_contact;
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
        $contact->setConnection('bdcnxtemp');
        //$lead->connection = 'tenant2';
        //dd($lead->getconnection());
        //DB::setDefaultConnection('tenant2');
        $contacts = T02_contact::paginate();
        //dd($leads);
        $counts[0] = count($contacts);
        $counts[1] = T02_contact::where('id_status', 1)->count();
        $counts[2] = T02_contact::where('id_status', 2)->count();
        $counts[3] = T02_contact::where('id_status', 3)->count();
        return view('t02_contacts.index', compact('contacts', 'listUsers','counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $source = new T02m11_sourcescontact;
        $status = new T02m12_statuscontact;
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
        $source->setConnection('bdcnxtemp');
        $status->setConnection('bdcnxtemp');
        $lead->setConnection('bdcnxtemp');        
        //buscamos los listados necesarios
        
        $listSources = T02m11_sourcescontact::all();
        $listStatus = T02m12_statuscontact::all();
        $listLeads = T01_lead::where('flag_owner','0')->get();
        //join("leads_users","t01_leads.id","=","leads_users.id_lead")->where('id_user',$user->id)
           // ->orwhere('flag_owner','0')->get();
        //$listUsers = User::where('tenant_id',$user->tenant_id)
                        //->where('id','!=',$user->id)->get();
        return view('t02_contacts.create', compact('listStatus','listSources','listLeads'));
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
        //$validator = Validator::make(Input::all(), $this->rules);
        //dd($data);
        $name_bd = session('name_bd');
        //dd($name_bd);
        $contact = new T02_contact;
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
        $contact->setConnection('bdcnxtemp');
        //dd($request->flag_prog);
        $contact = T02_contact::create($data);
        
        return redirect()->route('t02_contacts.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $contact = new T02_contact;
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
        $contact->setConnection('bdcnxtemp');        
        
        //buscamos el contacto a editar
        $contact = T02_contact::findOrFail($id);
        return view('t02_contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $source = new T02m11_sourcescontact;
        $status = new T02m12_statuscontact;
        $lead = new T01_lead;
        $contact = new T02_contact;
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
        $source->setConnection('bdcnxtemp');
        $status->setConnection('bdcnxtemp');
        $lead->setConnection('bdcnxtemp');        
        $contact->setConnection('bdcnxtemp');        
        
        //buscamos el contacto a editar
        $contact = T02_contact::findOrFail($id);

        //buscamos los listados necesarios
        
        $listSources = T02m11_sourcescontact::all();
        $listStatus = T02m12_statuscontact::all();
        $listLeads = T01_lead::where('flag_owner','0')->get();
        //buscamos los results según el status que trae el contacto
        $listResults = $this->listResults2($contact->id_status);
        //dd($listResults);
        return view('t02_contacts.edit', compact('contact', 'listStatus','listSources','listLeads', 'user', 'listResults'));
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
        $input = Input::all();
        //$validator = Validator::make(Input::all(), $this->rules);
        //dd("pasé");
        $name_bd = session('name_bd');
        $host = getenv('HOST_DB');
        //dd($name_bd);
        $contact = new T02_contact;
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
        $contact->setConnection('bdcnxtemp');
        
        //buscamos el contacto a editar
        $contact = T02_contact::findOrFail($id)->update($data);
        //$contact->update($request->all());
        
        return redirect()->route('t02_contacts.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display the specified resource: list of result for an status
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function listResults($id)
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
        $listResults = T02m13_resultscontact::where('id_statuscont','=',$id)
        ->orderBy('name', 'asc')
               ->get();
        //dd($listResults);
        return response()->json($listResults);
    }

    /**
     * Display the specified resource: list of result for an status
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function listResults2($id)
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
        $listResults = T02m13_resultscontact::where('id_statuscont','=',$id)
        ->orderBy('name', 'asc')
               ->get();
        //dd($listResults);
        return $listResults;
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
        $contObj = new T02_contact;
        $contObj->setConnection('bdcnxtemp');
        $data = $request->all();
        $input = Input::all();
        $filename = $_FILES['file_import']['name'];
        $uploadedFile = '';
        $id_way = $_POST['id_way'];
        $id_status = $_POST['id_status'];
        $id_result = $_POST['id_result'];      
        $id_source = $_POST['id_source'];
        $flag_prog = $_POST['flag_prog'];

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
                    'subject' => $sheetData[$i][0],
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

    public function showWayName($idWay)
    {
        if ($idWay=='1')
            $way = 'Entrante';
        else
            $way = 'Saliente';
        return $way;
    }

    public function showSourceName($idSource)
    {
        $source = T02m11_sourcescontact::findOrFail($idSource)->name;
        return $source;
    }

    public function showStatusName($idStatus)
    {
        $status = T02m12_statuscontact::findOrFail($idStatus)->name;
        return $status;
    }
}
