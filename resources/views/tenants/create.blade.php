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
						<h3 class="box-title">{{ trans('adminlte_lang::message.edittenant') }}</h3>
						    
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
          <form name="form_create_tenant" method="POST" action="{{ route('tenants.store') }}" accept-charset="UTF-8" enctype="multipart/form-data"  role="form">
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="tenantsTable">

							 	{{ csrf_field() }}
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="id">ID:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="id" value="" disabled>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.name')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="name" name="name" value="">
                          <p class="errorName text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="contact">{{trans('adminlte_lang::message.contact')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="contact" name="contact" value="">
                          <p class="errorContact text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name_bd">{{trans('adminlte_lang::message.name_bd')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="name_bd" name="name_bd" value="">
                          <p class="errorNameBd text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="num_users">{{trans('adminlte_lang::message.numusers')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="num_users" name="num_users" value="">
                          <p class="errorNumUsers text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="num_contract">{{trans('adminlte_lang::message.contract')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="num_contract" name="num_contract" value="">
                          <p class="errorNumContract text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="logo_file">{{trans('adminlte_lang::message.logoimg')}}:</label>
                      <div class="col-sm-8">
                          @if ($tenant->logo_file!="")
                          <img src="{{$tenant->logo_file}}" class="img-thumbnail" alt="logo_file" width="80">
                          @endif 
                          <input type="file" name="logo_file" class="form-control" id="logo_file" value="">
                          <p class="errorLogoFile text-center alert alert-danger hidden"></p> 
                      </div>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="logo_txt">{{trans('adminlte_lang::message.logotxt')}}:</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="logo_txt" name="logo_txt" value="">
                          <p class="errorLogoTxt text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="date_start">{{trans('adminlte_lang::message.dateAct')}}:</label>
    									<div class="col-sm-8">
      										<div class="input-group">
                              <input type="text" name="date_start" id="date_start"
                               class="form-control datepicker"
                               value=""
                               data-date-format="dd-mm-yyyy">
                              <div class="input-group-addon">
                                 <a href="#"><i class="fa fa-calendar"></i></a>
                              </div>
                              <p class="errorDateStart text-center alert alert-danger hidden"></p>
                          </div>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="date_end">{{trans('adminlte_lang::message.dateSusp')}}:</label>
    									<div class="col-sm-8">
                          <div class="input-group">
                              <input type="text" name="date_end" id="date_end"
                               class="form-control datepicker"
                               value=""
                               data-date-format="dd-mm-yyyy">
                              <div class="input-group-addon">
                                 <a href="#"><i class="fa fa-calendar"></i></a>
                              </div>
                              <p class="errorDateEnd text-center alert alert-danger hidden"></p>
                          </div>
                      </div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="created_at">{{trans('adminlte_lang::message.dateCrea')}}:</label>
    									<div class="col-sm-8">
                          <div class="input-group">
                              <input type="text" name="created_at" id="created_at" class="form-control datepicker"
                               value=""
                               data-date-format="dd-mm-yyyy">
                              <div class="input-group-addon">
                                 <a href="#"><i class="fa fa-calendar"></i></a>
                              </div>
                              <p class="errorCreateAt text-center alert alert-danger hidden"></p>
                          </div>
                      </div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="id_status">{{trans('adminlte_lang::message.status')}}:</label>
    									<div class="col-sm-8">
                          <select class="form-control" id="id_status" name="id_status">
                              @foreach ($listStatus as $statustenant)
                                <option value="{{$statustenant->id}}">{{$statustenant->name}}</option>
                              @endforeach    
                          </select>
                          <p class="errorIdStatus text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
								    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.modules')}}:</label>
                        <div class="col-sm-8">
                          
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_cms">{{ trans('adminlte_lang::message.moduleCms')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_enc">{{ trans('adminlte_lang::message.moduleEnc')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_mail">{{ trans('adminlte_lang::message.moduleMail')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_leal">{{ trans('adminlte_lang::message.moduleLeal')  }} 
                          </div>
                        </div>
                    </div><br/>
              </table>
						</div>
					</div>
					<!-- /.box-body -->
          <div class="box-footer" align="right">
              <button type="submit" class="btn btn-primary create">
                  <span class='glyphicon glyphicon-check'></span> {{trans('adminlte_lang::message.save')}}
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

