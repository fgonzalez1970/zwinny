<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Statuslead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lead = new Lead;
        $name_bd = session('name_bd');
        //dd($name_bd);
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
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
        $leads = Lead::paginate();
        //dd($leads);
        return view('leads.index', compact('leads'));

        //Modelo::on(\Session::get('nombredb'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lead = Lead::create($request->all());

        return redirect()->route('leads.edit', $lead->id)
            ->with('info', 'Lead guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $Lead
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $name_bd = session('name_bd');
        //dd($lead->nombre_lead);
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead = new Lead;
        $lead->setConnection('bdcnxtemp');
        $lead = Lead::find($id);
         return view('leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $name_bd = session('name_bd');
        //dd($lead->nombre_lead);
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead = new Lead;
        $lead->setConnection('bdcnxtemp');
        $lead = Lead::find($id);
        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $name_bd = session('name_bd');
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead->setConnection('bdcnxtemp');
        $lead->update($request->all());

        return redirect()->route('leads.edit', $lead->id)
            ->with('info', 'Lead actualizado con éxito');
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
        Config::set('database.connections.bdcnxtemp', array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => $name_bd,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('bdcnxtemp');
        $lead = new Lead;
        $lead = Lead::find($id);
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
    public function showStatusName($idStatus)
    {
        $status = Statuslead::findOrFail($idStatus)->name;
        return $status;
    }
}
