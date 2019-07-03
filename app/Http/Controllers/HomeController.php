<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Tenant;
use App\User;
use App\T01_lead;
use App\T02_contact;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    protected $rules =
    [
        'login' => 'bail',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
          //validamos si el usuario viene de ser registrado y hay que setear su bd
        $user = Auth::user();
        $datos = array();
        //el nombre de la bd está formado por zwinny_ + el id del tenant al que pertenece
        $name_db = "zwinny_".$user->tenant_id;
        $tenant = Tenant::find($user->tenant_id);
        if ($tenant) {
          session(['tenant_logo_url' => $tenant->logo_file]);
        } else {
          session(['tenant_logo_url' => ""]);
        }
        //dd($user->name);
        
        //dd(session('tenant_logo_url'));
        //$name_cnx = "tenant".$user->id;
        if ($user->isRole('admin-zwinny')) {
            //Administrador General Zwinny, va a la bd general
            session(['name_bd' => 'crm_zwinny']);
            $datos[0] = Tenant::all()->count(); 
            $datos[1] = User::all()->count();
            $users = User::latest()
                    ->take(5)
                    ->get(); 
            $tenants = Tenant::latest()
                    ->take(5)
                    ->get(); 
            //dd('if');
            return view('adminlte::home', compact('datos','users', 'tenants'));
        } else {
            //dd("aquí");
            $tenant = Tenant::find($user->tenant_id);
            //dd("aquí 3");
            if ($user->tenant_id!=NULL){
                //dd('if else');
                //validamos los parámetros del tenant sobre fecha de activación si es usuario aún es demo
                //if ($tenant->id_status=='1'){
                  //$hoy = date('Y-m-d H:i');
                  //if ($hoy>$tenant->date_end){
                    //lo deslogueamos con mensaje
                    //dd($tenant->date_start.'- expiró');
                    //Auth::logout();
                    //Session::flush();
                    //$validator = Validator::make(Input::all(), $this->rules);
                    //$validator->errors()->add('interno', 'Su período de prueba ha expirado!');
                    //Input::flash();
                    //return view('expira')->withErrors($validator->errors());
                    //return view('welcome')->with('msg', 'Su período de prueba ha finalizado!');
                //return view('welcome')->withErrors('msg', 'Su período de prueba ha finalizado!');
                    //return view('adminlte::layouts.landing');
                  //}
                //}
                session(['name_bd' => $name_db]);
                $user->selectSchemaTnt($name_db);
                //dd("aquí 4");
            } else {
                //dd("aquí2");
                //verificar
                //dd("else");
                 //Creamos el registro de Inquilino y asignamos su id al usuario
                $today = date('Y-m-d');
                $nuevafecha = strtotime ( '+1 month' , strtotime ( $today ) ) ;
                $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
                $tenant = Tenant::create(['name'=>$user->name,'num_users'=>2, 'date_start'=>$today, 'date_end'=>$nuevafecha]);
                //dd("creado tenant");
                $name_db = "zwinny_".$tenant->id;
                $tenant->name_bd = $name_db;
                $tenant->save();
                $user->asignaTenantId($tenant->id);
                $user->createProfile();
                session(['tenant_logo_url' => $tenant->logo_file]);
                //asignamos el rol
                $user->assignRole(2);
                
                //creamos la bd para este usuario
                $user->createSchema($name_db,$user->id);
                session(['name_bd' => $name_db]);
                dd("después de crear bd");
            }
            $lead = new T01_lead;
            $contact = new T02_contact;
            $datos[0] = $lead->countLeads(); 
            $datos[1] = $contact->countContacts();
            $leads = T01_lead::latest()
                    ->take(5)
                    ->get(); 
            $contacts = T02_contact::latest()
                    ->take(5)
                    ->get(); 
            //dd($datos);
            return view('adminlte::home2', compact('datos','leads','contacts'));
        }//else
    }
}
