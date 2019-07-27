<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tenant;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $rules =
    [
        'name' => 'required',
        'email' => 'required|email',
        'tenant_id' => 'required|integer|not_in:0',
        'user_temp' => 'required',
        'password' => 'required',
    ];

    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    public function indexTenant()
    {
        $user = Auth::user();
        $tenant = Tenant::findOrFail($user->tenant_id);
        $users = User::where('tenant_id',$user->tenant_id)
               ->where('id','<>',$user->id)
               ->paginate();
        return view('users_ten.index', compact('users','tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $tenants = Tenant::all();
        $array_ten = array();
        foreach ($tenants as $tenant) {
            $array_ten[$tenant->id]=$tenant->id."-".$tenant->name;
        }
        return view('users.create', compact('roles','array_ten','tenants'));
    }

    /**
     * Show the form for create the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function createTenant()
    {

        $roles = Role::where('id',2)->OrWhere('id',3)->get();
        $user = Auth::user();
        $tenant = Tenant::findOrFail($user->tenant_id);

        return view('users_ten.create', compact('roles','tenant'));
    }


    /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        //validar datos
        //dd($this->rules);
        $this->validate($request,$this->rules);
        $this->validate($request,['email' => 'unique:users,email']);
        $validator = Validator::make(Input::all(), $this->rules);
        //encriptar la contraseña
        $data = $request->all();
        if ($request->roles){
            //dd($data);
            $data['password'] = bcrypt($data['password']);
            //actuallizar usuario
            $user = User::create($data);

            //actualizar roles
            $user->roles()->sync($request->get('roles'));
            $mess= trans('adminlte_lang::message.createOK'); 
            return redirect()->route('users.index')
            ->with('success', $mess);
        } else {
            $mess= trans('adminlte_lang::message.createUserNOK'); 
            $validator->errors()->add('Roles', $mess);
            Input::flash();
            return redirect()->back()->withErrors($validator->errors());
        }
        
    }

    /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param    $request
     * @return \Illuminate\Http\Response
     */
    public function storeTenant(Request $request)
    {
        $input = Input::all();
        //validar datos
        //dd($this->rules);
        $this->validate($request,$this->rules);
        $this->validate($request,['email' => 'unique:users,email']);
        $validator = Validator::make(Input::all(), $this->rules);
        //encriptar la contraseña
        $data = $request->all();
        if ($request->roles){
            //dd($data);
            $data['password'] = bcrypt($data['password']);
            //actualizar usuario
            $user = User::create($data);

            //actualizar roles
            $user->roles()->sync($request->get('roles'));
            $mess= trans('adminlte_lang::message.createOK'); 
            return redirect()->route('users_ten.index')
            ->with('success', $mess);
        } else {
            $mess= trans('adminlte_lang::message.createUserNOK'); 
            $validator->errors()->add('Roles', $mess);
            Input::flash();
            return redirect()->back()->withErrors($validator->errors());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::get();
        $tenant = Tenant::find($user->tenant_id);
        //dd($name);
        return view('users.show', compact('user','tenant','roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function showTenant(User $user)
    {
        $roles = Role::where('id',2)->OrWhere('id',3)->get();
        $tenant = Tenant::find($user->tenant_id);
        //dd($name);
        return view('users.show', compact('user','tenant','roles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $tenants = Tenant::all();
        $array_ten = array();
        foreach ($tenants as $tenant) {
            $array_ten[$tenant->id]=$tenant->id."-".$tenant->name;
        }

        //buscamos el tenant
        //$tenant = Tenant::find($user->tenant_id);
        //dd($user);
        return view('users.edit', compact('user','roles','array_ten','tenants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function editTenant(User $user)
    {
        $roles = Role::where('id',2)->OrWhere('id',3)->get();
        $tenant = Tenant::find($user->tenant_id);
        //dd($user);
        return view('users_ten.edit', compact('user','roles','tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = Input::all();
        //validar datos
        //dd($this->rules);
        $this->validate($request,$this->rules);
        $this->validate($request,['email' => 'unique:users,email,'.$user->id]);
        $validator = Validator::make(Input::all(), $this->rules);
        //encriptar la contraseña
        $data = $request->all();
        if ($request->roles){
            //dd($data);
            $data['password'] = bcrypt($data['password']);
            //actuallizar usuario
            $user->update($data);

            //actualizar roles
            $user->roles()->sync($request->get('roles'));
            $mess= trans('adminlte_lang::message.updateOK'); 
            return redirect()->route('users.index')
            ->with('success', $mess);
        } else {
            $mess= trans('adminlte_lang::message.createUserNOK'); 
            $validator->errors()->add('Roles', $mess);
            Input::flash();
            return redirect()->back()->withErrors($validator->errors());
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function updateTenant(Request $request, User $user)
    {
        $input = Input::all();
        //validar datos
        //dd($this->rules);
        $this->validate($request,$this->rules);
        $this->validate($request,['email' => 'unique:users,email,'.$user->id]);
        $validator = Validator::make(Input::all(), $this->rules);
        //encriptar la contraseña
        $data = $request->all();
        if ($request->roles){
            //dd($data);
            $data['password'] = bcrypt($data['password']);
            //actuallizar usuario
            $user->update($data);

            //actualizar roles
            $user->roles()->sync($request->get('roles'));
            $mess= trans('adminlte_lang::message.updateOK'); 
            return redirect()->route('users_ten.index')
            ->with('success', $mess);
        } else {
            $mess= trans('adminlte_lang::message.createUserNOK'); 
            $validator->errors()->add('Roles', $mess);
            Input::flash();
            return redirect()->back()->withErrors($validator->errors());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $mess= trans('adminlte_lang::message.deleteOK'); 
        return back()->with('success',$mess);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroyTenant(User $user)
    {
        $user->delete();
        $mess= trans('adminlte_lang::message.deleteOK'); 
        return back()->with('success',$mess);
    }

    public function verificaClaveExterna($email, $clave){
        //recibimos el email y la clave encriptada
        //buscamos el usuario por su  mail
        $userExt = new User;
        //$clave = $userExt->encriptar($clave);
        //$email = $userExt->encriptar($email);
        try{
            $emailDes=$userExt->desencriptar($email);
            $userExt = User::where('email', $emailDes)->first();
            if ($userExt){
                $claveDes = $userExt->desencriptar($clave);
                if (Hash::check($claveDes, $userExt->password)) {
                    // The passwords match...
                    $resp['respuesta']= $userExt->encriptar('ok');
                } else {
                    $resp['respuesta'] = $userExt->encriptar('nok2');
                }
            } else {
                 $userExt = new User;
                $resp['respuesta'] = $userExt->encriptar('nok1');
            }
        }catch (Exception $e){
            $resp['respuesta'] = $userExt->encriptar('error');
        }
        return response()->json($resp);
    }
}
