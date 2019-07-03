@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.tenants') }}
@endsection

<?php use App\Http\Controllers\TenantController; 
$tenantControl = new TenantController; ?>

@section('main-content')
	@include('tenants.partials.delete')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.tenants') }}</h3>
						<button class="add-modal btn btn-info btn-sm pull-right">+ {{ trans('adminlte_lang::message.create') }}</button>
					</div>
					<div class="box-body">
						@if ($message = Session::get('success'))
        				<div class="alert alert-success">
            				<p>{{ $message }}</p>
        				</div>
    					@endif
						<div class="table-responsive">
						  	<table class="table table-bordered table-striped" id="tenantsTable">
								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.name') }}</th>
										<th>{{ trans('adminlte_lang::message.contact') }}</th>
										<th>{{ trans('adminlte_lang::message.name_bd') }}</th>
										<th>{{ trans('adminlte_lang::message.status') }}</th>
										<th>{{ trans('adminlte_lang::message.dateCrea') }}</th>
										<th>{{ trans('adminlte_lang::message.dateAct') }}</th>
										<th>{{ trans('adminlte_lang::message.dateSusp') }}</th>
										<th></th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($tenants as $tenant)
										<tr class="item{{$tenant->id}}">
											<td>{{ $tenant->id }}</td>
											<td>{{ $tenant->name }}</td>
											<td>{{ $tenant->contact }}</td>
											<td>{{ $tenant->name_bd }}</td>
											<td>{{ $tenantControl->showStatusName($tenant->id_status)}}</td>
											<td>@if ($tenant->created_at!=NULL) 
												{{ date('d/m/Y', strtotime($tenant->created_at)) }}
											@endif
											</td>

											<td>@if ($tenant->date_start!=NULL) 
												{{ date('d/m/Y', strtotime($tenant->date_start)) }}
											@endif
											</td>
											<td>@if ($tenant->date_end!=NULL) 
												{{ date('d/m/Y', strtotime($tenant->date_end)) }}
											@endif
											</td>
											<td width="15%">
												@can('tenants.show')
													<a href="{{ action('TenantController@show', ['id' => $tenant->id]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><span class="fa fa-list-alt"></span></a>
												@endcan
												@can('tenants.edit')
												<a href="{{ action('TenantController@edit', ['id' => $tenant->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
												@endcan
												@can('tenants.delete')
												<a href="#" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
												@endcan
			                                </td>            
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $tenants->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
	<!-- jQuery scripts -->
	<script type="text/javascript" src="js/script_tenants.js"></script>    
@endsection

