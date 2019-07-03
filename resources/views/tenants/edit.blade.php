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
          <form name="form_edit_tenant" method="POST" action="{{ route('tenants.update',$tenant->id) }}" accept-charset="UTF-8" enctype="multipart/form-data"  role="form">
            {{ csrf_field() }}
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="tenantsTable">
                    <div class="form-group">
    									<label class="control-label col-sm-4" for="id">ID:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="id" value="{{$tenant->id}}" disabled>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.name')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="name" name="name" value="{{$tenant->name}}">
                          <p class="errorName text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="contact">{{trans('adminlte_lang::message.contact')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="contact" name="contact" value="{{$tenant->contact}}">
                          <p class="errorContact text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="name_bd">{{trans('adminlte_lang::message.name_bd')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="name_bd" name="name_bd" value="{{$tenant->name_bd}}">
                          <p class="errorNameBd text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="num_users">{{trans('adminlte_lang::message.numusers')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="num_users" name="num_users" value="{{$tenant->num_users}}">
                          <p class="errorNumUsers text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="num_contract">{{trans('adminlte_lang::message.contract')}}:</label>
    									<div class="col-sm-8">
      										<input type="text" class="form-control" id="num_contract" name="num_contract" value="{{$tenant->num_contract}}">
                          <p class="errorNumContract text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="logo_file">{{trans('adminlte_lang::message.logoimg')}}:</label>
                      <div class="col-sm-8">
                          @if ($tenant->logo_file!="")
                          <img src="{{$tenant->logo_file}}" class="img-thumbnail" alt="logo_file" width="80">
                          @endif 
                          <input type="file" name="logo_file" class="form-control" id="logo_file" value="{{$tenant->logo_file}}">
                          <p class="errorLogoFile text-center alert alert-danger hidden"></p> 
                      </div>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="logo_txt">{{trans('adminlte_lang::message.logotxt')}}:</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="logo_txt" name="logo_txt" value="{{$tenant->logo_txt}}">
                          <p class="errorLogoTxt text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
  									<div class="form-group">
    									<label class="control-label col-sm-4" for="date_start">{{trans('adminlte_lang::message.dateAct')}}:</label>
    									<div class="col-sm-8">
      										<div class="input-group">
                              <input type="text" name="date_start" id="date_start"
                               class="form-control datepicker"
                               value="{{date('d/m/Y', strtotime($tenant->date_start))}}"
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
                               value="{{date('d/m/Y', strtotime($tenant->date_end))}}"
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
                               value="{{date('d/m/Y', strtotime($tenant->created_at))}}"
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
                                <option value="{{$statustenant->id}}" <?php if ($statustenant->id==$tenant->id_status) echo 'selected'?>>{{$statustenant->name}}</option>
                              @endforeach    
                          </select>
                          <p class="errorIdStatus text-center alert alert-danger hidden"></p>
    									</div>
  									</div><br/>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">{{trans('adminlte_lang::message.modules')}}:</label>
                        <div class="col-sm-8">
                          
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="{{ $tenant->flag_cms }}" name="flag_cms" <?php if ($tenant->flag_cms) echo "checked" ?>>{{ trans('adminlte_lang::message.moduleCms')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="{{ $tenant->flag_enc }}" name="flag_enc" <?php if ($tenant->flag_enc) echo "checked" ?>>{{ trans('adminlte_lang::message.moduleEnc')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="{{ $tenant->flag_mail }}" name="flag_mail" <?php if ($tenant->flag_mail) echo "checked" ?>>{{ trans('adminlte_lang::message.moduleMail')  }} 
                          </div>
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="{{ $tenant->flag_leal }}" name="flag_leal" <?php if ($tenant->flag_leal) echo "checked" ?>>{{ trans('adminlte_lang::message.moduleLeal')  }} 
                          </div>

                        </div>
                    </div><br/>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
          <div class="box-footer" align="right">
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

