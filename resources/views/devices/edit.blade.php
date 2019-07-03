@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.devices') }}
@endsection

<?php 
  $hoy = date('Y-m-d');
?>

@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-12 col-md-offset1">
        <!-- Default box -->
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">{{ trans('adminlte_lang::message.editdevice') }}</h3>
                
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
          <form name="form_edit_device" method="POST" action="{{ route('devices.update', $device->id) }}" accept-charset="UTF-8" role="form">
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="deviceTable">
                {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id">ID:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="id" name="id" value="{{ $device->id }}" disabled>
                      </div>
                       <label class="control-label col-lg-2" for="name">{{trans('adminlte_lang::message.name')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="name" name="name" value="{{ $device->name }}">
                          <p class="errorName text-center alert alert-danger hidden"></p>
                      </div>        
                    </div><br/>
                    <div class="form-group">
                      <div class="form-group">
                      <label class="control-label col-lg-2" for="id_tipo">{{trans('adminlte_lang::message.type')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_tipo" name="id_tipo" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($listTypes as $type)
                                <option value="{{$type->id}}" <?php if ($device->id_tipo==$type->id) echo 'selected'; ?>>{{$type->name}}</option>
                              @endforeach    
                          </select>
                          <p class="errorIdTipo text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="id_subtipo">{{trans('adminlte_lang::message.subtype')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_subtipo" name="id_subtipo" style="width: 100%" required>
                            @foreach ($listSubtypes as $subtype)
                                <option value="{{$subtype->id}}" <?php if ($device->id_subtipo==$subtype->id) echo 'selected'; ?>>{{$subtype->name}}</option>
                              @endforeach  
                          </select>
                          <p class="errorIdSubtipo text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id_kontakTag">{{trans('adminlte_lang::message.tagkontakt')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="id_kontaktTag" name="id_kontaktTag" value="{{ $device->id_kontaktTag }}">
                          <p class="errorIdKontakt text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="UUID">{{trans('adminlte_lang::message.uuid')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="UUID" name="UUID" value="{{ $device->UUID }}">
                          <p class="errorUUID text-center alert alert-danger hidden"></p>
                      </div>                    
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="date_up">{{trans('adminlte_lang::message.dateAct')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{date('Y-m-d', strtotime($device->date_up))}}" name="date_up" id="date_up" required>   
                          <p class="errorDateUp text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="date_down">{{trans('adminlte_lang::message.dateSusp')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{date('Y-m-d', strtotime($device->date_down))}}" name="date_down" id="date_down"> <p class="errorDateDown text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
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
  <script type="text/javascript" src="/js/script_devices.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="/js/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script type="text/javascript">

  </script>  
@endsection

