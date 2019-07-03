@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.tenants') }}
@endsection

<?php use App\Http\Controllers\TenantController; 
$tenantControl = new TenantController; ?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.showtenant') }}</h3>
						<a href="{{url()->previous()}}" class="btn btn-warning btn-sm pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table class="table table-bordered table-striped" id="tenantsTable">
							 	<form class="form-horizontal">
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="id">ID:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenant->id}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.name')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenant->name}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.contact')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenant->contact}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.name_bd')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenant->name_bd}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.numusers')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenant->num_users}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.contract')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenant->num_contract}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.logoimg')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static"><img src="{{$tenant->logo_file}}" class="img-thumbnail" alt="Cinque Terre"></span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.logotxt')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenant->logo_txt}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.dateAct')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{date('d/m/Y', strtotime($tenant->date_start))}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.dateSusp')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{date('d/m/Y', strtotime($tenant->date_end))}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.dateCrea')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{date('d/m/Y', strtotime($tenant->creat_at))}}</span>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.status')}}:</label>
    									<div class="col-sm-8">
      										<span class="form-control-static">{{$tenantControl->showStatusName($tenant->id_status)}}</span>
    									</div>
  									</div><br/>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.modules')}}:</label>
                        <div class="col-sm-8">
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_cms" <?php if ($tenant->flag_cms) echo "checked" ?> disabled>{{ trans('adminlte_lang::message.moduleCms')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_enc" <?php if ($tenant->flag_enc) echo "checked" ?> disabled>{{ trans('adminlte_lang::message.moduleEnc')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_mail" <?php if ($tenant->flag_mail) echo "checked" ?> disabled>{{ trans('adminlte_lang::message.moduleMail')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_leal" <?php if ($tenant->flag_leal) echo "checked" ?> disabled>{{ trans('adminlte_lang::message.moduleLeal')  }} 
                          </div>

                        </div>
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

