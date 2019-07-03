@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.users') }}
@endsection

<?php use App\Http\Controllers\userController; 
$userControl = new userController; ?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.edituser') }}</h3>
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
          <form name="form_edit_user" method="POST" action="{{ route('users_ten.update', $user) }}" accept-charset="UTF-8"  user="form">
            {{ csrf_field() }}
					  <div class="box-body">
						  <div class="table-responsive">
						  	
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="id">ID</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="id" value="{{$user->id}}" disabled>
    									</div>
  									</div><br/>
                    <div class="form-group">
                      <div class="col-sm-4">
                        {{ Form::label('name', trans('adminlte_lang::message.name')) }}
                      </div>
                      <div class="col-sm-8">
                          {{ Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'name']) }}
                          <p class="errorName text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4">{{trans('adminlte_lang::message.usertemp')}}:</label>
                      <div class="col-sm-8">
                          @php ($flag_ut1 = false)
                          @php ($flag_ut2 = false)
                          
                          @if ($user->user_temp=='1') 
                            @php ($flag_ut1=true)
                            @php ($flag_ut2=false)
                          @else
                            @php ($flag_ut1=false)
                            @php ($flag_ut2=true)
                          @endif
                          {{ Form::radio('user_temp', '1', $flag_ut1)}} Sí
                          {{ Form::radio('user_temp', '0', $flag_ut2) }} No
                          
                          <p class="errorName text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="tenant_id">{{trans('adminlte_lang::message.idtenant')}}:</label>
                      <div class="col-sm-8">
                         <select class="form-control" id="tenant_id" name="tenant_id">
                              <option value="{{ $tenant->id }}" selected>{{$tenant->id."-".$tenant->name}}</option>    
                          </select>
                          <p class="errorName text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <div class="col-sm-4">
                        {{ Form::label('email', trans('adminlte_lang::message.email')) }}
                      </div>
                      <div class="col-sm-8">
                          {{ Form::text('email', $user->email, ['class' => 'form-control', 'id' => 'email']) }}
                          <p class="errorEmail text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <div class="col-sm-4">
                        {{ Form::label('password', trans('adminlte_lang::message.password')) }}
                      </div>
                      <div class="col-sm-8">
                          {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                          <p class="errorPswd text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <table id="rolesTable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th colspan="3">{{ trans('adminlte_lang::message.roleslist') }}</th>
                            </tr>
                            <tr>
                              <th>&nbsp;</th>
                              <th>{{ trans('adminlte_lang::message.name') }}</th>
                              <th>{{ trans('adminlte_lang::message.description') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($roles as $role)
                              <tr>
                                <td>
                                    @php ($flag_role=false)
                                    @if ($user->isRole($role->slug))
                                      @php ($flag_role=true)
                                    @endif 
                                  {{ Form::checkbox('roles[]', $role->id, $flag_role)}}
                                  </td>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    <em>({{ $role->description }})</em>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div><br/>
						  </div>
					  </div>       
					<!-- /.box-body -->
          <div class="box-footer with-border" align="right">
              <button type="submit" class="btn btn-primary edit">
                  <span class='glyphicon glyphicon-check'></span> {{trans('adminlte_lang::message.savechbtn')}}
              </button>&nbsp;&nbsp;
              <a href="{{url()->previous()}}" class="btn btn-warning btn-md pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
          </div>
        </form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection

