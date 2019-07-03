@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.activities') }}
@endsection

<?php 

?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.editact') }}</h3>
						    
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
          <form name="form_create_contact" method="POST" action="{{ route('t02_contacts.update', $contact->id) }}" accept-charset="UTF-8" role="form">
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="contactTable">
							 	{{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="subject">{{trans('adminlte_lang::message.subject')}}:</label>
                      <div class="col-lg-6">
                          <input type="text" class="form-control" id="subject" name="subject" value="{{ $contact->subject }}" required>
                          <p class="errorSubject text-center alert alert-danger hidden"></p>
                      </div>
                      <div class="col-lg-4">
                          <div class="checkbox c-checkbox">
                              <input type="checkbox" value="1" name="flag_prog" class="needsclick" @if ($contact->flag_prog=='1') checked @endif > <label for="flag_prog">{{trans('adminlte_lang::message.programmed')}}</label>
                              <p class="errorFlagProg text-center alert alert-danger hidden"></p>
                          </div>
                      </div>
                    </div><br />
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_way">{{trans('adminlte_lang::message.way')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_way" name="id_way" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                            <option value="1" <?php if ($contact->id_way=='1') echo 'selected'; ?>>{{trans('adminlte_lang::message.incomming')}}</option>
                            <option value="2" <?php if ($contact->id_way=='2') echo 'selected'; ?>>{{trans('adminlte_lang::message.outgoing')}}</option>
                          </select>
                          <p class="errorIdWay text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="id_source">{{trans('adminlte_lang::message.source')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_source" name="id_source" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($listSources as $source)
                                <option value="{{$source->id}}" <?php if ($contact->id_way==$source->id) echo 'selected'; ?>>{{$source->name}}</option>
                              @endforeach     
                          </select>
                          <p class="errorIdSource text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_status">{{trans('adminlte_lang::message.status')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_status" name="id_status" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($listStatus as $status)
                                <option value="{{$status->id}}" <?php if ($contact->id_status==$status->id) echo 'selected'; ?>>{{$status->name}}</option>
                              @endforeach  
                             
                          </select>
                          <p class="errorIdStatus text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="id_result">{{trans('adminlte_lang::message.result')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_result" name="id_result" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                            @foreach ($listResults as $result)
                                <option value="{{$result->id}}" <?php if ($contact->id_result==$result->id) echo 'selected'; ?>>{{$result->name}}</option>
                            @endforeach      
                          </select>
                          <p class="errorIdResult text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="date">{{trans('adminlte_lang::message.date')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{ $contact->date }}" name="date" id="date" required>  
                          <p class="errorDate text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="time_ini">{{trans('adminlte_lang::message.timeini')}}:</label>
                      <div class="col-lg-4">
                          <input type="time" class="form-control" id="time_ini" name="time_ini" value="{{ $contact->time_ini}}">

                          <p class="errorTimeIni text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="time_fin">{{trans('adminlte_lang::message.timefin')}}:</label>
                      <div class="col-lg-4">
                          <input type="time" class="form-control" id="time_fin" name="time_fin" value="{{ $contact->time_fin}}">
                          <p class="errorTimeFin text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="duration_hr">{{trans('adminlte_lang::message.durationhr')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="duration_hr" name="duration_hr" value="{{ $contact->duration_hr}}">

                          <p class="errorDurHr text-center alert alert-danger hidden"></p>
                      </div>

                    </div><br />
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="duration_seg">{{trans('adminlte_lang::message.durationseg')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="duration_hr" name="duration_hr" value="{{ $contact->duration_sec}}">

                          <p class="errorDurSeg text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_lead">{{trans('adminlte_lang::message.lead')}}:</label>
                      <div class="col-lg-8">
                         <select class="form-control select_box" id="id_lead" name="id_lead" style="width: 70%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($listLeads as $lead)
                                <option value="{{$lead->id}}" <?php if ($contact->id_lead==$lead->id) echo 'selected'; ?>>{{$lead->name_lead." ".$lead->lastname_lead}}</option>
                              @endforeach  
                             
                          </select>
                          <p class="errorIdLead text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="desc_contact">{{trans('adminlte_lang::message.description')}}:</label>
                      <div class="col-lg-10">
                          <textarea id="desc_contact" name="desc_contact" style="width: 100%" class="form-control" value="{{ $contact->desc_contact }}">{{ $contact->desc_contact }}</textarea><p class="errorDesc text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br /> 
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="action">{{trans('adminlte_lang::message.actions')}}:</label>
                      <div class="col-lg-10">
                          <textarea id="action" name="action" style="width: 100%" class="form-control" value="{{ $contact->action }}">{{ $contact->action }}</textarea>

                          <p class="errorAction text-center alert alert-danger hidden"></p>
                      </div>
                      <input type="hidden" id="id_user" name="id_user" value="{{$user->id }}">
                          
                    </div><br /> 
               </table>
						</div>
					</div>
					<!-- /.box-body -->
          <div class="box-footer" align="right">
              <button type="submit" class="btn btn-primary create">
                  <span class='glyphicon glyphicon-check'></span> {{trans('adminlte_lang::message.savebtn')}}
              </button>&nbsp;&nbsp;
              <a href="{{url()->previous()}}" class="btn btn-warning btn-md pull-right"> {{ trans('adminlte_lang::message.back') }}</a>
          </div>
          </form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
  <script type="text/javascript" src="/js/script_contacts.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="/js/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

  <script type="text/javascript">
    
  </script>  
@endsection

