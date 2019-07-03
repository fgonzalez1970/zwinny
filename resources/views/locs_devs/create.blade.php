@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.assignDevLoc') }}
@endsection

<?php
  use App\Http\Controllers\Iot_locations_deviceController;
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
          <form name="form_create_locdev" method="POST" action="{{ route('locs_devs.store') }}" accept-charset="UTF-8" role="form">
            @foreach ($locations as $location)
                <input type="hidden" name="coord_loc_{{ $location->id }}" id="coord_loc_{{ $location->id }}" value="{{$location->coordinates}}"/>
            @endforeach
					<div class="box-body">
						<div class="table-responsive">
						  <table class="table table-bordered table-striped" id="locationTable">
							 	{{ csrf_field() }}
                    <div class="form-group">
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
                          <p class="errorIdDev text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="id_location">{{trans('adminlte_lang::message.location')}}:</label>
                      <div class="col-lg-4">
                          <select class="form-control select_box" id="id_location" name="id_location" style="width: 100%" required>
                            <option value="">- Seleccione -</option>
                              @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->description}}</option>
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

  
  
    //cambiar el marker según la sel de localidad
    $("#id_location").change(function() {
        //ver la loc seleccionada y sacar sus coord
        var id = $("#id_location option:selected").val();
        //traemos el device elegido
        var device_txt = $("#id_device option:selected").text();
        //alert(device_txt);
        var varCord ="coord_loc_"+id;
        //alert(varCord);
        var coord = document.getElementById(varCord).value;
        //alert (coord);
        //borramos los markers que pudo haber antes
        deleteMarkers();
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
    });//change location

}//onload function

    
  </script>  
@endsection

