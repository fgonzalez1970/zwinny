@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.devices') }}
@endsection

<?php use App\Http\Controllers\Iot_dispositivoController; 
$deviceControl = new Iot_dispositivoController; ?>

@section('main-content')
	{{-- @include('devices.partials.import')--}}
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.devices') }}</h3>
							<button class="btn btn-warning btn-sm pull-right export" onclick="location.href = '{{ route('devices.export') }}'">
                  				<span class='glyphicon glyphicon-export'></span> {{trans('adminlte_lang::message.export')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="import-modal btn btn-success btn-sm pull-right importE">
                  				<span class='glyphicon glyphicon-import'></span> {{trans('adminlte_lang::message.importExcel')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="import-modal btn btn-orange btn-sm pull-right importK" style="background-color: #454C91; color:#FFF">
                  				<span class='glyphicon glyphicon-import'></span> {{trans('adminlte_lang::message.importKont')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="btn btn-primary btn-sm pull-right create"  onclick="location.href = '{{ route('devices.create') }}'">
                  				<span class='glyphicon glyphicon-plus'></span> {{trans('adminlte_lang::message.create')}}
              				</button>&nbsp;&nbsp;
					</div>
					<div class="box-body">
						@if ($message = Session::get('success'))
        				<div class="alert alert-success">
            				<p>{{ $message }}</p>
        				</div>
    					@endif
    					@if ($message = Session::get('error'))
        				<div class="alert alert-danger">
            				<p>{{ $message }}</p>
        				</div>
    					@endif
						<div class="row mb-30">
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-info">
									<div class="box-body text-center">
										<h1><?php echo $counts[0]; ?></h1>
										<h6>{{ trans('adminlte_lang::message.totaldevices') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-yellow">
									<div class="box-body text-center">
										<h1><?php echo $counts[1]; ?></h1>
										<h6>{{ trans('adminlte_lang::message.assigned') }}</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
						  	
						  	<table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">

								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.name') }}</th>
										<th>{{ trans('adminlte_lang::message.tagkontakt') }}</th>
										<th>{{ trans('adminlte_lang::message.uuid') }}</th>
										<th>{{ trans('adminlte_lang::message.type') }}</th>
										<th>{{ trans('adminlte_lang::message.subtype') }}</th>
										<th>{{ trans('adminlte_lang::message.dateAct') }}</th>
										<th>{{ trans('adminlte_lang::message.dateSusp') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($devices as $device)
										<tr class="item{{$device->id}}">
											<td>{{ $device->id }}</td>
											<td>{{ $device->name }}</td>
											<td>{{ $device->id_kontaktTag }}</td>
											<td>{{ $device->UUID }}</td>
											<td>{{ $deviceControl->showTypeName($device->id_tipo) }}</td>
											<td>{{ $deviceControl->showSubtypeName($device->id_subtipo) }}</td>
											<td>@if ($device->date_up!=NULL) 
												{{ date('d/m/Y', strtotime($device->date_up)) }}
											@endif</td>
											<td>@if ($device->date_down!=NULL) 
												{{ date('d/m/Y', strtotime($device->date_down)) }}
											@endif</td>
											<td width="15%">
												@can('devices.show')
													<a href="{{ action('Iot_dispositivoController@show', ['id' => $device->id]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><span class="fa fa-list-alt"></span></a>
												@endcan
												@can('devices.edit')
												<a href="{{ action('Iot_dispositivoController@edit', ['id' => $device->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
												@endcan
												@can('devices.destroy')
												<a href="{{ action('Iot_dispositivoController@destroy', ['id' => $device->id]) }}" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
												@endcan
			                                </td>            
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $devices->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
	<script type="text/javascript">

  $(document).ready(function () {
    $("#users_asigned").hide();
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
	<!-- jQuery scripts -->
	<script type="text/javascript" src="js/script_devices.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
@endsection

