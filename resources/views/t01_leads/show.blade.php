@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.leads') }}
@endsection

<?php 

use App\Http\Controllers\TenantController;
use App\Continent; 
use App\Country;
use App\State;
use App\Citie;
$tenantControl = new TenantController;
$continent = new Continent;
$country = new Country; 
$state = new State;
$city = new Citie;
?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.showlead') }}</h3>
						    
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
          <form name="form_show_lead" method="POST" action="" role="form">
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="leadTable">
							 	{{ csrf_field() }}
                    
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_source">{{trans('adminlte_lang::message.source')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->showSourceName()}}</span>
                      </div>
                      <label class="control-label col-lg-2" for="id_status">{{trans('adminlte_lang::message.status')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->showStatusName()}}</span>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_branch">{{trans('adminlte_lang::message.branch')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->showBranchName()}}</span>
                      </div>
                      <label class="control-label col-lg-2" for="code_lead">{{trans('adminlte_lang::message.code')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->code_lead}}</span>
                      </div>
                      
                    </div><br/>
  									<div class="form-group">
                      <label class="control-label col-lg-2" for="name_lead">{{trans('adminlte_lang::message.name')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->name_lead}}</span>
                      </div>
    									<label class="control-label col-lg-2" for="lastname_lead">{{trans('adminlte_lang::message.lastname')}}:</label>
    									<div class="col-lg-4">
      										<span class="form-control-static">{{$lead->lastname_lead}}</span>
    									</div>                    
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="email_lead">{{trans('adminlte_lang::message.email2')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->email_lead}}</span>
                      </div>
                      <label class="control-label col-lg-2" for="birthdate_lead">{{trans('adminlte_lang::message.birthdate')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->birthdate_lead}}</span>
                      </div>                        
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="company">{{trans('adminlte_lang::message.company')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->company}}</span>
                      </div>  
                      <label class="control-label col-lg-2" for="rfc">{{trans('adminlte_lang::message.rfc')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->rfc}}</span>
                      </div>
                    </div><br/>
                    <!-- Sección de dir y tels -->
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="address_txt">{{trans('adminlte_lang::message.address')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->address_txt}}</span>
                      </div> 
                      <label class="control-label col-lg-2" for="country">{{trans('adminlte_lang::message.country')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{ $lead->country }}</span>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="state">{{trans('adminlte_lang::message.state')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->state}}</span>
                      </div>  
                      <label class="control-label col-lg-2" for="city">{{trans('adminlte_lang::message.city')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->city}}</span>
                      </div>
                    </div><br/>   
                    <div class="form-group"> 
                      <label class="control-label col-lg-2" for="phone_fix">{{trans('adminlte_lang::message.phonefix')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->phone_fix}}</span>
                      </div>  
                      <label class="control-label col-lg-2" for="phone_mobile">{{trans('adminlte_lang::message.phonemobile')}}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->phone_mobile}}</span>
                      </div>
                    </div><br/> 
                    <!-- Sección de redes sociales -->
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="facebook">Facebook:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->facebook}}</span>
                      </div> 
                      <div class="form-group">
                      <label class="control-label col-lg-2" for="twitter">Twitter:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->twitter}}</span>
                      </div>  
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="instagram">Instagram:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->instagram}}</span>
                      </div> 
                      <div class="form-group">
                      <label class="control-label col-lg-2" for="skype">Skype:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->skype}}</span>
                      </div>  
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="contact_lead">{{ trans('adminlte_lang::message.contact') }}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{ $lead->concact_lead }}</span>
                      </div> 
                      <div class="form-group">
                      <label class="control-label col-lg-2" for="obs_lead">{{ trans('adminlte_lang::message.obs') }}:</label>
                      <div class="col-lg-4">
                          <span class="form-control-static">{{$lead->obs_lead}}</span>
                      </div>  
                    </div><br/> 
                    <!-- Sección de asignación a usuarios -->
                    <br/><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="flag_owner">{{trans('adminlte_lang::message.assigned')}}:</label>
                      <div class="col-lg-4">
                        <fieldset class="controls">
                          <input name="flag_owner" type="radio" id="radio1" value="0" <?php if ($lead->flag_owner==0) echo "checked" ?> disabled>
                          <label for="radio_1">{{trans('adminlte_lang::message.everybody')}}</label>
                        </fieldset>
                        <fieldset>
                          <input name="flag_owner" type="radio" id="radio2" value="1" <?php if ($lead->flag_owner==1) echo "checked" ?> disabled>
                          <label for="radio_2">{{trans('adminlte_lang::message.someone')}}</label>                  
                        </fieldset>
               

                      </div>
                    </div><br/>
                    <div class="form-group" id="users_asigned">
                      <br/>
                      <label for="field-1" class="col-sm-2 control-label">{{trans('adminlte_lang::message.users')}}<span
                                    class="required">*</span></label>
                      </label>
                      <div class="col-lg-4">
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="assigned_to[]" class="needsclick" <?php if ($lead->isUserOwner(1)) echo "checked" ?> disabled>Admin Gral 
                              <strong class="btn-danger">admin-zwinny</strong>
                            </div>
                          @foreach($listUsers as $user)
                            <div class="checkbox c-checkbox">
                              <input type="checkbox" value="{{$user->id}}" name="assigned_to[]" class="needsclick" <?php if ($lead->isUserOwner($user->id)) echo "checked" ?> disabled>{{$user->name}} 
                              <strong class="btn-primary">{{$user->getFirstRoleName()}}</strong>
                            </div>
                          @endforeach
                      </div>
                    </div>
               </table>
						</div>
					</div>
					<!-- /.box-body -->
          <div class="box-footer" align="right">
              <a href="{{url()->previous()}}" class="btn btn-warning btn-md pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
          </div>
          </form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>

  <script type="text/javascript">

  $(document).ready(function () {
    $("#users_asigned").hide();
      if ($('#radio1').is(":checked")) {
          $("#users_asigned").hide();
      } else {
          $("#users_asigned").show();
      }
  });

  </script>  
@endsection

