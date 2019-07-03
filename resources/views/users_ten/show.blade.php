@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.users') }}
@endsection

<?php use App\Http\Controllers\UserController; 
use App\Tenant;
$userControl = new UserController; 
?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.showuser') }}</h3>
						<a href="{{url()->previous()}}" class="btn btn-warning btn-sm pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="usersTable">
							 			<div class="form-group">
    									<label class="control-label col-sm-4" for="id">ID:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$user->id}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.name')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$user->name}}</span>
    									</div>
  									</div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="user_temp">{{trans('adminlte_lang::message.usertemp')}}:</label>
                      <div class="col-sm-8">
                          @if ($user->user_temp=='1') 
                            @php ($flag_ut='Sí')
                          @else
                            @php ($flag_ut='No')
                          @endif
                          <span class="form-control-static">{{$flag_ut}}</span>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="tenant_id">{{trans('adminlte_lang::message.idtenant')}}:</label>
                      <div class="col-sm-8">
                          <span class="form-control-static">{{$user->tenant_id." ".$tenant->name}}</span>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="email">{{trans('adminlte_lang::message.email')}}:</label>
                      <div class="col-sm-8">
                          <span class="form-control-static">{{$user->email}}</span>
                      </div>
                    </div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="password">{{trans('adminlte_lang::message.password')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">**************</span>
    									</div>
  									</div><br/>
  									<h3>{{trans('adminlte_lang::message.titleRolesUser')}}</h3>
                    <div class="form-group">
                        <table id="rolesTable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>&nbsp;</th>
                              <th>{{ trans('adminlte_lang::message.name') }}</th>
                              <th>{{ trans('adminlte_lang::message.description') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($roles as $role)
                              @if ($user->isRole($role->slug))
                                <tr>
                                  <td>
                                    <input id="role_check" type="checkbox" checked="true" disabled>
                                  </td>
                                  <td>
                                    {{ $role->name }}
                                  </td>
                                  <td>
                                    <em>({{ $role->description }})</em>
                                  </td>
                                </tr>
                              @endif
                            @endforeach
                          </tbody>
                      </ul>
                    </div><br/>
	              </div>
              </table>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection

