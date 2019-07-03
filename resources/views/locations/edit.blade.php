@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.locations') }}
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
            <h3 class="box-title">{{ trans('adminlte_lang::message.editlocation') }}</h3>
                
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
            <div id="mensaje">
            </div>
          <form name="form_edit_location" method="POST" action="{{ route('locations.update', $location->id) }}" accept-charset="UTF-8" role="form">
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="locationTable">
                {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="id">ID:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="id" name="id" value="{{ $location->id }}" disabled>
                      </div>
                    </div><br/>
                    <div class="form-group">
                       <label class="control-label col-lg-2" for="description">{{trans('adminlte_lang::message.description')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="description" name="description" value="{{ $location->description }}">
                          <p class="errorDescrip text-center alert alert-danger hidden"></p>   
                      </div>
                      <label class="control-label col-lg-2" for="address">{{trans('adminlte_lang::message.address')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="address" name="address" value="{{ $location->address }}" required>
                          <p class="errorAddress text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="coordinates">{{trans('adminlte_lang::message.coordinates')}}:</label>
                      <div class="col-lg-4">
                          <input type="text" class="form-control" id="coordinates" name="coordinates" value="{{ $location->coordinates }}" required>
                          <p class="errorCoord text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="radius">{{trans('adminlte_lang::message.radiusMts')}}:</label>
                      <div class="col-lg-4">
                          <input type="number" step="0.01" class="form-control" id="radius" name="radius" value="{{ $location->radius }}" required>
                          <p class="errorRadius text-center alert alert-danger hidden"></p>
                      </div>          
                    </div><br/>
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="date_up">{{trans('adminlte_lang::message.dateAct')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{ ($location->date_up!="")?date('Y-m-d', strtotime($location->date_up)):""}}" name="date_up" id="date_up" required>   
                          <p class="errorDateUp text-center alert alert-danger hidden"></p>
                      </div>
                      <label class="control-label col-lg-2" for="date_down">{{trans('adminlte_lang::message.dateSusp')}}:</label>
                      <div class="col-lg-4">
                          <input class="form-control" type="date" value="{{ ($location->date_down!="")?date('Y-m-d', strtotime($location->date_down)):""}}" name="date_down" id="date_down"> <p class="errorDateDown text-center alert alert-danger hidden"></p>
                      </div>
                    </div><br />
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
  <script type="text/javascript" src="/js/script_locations.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="/js/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ getenv('GMAPS_APIKEY') }}&language=es"></script>
  <script>
     var map;
    var geocoder;
    var infoWindow;
    var marker;

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

  // Try HTML5 geolocation.
        if (navigator.geolocation) {
          //alert("geo");
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            //poner un marcador

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            //alert("error");
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
  
    //captar el click en el mapa
    google.maps.event.addListener(map, 'click', function (event) {
    geocoder.geocode({
      'latLng': event.latLng
    }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          document.getElementById('address').value = results[0].formatted_address;
          document.getElementById('coordinates').value = results[0].geometry.location;
          //marker = new google.maps.Marker({
                //position: event.latLng,
                //title: results[0].formatted_address
            //});

          if (marker) {
            marker.setPosition(event.latLng)
          } else {
            //alert("mark");
            marker = new google.maps.Marker({
              position: event.latLng,
              map: map,
              title: results[0].formatted_address
            })
          }
          infoWindow.setContent(results[0].formatted_address + '<br/> Coordenadas: ' + results[0].geometry.location);
          infoWindow.open(map, marker)
        } else {
          document.getElementById('mensaje').innerHTML = 'No se encontraron resultados'
        }
      } else {
        document.getElementById('mensaje').innerHTML = 'Geocodificación  ha fallado debido a: ' + status
      }
    });
  });
}//onload function
  </script>
@endsection

