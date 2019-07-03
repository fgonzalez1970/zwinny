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
						<h3 class="box-title">{{ trans('adminlte_lang::message.createRole') }}</h3>
						<a href="{{url()->previous()}}" class="btn btn-warning btn-sm pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
					</div>
          @if (count($errors) > 0)
           <div class="alert alert-danger">
            <strong>{{ trans('adminlte_lang::message.error') }}!</strong> {{ trans('adminlte_lang::message.errorlist') }}.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
          @endif
          <form name="form_create_role" method="POST" action="{{ route('roles.store') }}" accept-charset="UTF-8"  role="form">
            {{ csrf_field() }}
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="rolesTable">
  							     <div class="form-group">
                      <div class="col-sm-4">
                        {{ Form::label('name', trans('adminlte_lang::message.name')) }}
                      </div>
    									<div class="col-sm-8">
      										{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                          <p class="errorName text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
                    <div class="form-group">
                      <div class="col-sm-4">
                        {{ Form::label('name', trans('adminlte_lang::message.slug')) }}
                      </div>
                      <div class="col-sm-8">
                          {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
                          <p class="errorSlug text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
  									<div class="form-group">
                      <div class="col-sm-4">
                        {{ Form::label('description', trans('adminlte_lang::message.description')) }}
                      </div>
                      <div class="col-sm-8">
                          {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
                          <p class="errorDesc text-center alert alert-danger hidden"></p>
                      </div>
  									</div><br/>
  									<div class="form-group">
                      <table id="permissionTable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th colspan="3">{{ trans('adminlte_lang::message.permissionslist') }}</th>
                            </tr>
                            <tr>
                              <th colspan="3">
                                {{ Form::checkbox('special', 'all-access', false,['id' => 'special'])}}
                                {{ trans('adminlte_lang::message.allaccess') }}
                              </th>
                            </tr>
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
                                    {{ Form::checkbox('perm_check[]', $permission->id, false)}}
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
                      </table>
                    </div><br/>
              </table>
						</div>
					</div>
					<!-- /.box-body -->
          <div class="box-footer" align="right">
              <button type="submit" class="btn btn-primary btn-sm edit">
                  <span class='glyphicon glyphicon-check'></span> {{trans('adminlte_lang::message.savebtn')}}
              </button>&nbsp;&nbsp;
              <a href="{{url()->previous()}}" class="btn btn-warning btn-sm pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
          </div>
				</div>
        </form>
				<!-- /.box -->
			</div>
		</div>
	</div>
  <!-- jQuery scripts -->
  <script type="text/javascript" src="/js/script_roles.js"></script>  
@endsection

