@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.locations') }}
@endsection

<?php use App\Http\Controllers\Iot_locationController; 
$locationControl = new Iot_locationController; ?>

@section('main-content')
	{{-- @include('locations.partials.import')--}}
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.locations') }}</h3>
							<button class="btn btn-warning btn-sm pull-right export" onclick="location.href = '{{ route('locations.export') }}'">
                  				<span class='glyphicon glyphicon-export'></span> {{trans('adminlte_lang::message.export')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="import-modal btn btn-success btn-sm pull-right importE">
                  				<span class='glyphicon glyphicon-import'></span> {{trans('adminlte_lang::message.importExcel')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="btn btn-primary btn-sm pull-right create"  onclick="location.href = '{{ route('locations.create') }}'">
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
										<h6>{{ trans('adminlte_lang::message.totalocations') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-yellow">
									<div class="box-body text-center">
										<h1><?php echo $counts[1]; ?></h1>
										<h6>{{ trans('adminlte_lang::message.withdevice') }}</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
						  	
						  	<table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">

								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.description') }}</th>
										<th>{{ trans('adminlte_lang::message.address') }}</th>
										<th>{{ trans('adminlte_lang::message.coordinates') }}</th>
										<th>{{ trans('adminlte_lang::message.radiusMts') }}</th>
										<th>{{ trans('adminlte_lang::message.dateAct') }}</th>
										<th>{{ trans('adminlte_lang::message.dateSusp') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach($locations as $location)
										<tr class="item{{$location->id}}">
											<td>{{ $location->id }}</td>
											<td>{{ $location->description }}</td>
											<td>{{ $location->address }}</td>
											<td>{{ $location->coordinates }}</td>
											<td>{{ $location->radius }}</td>
											<td>@if ($location->date_up!=NULL) 
												{{ date('d/m/Y', strtotime($location->date_up)) }}
											@endif</td>
											<td>@if ($location->date_down!=NULL) 
												{{ date('d/m/Y', strtotime($location->date_down)) }}
											@endif</td>
											<td width="15%">
												@can('locations.edit')
												<a href="{{ action('Iot_locationController@edit', ['id' => $location->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
												@endcan
												@can('locations.show')
												<a href="{{ action('Iot_locations_deviceController@showDevLoc', ['id' => $location->id]) }}" class="btn btn-success btn-xs" title="View/Assign Devices" data-toggle="tooltip" data-placement="top"><i class="fa fa-microchip"></i></a>
												@endcan
												@can('locations.destroy')
												<a href="{{ action('Iot_locationController@destroy', ['id' => $location->id]) }}" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
												@endcan
			                                </td>            
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $locations->render() }}
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
	<script type="text/javascript" src="js/script_locations.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
@endsection

