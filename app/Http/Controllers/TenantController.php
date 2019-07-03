<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Tenant;
use App\Statustenant;

class TenantController extends Controller
{
     protected $rules =
    [
        'name' => 'bail|required|min:2|max:250',
        'name_bd' => 'bail|required|min:2|max:250',
        'id_status' => 'bail|required',
        'created_at' => 'nullable|date_format:"d/m/Y"',
        'date_start' => 'nullable|date_format:"d/m/Y"',
        'date_end' => 'nullable|date_format:"d/m/Y"',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusList = Statustenant::pluck('name','id');
        $tenants = Tenant::paginate();
        //dd($statusList);
        return view('tenants.index', compact('tenants'), compact('statusList'));
    }

    public function readData()
    {
        $tenants = Tenant::paginate();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,$this->rules);

        request()->validate(['logo_file' => 'image']);
        $data = $request->all();
        //if (request()->logo_file){
        //    $resp=request()->logo_file->storeAs('uploads', request()->logo_file->getClientOriginalName());
        //    
        //}
        if ($request->file('logo_file')){
            $path=Storage::disk('public')->put('img',$request->file('logo_file'));
            $data['logo_file'] = asset($path);
            //$tenant->fill(['logo_file'=>asset($path)])->save();
        }
        //dd($data['logo_file']);
        $data['date_start'] = substr($data['date_start'],6,4)."-".substr($data['date_start'],3,2)."-".substr($data['date_start'],0,2)." 00:00:00";
        $data['date_end'] = substr($data['date_end'],6,4)."-".substr($data['date_end'],3,2)."-".substr($data['date_end'],0,2)." 00:00:00";
        $data['created_at'] = substr($data['created_at'],6,4)."-".substr($data['created_at'],3,2)."-".substr($data['created_at'],0,2)." 00:00:00";
        //dd($data);
        $tenant= Tenant::create($data);
        
        //dd($tenant);
        //dd($data);
        return redirect()->route('tenants.index')->with('success','Registro creado satisfactoriamente');
       
        //if ($validator->fails()) {
          //  return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        //} else {
          // $tenant = Tenant::create($request->all());
            //return response()->json($tenant);
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('show');
        $tenant = Tenant::findOrFail($id);
        return view('tenants.show', compact('tenant'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd('show');
        $tenant = Tenant::findOrFail($id);
        $listStatus = Statustenant::all();
        return view('tenants.edit', compact('tenant'), compact('listStatus'));
    }

    
     /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $tenant
     * @return \Illuminate\Http\Response
     */
    public function showStatus($idStatus)
    {
        //dd('aqui');
        $status = Statustenant::findOrFail($idStatus);
        return response()->json($status);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $tenant
     * @return \Illuminate\Http\Response
     */
    public function showStatusName($idStatus)
    {
        $status = Statustenant::findOrFail($idStatus)->name;
        return $status;
    }
        
    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function listStatus($id)
    {
        $listStatus = Statustenant::all();

        return response()->json($listStatus);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function editAjax(Request $request)
    {
        
       if ($request->ajax()) {
            //dd('ajax');
            $tenant = Tenant::find($request->id);
            //return response()->json_encode($tenant);
            //return Response::json($tenant);
        } else {
            //dd('pase');    
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function updateOld(Request $request, $idTnt)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $tenant = Tenant::findOrFail($idTnt);
            $tenant->update($request->all());
            return response()->json($tenant);
        }
    }

    public function update(Request $request, $id)    {
        //
        $this->validate($request,$this->rules);
        //validamos el campo file
        request()->validate(['logo_file' => 'image']);
        $data = $request->all();
        //if (request()->logo_file){
        //    $resp=request()->logo_file->storeAs('uploads', request()->logo_file->getClientOriginalName());
        //    
        //}
        if ($request->file('logo_file')){
            $path=Storage::disk('public')->put('img',$request->file('logo_file'));
            $data['logo_file'] = asset($path);
            //$tenant->fill(['logo_file'=>asset($path)])->save();
        }
        //dd($data['logo_file']);
        $data['date_start'] = substr($data['date_start'],6,4)."-".substr($data['date_start'],3,2)."-".substr($data['date_start'],0,2)." 00:00:00";
        $data['date_end'] = substr($data['date_end'],6,4)."-".substr($data['date_end'],3,2)."-".substr($data['date_end'],0,2)." 00:00:00";
        $data['created_at'] = substr($data['created_at'],6,4)."-".substr($data['created_at'],3,2)."-".substr($data['created_at'],0,2)." 00:00:00";
        //dd($data);
        $tenant= Tenant::findOrFail($id)->update($data);
        
        //dd($tenant);
        //dd($data);
        return redirect()->route('tenants.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tenant  $tenant
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        //verificar las reglas para poder borrar un inquilino
        //if (count($users)>0){
          // return Response::json(array('errors' => ['Tenant is assigned to users']));
        //} else {
          //  $tenant->delete();
            //return response()->json($tenant);
        //}
        
    }
}
