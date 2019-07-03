@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.assignDevLoc') }}
@endsection

<?php
  use App\Http\Controllers\Iot_locations_deviceController;
  use App\Iot_dispositivo;
  $dev = new Iot_dispositivo;
  $dev_loc = new Iot_locations_deviceController;
  $hoy = date('Y-m-d');
  $APIKEY = getenv('GMAPS_APIKEY');

?>
<style type="text/css">
#mapa{width:100%;height:60%;float:right;}
</style>
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset1">
				<!-- Default box -->
				<div class="box">
    
					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.createAssignDevLoc') }}</h3>
						    
					</div>
           @if (count($errors) > 0)
           <div class="alert alert-danger">
            <strong>{{ trans('adminlte_lang::message.error') }}!</strong> {{ trans('adminlte_lang::message.errorlist') }}.<br>
            <br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <div id="mensaje">
            </div>
          <form name="form_locdev" method="POST" action="{{ route('locs_devs.store') }}" accept-charset="UTF-8" role="form">
            <input type="hidden" name="var_coord" id="var_coord" value="{{$location->coordinates}}"/>
            <input type="hidden" name="id_location" id="id_location" value="{{$location->id}}"/>
					<div class="box-body">
            <div class="table-responsive">
                <table id="table_locs_devs" class="table mt-0 table-hover no-wrap">
                <thead>
                  <tr>
                    <th colspan="4" style="background-color: #0866A7; color: #fff">{{ trans('adminlte_lang::message.deviceAssignedToLocation') }}</th>
                  </tr>
                  <tr>
                    <th>ID</th>
                    <th>{{ trans('adminlte_lang::message.device') }}</th>
                    <th>{{ trans('adminlte_lang::message.dateAct') }}</th>
                    <th>{{ trans('adminlte_lang::message.dateSusp') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($locs_devs as $loc_dev)
                    <tr class="item{{$loc_dev->id}}">
                      <td>{{ $loc_dev->id }}</td>
                      <td>{{ $dev->getNameById($loc_dev->id_device) }}</td>
                      <td>@if ($loc_dev->date_up!=NULL) 
                        {{ date('d/m/Y', strtotime($loc_dev->date_up)) }}
                      @endif</td>
                      <td>@if ($loc_dev->date_down!=NULL) 
                        {{ date('d/m/Y', strtotime($loc_dev->date_down)) }}
                      @endif</td>            
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="locationTable">
							 	{{ csrf_field() }}
                    <div style="background-color: #3CFAF8">{{trans('adminlte_lang::message.deviceNewAssign')}}</div>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="name">{{trans('adminlte_lang::message.location')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="txt_location" name="txt_location" value="{{ $location->description }}" disabled>
                      </div>
                      <label class="control-label col-lg-2" for="id_device">{{trans('adminlte_lang::message.device')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_device" name="id_device" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($devices_ten as $device)
                                @if (!$dev_loc->hasValidAssigned($device->id_dispositivo))
                                <option value="{{$device->id_dispositivo}}">{{$device->name}}</option>
                                @endif
                              @endforeach    
                          </select>
                          <p class="errorIdLoc text-center alert alert-danger hidden"></p>
                      </div>   
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="date_up">{{trans('adminlte_lang::message.dateAct')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{ $hoy }}" name="date_up" id="date_up" required>   
                          <p class="errorDateUp text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="date_down">{{trans('adminlte_lang::message.dateSusp')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="" name="date_down" id="date_down" required> 
                          <p class="errorDateDown text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br><br>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div id="mapa"></div>
                        </div>             
                    </div><br/>
                 
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
  <script type="text/javascript" src="/js/script_locs_devs.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="/js/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ getenv('GMAPS_APIKEY') }}&language=es"></script>
  <script type="text/javascript">
    var map;
    var geocoder;
    var infoWindow;
    var marker;
    var markers = [];

      // Adds a marker to the map and push to the array.
      function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }
window.onload = function () {
  //alert("onload");
  var latLng = new google.maps.LatLng(20.6539812,-103.4222798);
  //alert("latlng"+latLng);
  var opciones = {
    center: latLng,
    zoom: 8,
    mapTypeId: 'roadmap'
  };
  
  var map = new google.maps.Map(document.getElementById('mapa'), opciones);
  
  geocoder = new google.maps.Geocoder();
  infoWindow = new google.maps.InfoWindow();

  
  
    //poner el marker según la sel de localidad
        //ver la loc seleccionada y sacar sus coord
        var id_location = $("#id_location").val();
        var coord = $("#var_coord").val();
        //traemos el device elegido
        var device_txt = $("#id_device option:selected").text();
        //creamos el marker según la loc
        var input = coord.replace('(', '');
        var latlngStr = input.split(",", 2);
        var lat = parseFloat(latlngStr[0]);
        var lng = parseFloat(latlngStr[1]);
        var parsedPosition = new google.maps.LatLng(lat, lng);
        //addMarker(parsedPosition);
        var marker = new google.maps.Marker({
              position: new google.maps.LatLng(lat,lng),
              map: map,
              title: device_txt
        });
        //lo metemos en el arreglo
        markers.push(marker);

}//onload function

    
  </script>  
@endsection

