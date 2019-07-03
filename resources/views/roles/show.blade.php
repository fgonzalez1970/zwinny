@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.roles') }}
@endsection

<?php use App\Http\Controllers\RoleController; 
$RoleControl = new RoleController; ?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.showRole') }}</h3>
						<a href="{{url()->previous()}}" class="btn btn-warning btn-sm pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table class="table table-bordered table-striped" id="rolesTable">
							 	<form class="form-horizontal">
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="id">ID:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$role->id}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.name')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$role->name}}</span>
    									</div>
  									</div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="description">{{trans('adminlte_lang::message.slug')}}:</label>
                      <div class="col-sm-8">
                          <span class="form-control-static">{{$role->slug}}</span>
                      </div>
                    </div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="description">{{trans('adminlte_lang::message.description')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$role->description}}</span>
    									</div>
  									</div><br/>
  									<h3>Lista de permisos</h3>
                    <div class="form-group">
                        <table id="permissionTable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>&nbsp;</th>
                              <th>{{ trans('adminlte_lang::message.name') }}</th>
                              <th>{{ trans('adminlte_lang::message.description') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($permissions as $permission)
                              <tr>
                                <td>
                                  <label>
                                    <input id="perm_check" type="checkbox" checked="true" disabled>
                                </td>
                                <td>
                                    {{ $permission->name }}
                                    
                                </td>
                                <td>
                                    <em>({{ $permission->description }})</em>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </ul>
                    </div><br/>
								</form>
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

