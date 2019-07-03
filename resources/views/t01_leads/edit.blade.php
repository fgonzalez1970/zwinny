@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.leads') }}
@endsection

<?php 

use App\Http\Controllers\TenantController; 
$tenantControl = new TenantController; ?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.editlead') }}</h3>
						    
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
          <form name="form_edit_lead" method="POST" action="{{ route('t01_leads.update', $lead->id) }}" accept-charset="UTF-8" enctype="multipart/form-data"  role="form">
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="leadTable">
							 	{{ csrf_field() }}
                    
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_source">{{trans('adminlte_lang::message.source')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_source" name="id_source" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($listSources as $source)
                                <option value="{{$source->id}}" <?php if ($lead->id_source==$source->id) echo 'selected'; ?>>{{$source->name}}</option>
                              @endforeach    
                          </select>

                          <p class="errorIdSource text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="id_status">{{trans('adminlte_lang::message.status')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_status" name="id_status" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($listStatus as $status)
                                <option value="{{$status->id}}" <?php if ($lead->id_status==$status->id) echo 'selected'; ?>>{{$status->name}}</option>
                              @endforeach    
                          </select>
                          
                          <p class="errorIdSource text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_branch">{{trans('adminlte_lang::message.branch')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_branch" name="id_branch" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($listBranches as $branch)
                                <option value="{{$branch->id}}" <?php if ($lead->id_branch==$branch->id) echo 'selected'; ?>>{{$branch->name}}</option>
                              @endforeach    
                          </select>

                          <p class="errorIdStatus text-center alert alert-danger hidden"></p>
                          <input type="hidden" id="last_status" name="last_status" value="{{ $lead->id_status }}">
                      </div>
                      <label class="control-label col-lg-2" for="code_lead">{{trans('adminlte_lang::message.code')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="code_lead" name="code_lead" value="{{ $lead->code_lead }}">
                          <p class="errorCode text-center alert alert-danger hidden"></p>
                      </div>
                      
                    </div><br/>
  									<div class="form-group">
                      <label class="control-label col-lg-2" for="name_lead">{{trans('adminlte_lang::message.name')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="name_lead" name="name_lead" value="{{ $lead->name_lead }}" required>
                          <p class="errorName text-center alert alert-danger hidden"></p>
                      </div>
    									<label class="control-label col-lg-2" for="lastname_lead">{{trans('adminlte_lang::message.lastname')}}:</label>
    									<div class="col-lg-4">
      										<input type="text" class="form-control" id="lastname_lead" name="lastname_lead" value="{{ $lead->lastname_lead }}" required>
                          <p class="errorLastName text-center alert alert-danger hidden"></p>
    									</div>                    
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="email_lead">{{trans('adminlte_lang::message.email2')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="email_lead" name="email_lead" value="{{ $lead->email_lead }}" required>
                          <p class="errorEmail text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="birthdate_lead">{{trans('adminlte_lang::message.birthdate')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{ $lead->birthdate_lead }}" name="birthdate_lead" id="birthdate_lead">        
                          <p class="errorBirthdate text-center alert alert-danger hidden"></p>
                      </div>                        
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="company">{{trans('adminlte_lang::message.company')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="company" name="company" value="{{ $lead->company }}">
                          <p class="errorCompany text-center alert alert-danger hidden"></p>
                      </div>  
                      <label class="control-label col-lg-2" for="rfc">{{trans('adminlte_lang::message.rfc')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="rfc" name="rfc" value="{{ $lead->rfc }}">       
                          <p class="errorRfc text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="address_txt">{{trans('adminlte_lang::message.address')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="address_txt" name="address_txt" value="{{ $lead->address_txt }}">
                          <p class="errorAddressTxt text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="country">{{trans('adminlte_lang::message.country')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="country" name="country" value="{{ $lead->country }}">
                          <p class="errorCountry text-center alert alert-danger hidden"></p>
                      </div>
                       
                    </div><br/> 
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="state">{{trans('adminlte_lang::message.state')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="state" name="state" value="{{ $lead->state }}">
                          <p class="errorStatetext-center alert alert-danger hidden"></p>
                      </div>  
                      <label class="control-label col-lg-2" for="city">{{trans('adminlte_lang::message.city')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="city" name="city" value="{{ $lead->city }}">
                          <p class="errorCity text-center alert alert-danger hidden"></p>
                      </div>  
                    </div><br/>  
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="phone_fix">{{trans('adminlte_lang::message.phonefix')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="phone_fix" name="phone_fix" value="{{ $lead->phone_fix }}">
                          <p class="errorPhoneFix text-center alert alert-danger hidden"></p>
                      </div>  
                      <label class="control-label col-lg-2" for="phone_mobile">{{trans('adminlte_lang::message.phonemobile')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="phone_mobile" name="phone_mobile" value="{{ $lead->phone_mobile }}">       
                          <p class="errorPhoneMobile text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="facebook">Facebook:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $lead->facebook }}">
                          <p class="errorFacebook text-center alert alert-danger hidden"></p>
                      </div>  
                      <label class="control-label col-lg-2" for="twitter">Twitter:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $lead->twitter }}">       
                          <p class="errorTwitter text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="instagram">Instagram:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $lead->instagram }}">
                          <p class="errorInstagram text-center alert alert-danger hidden"></p>
                      </div>  
                      <label class="control-label col-lg-2" for="skype">Skype:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="skype" name="skype" value="{{ $lead->skype }}">       
                          <p class="errorSkype text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>   
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="contact_lead">{{trans('adminlte_lang::message.contact')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="contact_lead" name="contact_lead" value="{{ $lead->contact_lead }}">
                          <p class="errorContact text-center alert alert-danger hidden"></p>
                      </div>  
                      <label class="control-label col-lg-2" for="obs_lead">{{trans('adminlte_lang::message.obs')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="obs_lead" name="obs_lead" value="{{ $lead->obs_lead }}">
                          <p class="errorObs text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <br/><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="flag_owner">{{trans('adminlte_lang::message.assigned')}}:</label>
                      <div class="col-lg-4">
                        <fieldset class="controls">
                          <input name="flag_owner" type="radio" id="radio1" value="0" <?php if ($lead->flag_owner=='0') echo "checked" ?> required>
                          <label for="radio_1">{{trans('adminlte_lang::message.everybody')}}</label>
                        </fieldset>
                        <fieldset>
                          <input name="flag_owner" type="radio" id="radio2" value="1" <?php if ($lead->flag_owner=='1') echo "checked" ?>>
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
                              <input type="checkbox" value="1" name="assigned_to[]" class="needsclick" <?php if ($lead->isUserOwner(1)) echo "checked" ?>>Admin Gral 
                              <strong class="btn-danger">admin-zwinny</strong>
                            </div>
                          @foreach($listUsers as $user)
                            <div class="checkbox c-checkbox">
                              <input type="checkbox" value="{{$user->id}}" name="assigned_to[]" class="needsclick" <?php if ($lead->isUserOwner($user->id)) echo "checked" ?>>{{$user->name}} 
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
              <button type="submit" class="btn btn-primary create">
                  <span class='glyphicon glyphicon-check'></span> {{trans('adminlte_lang::message.savebtn')}}
              </button>&nbsp;&nbsp;
              <a href="{{url()->previous()}}" class="btn btn-warning btn-md pull-right"> {{ trans('adminlte_lang::message.cancel') }}</a>
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
  
    $('#radio1').click(function() {
      //alert("aqui");
      if ($('#radio1').attr("value") == "0") {
          $("#users_asigned").hide();
      } else {
          $("#users_asigned").show();
      }
    });

    $('#radio2').click(function() {
      //alert("aqui");
      if ($('#radio2').attr("value") == "1") {
          $("#users_asigned").show();
      } else {
          $("#users_asigned").hide();
      }
    });
  });
  </script>  
@endsection

