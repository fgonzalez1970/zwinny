<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/verif_ext/{email}/{clave}', 'UserController@verificaClaveExterna'
);

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
	//        // Uses Auth Middleware
	//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    
	Route::get('/home', 'HomeController@index')->name('home');

    //Roles
    Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('has.permission:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('has.permission:roles.create');
    Route::post('roles', 'RoleController@store')->name('roles.store')
		->middleware('has.permission:roles.create');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('has.permission:roles.edit');
	Route::post('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('has.permission:roles.edit');
	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('has.permission:roles.show');
	Route::get('roles/{role}/del', 'RoleController@destroy')->name('roles.destroy')->middleware('has.permission:roles.destroy');
	

	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('has.permission:users.index');
	Route::get('users/create', 'UserController@create')->name('users.create')
		->middleware('has.permission:users.create');
	Route::post('users', 'UserController@store')->name('users.store')
		->middleware('has.permission:users.create');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('has.permission:users.edit');
	Route::post('users/{user}', 'UserController@update')->name('users.update')
		->middleware('has.permission:users.edit');
	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('has.permission:users.show');
	Route::get('users/{user}/del', 'UserController@destroy')->name('users.destroy')->middleware('has.permission:users.destroy');
	
	//Users en Tenants
	Route::get('users_ten', 'UserController@indexTenant')->name('users_ten.index')
		->middleware('has.permission:users.tenant.index');
	Route::get('users_ten/create', 'UserController@createTenant')->name('users_ten.create')
		->middleware('has.permission:users.tenant.create');
	Route::post('users_ten', 'UserController@storeTenant')->name('users_ten.store')
		->middleware('has.permission:users.tenant.create');
	Route::get('users_ten/{user}/edit', 'UserController@editTenant')->name('users_ten.edit')
		->middleware('has.permission:users.tenant.edit');
	Route::post('users_ten/{user}', 'UserController@updateTenant')->name('users_ten.update')
		->middleware('has.permission:users.tenant.edit');
	Route::get('users_ten/{user}', 'UserController@showTenant')->name('users_ten.show')
		->middleware('has.permission:users.tenant.show');
	Route::get('users_ten/{user}/del', 'UserController@destroyTenant')->name('users_ten.destroy')->middleware('has.permission:users.tenant.destroy');

	//Tenants
	Route::get('tenants', 'TenantController@index')->name('tenants.index')
		->middleware('has.permission:tenants.index');
	Route::get('tenants/create', 'TenantController@create')->name('tenants.create')->middleware('has.permission:tenants.create');
	Route::post('tenants/store', 'TenantController@store')->name('tenants.store')
		->middleware('has.permission:tenants.create');
	Route::get('tenants/detail/{id}', 'TenantController@edit')->name('tenants.edit')->middleware('has.permission:tenants.edit');
	Route::post('tenants/{tenant}/edit', 'TenantController@update')->name('tenants.update')->middleware('has.permission:tenants.edit');
	Route::get('tenants/{id}', 'TenantController@show')->name('tenants.show')
		->middleware('has.permission:tenants.show');
	Route::delete('tenants/{tenant}/delete', 'TenantController@destroy')->name('tenants.destroy')->middleware('has.permission:tenants.destroy');
	Route::get('tenants/detStatus/{idstatus}', 'TenantController@showStatus')->name('tenants.showStatus')->middleware('has.permission:tenants.show');
	Route::get('tenants/listStatus/{id}', 'TenantController@listStatus')->name('tenants.listStatus')->middleware('has.permission:tenants.show');

//Devices

	Route::get('devices', 'Iot_dispositivoController@index')->name('devices.index')
		->middleware('has.permission:devices.index');
	Route::get('devices/create', 'Iot_dispositivoController@create')->name('devices.create')->middleware('has.permission:devices.create');
	Route::post('devices/store', 'Iot_dispositivoController@store')->name('devices.store')
		->middleware('has.permission:devices.create');
	Route::get('devices/detail/{id}', 'Iot_dispositivoController@edit')->name('devices.edit')->middleware('has.permission:devices.edit');
	Route::post('devices/{device}/edit', 'Iot_dispositivoController@update')->name('devices.update')->middleware('has.permission:devices.edit');
	Route::get('devices/{id}', 'Iot_dispositivoController@show')->name('devices.show')
		->middleware('has.permission:devices.show');
	Route::get('devices/{device}/delete', 'Iot_dispositivoController@destroy')->name('devices.destroy')->middleware('has.permission:devices.destroy');
	Route::get('devices/detStatus/{idstatus}', 'Iot_dispositivoController@showStatus')->name('devices.showStatus')->middleware('has.permission:devices.show');
	Route::get('devices/listSubtypes/{id}', 'Iot_dispositivoController@listSubtypes')->name('devices.listSubtypes')->middleware('has.permission:devices.show');
	Route::get('devices/listDevicesNoAssign/{id}', 'Iot_dispositivoController@listDevicesNoAssign')->name('devices.listDevicesNoAssign')->middleware('has.permission:devices.show');
	Route::get('/devices/export/excel', 'Iot_dispositivoController@export')->name('devices.export')
		->middleware('has.permission:devices.export');
	Route::post('/devices/import/excel', 'Iot_dispositivoController@import')->name('devices.import')
		->middleware('has.permission:devices.import');
		

	//Assignments

	Route::get('assignements', 'Iot_dispositivos_tenantController@index')->name('assignements.index')
		->middleware('has.permission:assignements.index');
	Route::get('assignements/create', 'Iot_dispositivos_tenantController@create')->name('assignements.create')->middleware('has.permission:assignements.create');
	Route::post('assignements/store', 'Iot_dispositivos_tenantController@store')->name('assignements.store')
		->middleware('has.permission:assignements.create');
	Route::get('assignements/detail/{id}', 'Iot_dispositivos_tenantController@edit')->name('assignements.edit')->middleware('has.permission:assignements.edit');
	Route::post('assignements/{id}','Iot_dispositivos_tenantController@update')->name('assignements.update')
		->middleware('has.permission:assignements.edit');
	
	Route::get('assignements/{assign}/delete', 'Iot_dispositivos_tenantController@destroy')->name('assignements.destroy')->middleware('has.permission:assignements.destroy');
	Route::get('devicesTenant', 'Iot_dispositivos_tenantController@indexTenant')->name('devices.indexTenant')->middleware('has.permission:devices.index');


	//Leads
	Route::get('leads', 'T01_leadController@index')->name('t01_leads.index')
		->middleware('has.permission:t01_leads.index');
	Route::get('leads/create', 'T01_leadController@create')->name('t01_leads.create')
		->middleware('has.permission:t01_leads.create');
	Route::post('leads/store', 'T01_leadController@store')->name('t01_leads.store')
		->middleware('has.permission:t01_leads.create');
	Route::get('leads/{lead}/edit', 'T01_leadController@edit')->name('t01_leads.edit')
		->middleware('has.permission:t01_leads.edit');	
	Route::post('leads/{lead}', 'T01_leadController@update')->name('t01_leads.update')
		->middleware('has.permission:t01_leads.edit');
	Route::get('leads/{lead}', 'T01_leadController@show')->name('t01_leads.show')
		->middleware('has.permission:t01_leads.show');
	Route::delete('leads/{lead}', 'T01_leadController@destroy')->name('t01_leads.destroy')
		->middleware('has.permission:t01_leads.destroy');
	Route::get('/leads/export/excel', 'T01_leadController@export')->name('t01_leads.export')
		->middleware('has.permission:t01_leads.export');
	Route::post('/leads/import/excel', 'T01_leadController@import')->name('t01_leads.import')
		->middleware('has.permission:t01_leads.import');
	Route::get('/leads/listStatus/list', 'T01_leadController@listStatusLeads')->name('t01_leads.listStatus')
		->middleware('has.permission:t01_leads.show');
	Route::get('/leads/listSources/list', 'T01_leadController@listSourcesLeads')->name('t01_leads.listSources')
		->middleware('has.permission:t01_leads.show');



	//Contactos
	Route::get('contacts', 'T02_contactController@index')->name('t02_contacts.index')
		->middleware('has.permission:t02_contacts.index');
	Route::get('contacts/create', 'T02_contactController@create')->name('t02_contacts.create')
		->middleware('has.permission:t02_contacts.create');
	Route::post('contacts/store', 'T02_contactController@store')->name('t02_contacts.store')
		->middleware('has.permission:t02_contacts.create');
	Route::get('contacts/{contact}/edit', 'T02_contactController@edit')->name('t02_contacts.edit')
		->middleware('has.permission:t02_contacts.edit');	
	Route::post('contacts/{contact}', 'T02_contactController@update')->name('t02_contacts.update')
		->middleware('has.permission:t02_contacts.edit');
	Route::get('contacts/{contact}', 'T02_contactController@show')->name('t02_contacts.show')
		->middleware('has.permission:t02_contacts.show');
	Route::delete('contacts/{contact}', 'T02_contactController@destroy')->name('t02_contacts.destroy')
		->middleware('has.permission:t02_contacts.destroy');
	Route::get('contacts/export/excel', 'T02_contactController@export')->name('t02_contacts.export')
		->middleware('has.permission:t02_contacts.export');
	Route::post('contacts/import/excel', 'T02_contactController@import')->name('t02_contacts.import')
		->middleware('has.permission:t02_contacts.import');
	Route::get('contacts/listResults/{id}', 'T02_contactController@listResults')->name('t02_contacts.listResults')->middleware('has.permission:t02_contacts.show');

	//Locations
	Route::get('locations', 'Iot_locationController@index')->name('locations.index')
		->middleware('has.permission:locations.index');
	Route::get('locations/create', 'Iot_locationController@create')->name('locations.create')
		->middleware('has.permission:locations.create');
	Route::post('locations/store', 'Iot_locationController@store')->name('locations.store')
		->middleware('has.permission:locations.create');
	Route::get('locations/show/{id}', 'Iot_locationController@showDevices')->name('locations.showDevices')
		->middleware('has.permission:locations.show');
	Route::get('locations/{contact}/edit', 'Iot_locationController@edit')->name('locations.edit')
		->middleware('has.permission:locations.edit');	
	Route::post('locations/{contact}', 'Iot_locationController@update')->name('locations.update')
		->middleware('has.permission:locations.edit');
	Route::get('locations/{contact}', 'Iot_locationController@show')->name('locations.show')
		->middleware('has.permission:locations.show');
	Route::get('locations/{contact}', 'Iot_locationController@destroy')->name('locations.destroy')
		->middleware('has.permission:locations.destroy');
	Route::get('/locations/export/excel', 'Iot_locationController@export')->name('locations.export')
		->middleware('has.permission:locations.export');
	Route::post('/locations/import/excel', 'Iot_locationController@import')->name('locations.import')
		->middleware('has.permission:locations.import');

	//Locations-devices tenant
	Route::get('locs_devs', 'Iot_locations_deviceController@index')->name('locs_devs.index')
		->middleware('has.permission:locations.index');
	Route::get('locs_devs/create', 'Iot_locations_deviceController@create')->name('locs_devs.create')
		->middleware('has.permission:locations.assign');
	Route::post('locs_devs/store', 'Iot_locations_deviceController@store')->name('locs_devs.store')
		->middleware('has.permission:locations.assign');
	Route::get('locs_devs/{contact}', 'Iot_locations_deviceController@destroy')->name('locs_devs.destroy')
		->middleware('has.permission:locations.del_assign');
	Route::get('devicesTenant/loc/{id_dev}', 'Iot_locations_deviceController@showLocDev')->name('devices.showLocDev')->middleware('has.permission:locations.show');
	Route::get('locations/dev/{id_loc}', 'Iot_locations_deviceController@showDevLoc')->name('locations.showDevLoc')->middleware('has.permission:locations.show');
	
});


