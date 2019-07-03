@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.assignDevLoc') }}
@endsection

<?php 
use App\Http\Controllers\Iot_locationController;
use App\Iot_dispositivo;
use App\Iot_location;
$dev = new Iot_dispositivo;
$loc = new Iot_location;
$locationControl = new Iot_locationController; ?>

@section('main-content')
	{{-- @include('locations.partials.import')--}}
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.assignDevLoc') }}</h3>
							<button type="button" class="btn btn-primary btn-sm pull-right create"  onclick="location.href = '{{ route('locs_devs.create') }}'">
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
										<h6>{{ trans('adminlte_lang::message.totalassign') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-success">
									<div class="box-body text-center">
										<h1><?php echo $counts[1]; ?></h1>
										<h6>{{ trans('adminlte_lang::message.assignActives') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-danger">
									<div class="box-body text-center">
										<h1><?php echo $counts[2]; ?></h1>
										<h6>{{ trans('adminlte_lang::message.assignInactives') }}</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
						  	<table id="table_locs_devs" class="table mt-0 table-hover no-wrap" data-page-size="10">

								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.device') }}</th>
										<th>{{ trans('adminlte_lang::message.location') }}</th>
										<th>{{ trans('adminlte_lang::message.dateAct') }}</th>
										<th>{{ trans('adminlte_lang::message.dateSusp') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach($locs_devs as $loc_dev)
										<tr class="item{{$loc_dev->id}}">
											<td>{{ $loc_dev->id }}</td>
											<td>{{ $dev->getNameById($loc_dev->id_device) }}</td>
											<td>{{ $loc->getDescById($loc_dev->id_location) }}</td>
											<td>@if ($loc_dev->date_up!=NULL) 
												{{ date('d/m/Y', strtotime($loc_dev->date_up)) }}
											@endif</td>
											<td>@if ($loc_dev->date_down!=NULL) 
												{{ date('d/m/Y', strtotime($loc_dev->date_down)) }}
											@endif</td>
											<td width="15%">
												@can('locs_devs.edit')
												<a href="{{ action('Iot_locationController@edit', ['id' => $location->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
												@endcan
												@can('locations.destroy')
												<a href="{{ action('Iot_locations_deviceController@destroy', ['id' => $loc_dev->id]) }}" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
												@endcan
			                                </td>            
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $locs_devs->render() }}
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

