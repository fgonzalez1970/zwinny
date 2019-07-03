<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\str;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $rules =
    [
        'name' => 'required|min:2|max:50',
        'slug' => 'required|min:2|max:50',
        'description' => 'required|min:2|max:250',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //traemos todos los permisos
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $data = $request->all();
        $input = Input::all();
        $validator = Validator::make(Input::all(), $this->rules);
        $this->validate($request,$this->rules);
        //dd("pasé");
        $role = Role::create($request->all());
        //dd($role);
        if (!$request->special=='all-access'){
            //si no presenta todos los permisos
            if ($request->perm_check){
                $role = Role::findOrFail($role->id);
                $role->syncPermissions($data['perm_check']);
                //dd($role);
                $role->update($request->all());
                //actualizamos sus permisos  
            } else {
                //lo borramos
                $role->delete();
                $validator->errors()->add('Permiso', 'El Rol debe tener al menos 1 permiso asignado');
                Input::flash();
                return redirect()->back()->withErrors($validator->errors());
            }
        }
        return redirect()->route('roles.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        //$permis = $role->getPermissions();
        //$permissions = DB::select('permission_id')where('role_id',$id);
        if ($role->special=='all-access') {
            //es el admin de zwinny tiene todos los permisos
            $permissions = Permission::all();
        } else {
            $permissions = DB::table('permissions')
            ->join('permission_role', 'permissions.id', '=', 'permission_role.permission_id')
            ->where('role_id', $id)
            ->select('permissions.*')
            ->get();    
        }
        
        //dd($permissions);
        return view('roles.show', compact('role'), compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        //$permis = $role->getPermissions();
        //$permissions = DB::select('permission_id')where('role_id',$id);
        //traemos todos los permisos
        $permissions = Permission::all();
        //dd($permissions);
        return view('roles.edit', compact('role'), compact('permissions'));
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
        //dd($data['perm_check']);
        //dd($request->perm_check);
        //$result = $this->validate($request,$this->rules);
        $validator = Validator::make(Input::all(), $this->rules);

        if ($request->perm_check){
            $role = Role::findOrFail($id);
            $role->syncPermissions($data['perm_check']);
            //dd($role);
            $role->update($request->all());
            //actualizamos sus permisos
            
            return redirect()->route('roles.index')->with('success','Registro actualizado satisfactoriamente');  
        } else {
            $validator->errors()->add('Permiso', 'El Rol debe tener al menos 1 permiso asignado');
            Input::flash();
            return redirect()->back()->withErrors($validator->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $role = Role::findOrFail($id);
        //verificar si el role está asignado a al menos 1 user
        //$users = $role->users();
        $users = DB::table('role_user')->where('role_id','=', $id)->get();
        //$num = DB::select('select count(id) from role_user where role_id = ?', [$id]);
        //dd($users);
        if (count($users)>0){
           //return Response::json(array('errors' => ['Role is assigned to users']));
           return redirect()->route('roles.index')->with('error','El rol está asignado a algún usuario!');
        } else {
            $role->delete();
            //return response()->json($role);
            return redirect()->route('roles.index')->with('success','Registro eliminado satisfactoriamente');
        }
        
    }
}
