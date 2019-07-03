@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.devicesAssign') }}
@endsection

<?php use App\Http\Controllers\Iot_dispositivos_tenantController; 
$deviceTenantControl = new Iot_dispositivos_tenantController; ?>

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.devicesAssignTenant') }}</h3>
							<button type="button" class="btn btn-primary btn-sm pull-right create"  onclick="location.href = '{{ route('assignements.create') }}'">
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
										<h6>{{ trans('adminlte_lang::message.devicesActives') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-danger">
									<div class="box-body text-center">
										<h1><?php echo $counts[2]; ?></h1>
										<h6>{{ trans('adminlte_lang::message.devicesInactives') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-purple">
									<div class="box-body text-center">
										<h1><?php echo $counts[3]; ?></h1>
										<h6>{{ trans('adminlte_lang::message.devicesAssignLoc') }}</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
						  	
						  	<table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">

								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.device') }}</th>
										<th>{{ trans('adminlte_lang::message.dateAct') }}</th>
										<th>{{ trans('adminlte_lang::message.dateSusp') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach($devices_ten as $dev_ten)
										<tr class="item{{$dev_ten->id}}">
											<td>{{ $dev_ten->id }}</td>
											<td>{{ $deviceTenantControl->showDeviceName($dev_ten->id_dispositivo) }}</td>
											<td>@if ($dev_ten->date_up!=NULL) 
												{{ date('d/m/Y', strtotime($dev_ten->date_up)) }}
											@endif</td>
											<td>@if ($dev_ten->date_down!=NULL) 
												{{ date('d/m/Y', strtotime($dev_ten->date_down)) }}
											@endif</td>
											<td width="15%">
												@can('locations.show')
												<a href="{{ action('Iot_locations_deviceController@showLocDev', ['id' => $dev_ten->id_device]) }}" class="btn btn-info btn-xs" title="View/Assign Location" data-toggle="tooltip" data-placement="top"><i class="fa fa-map-marker"></i></a>
												@endcan
												
			                                </td>            
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $devices_ten->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
	<script type="text/javascript">
  	</script>  
	<!-- jQuery scripts -->
	<script type="text/javascript" src="js/script_assignements.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
@endsection

