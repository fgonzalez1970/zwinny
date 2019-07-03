@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.leads') }}
@endsection

<?php use App\Http\Controllers\T01_LeadController; 
$leadControl = new T01_LeadController; ?>

@section('main-content')
	@include('t01_leads.partials.add')
	@include('t01_leads.partials.edit')
	@include('t01_leads.partials.show')
	@include('t01_leads.partials.delete')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset1">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.leads') }}</h3>
						<button class="add-modal btn btn-info btn-sm pull-right">+ {{ trans('adminlte_lang::message.create') }}</button>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	
						  	<table id="leadsTable" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.name') }}</th>
										<th>{{ trans('adminlte_lang::message.lastname') }}</th>
										<th>{{ trans('adminlte_lang::message.email') }}</th>
										<th>{{ trans('adminlte_lang::message.phone') }}</th>
										<th>{{ trans('adminlte_lang::message.status') }}</th>
										<th>{{ trans('adminlte_lang::message.dateCrea') }}</th>
										<th>{{ trans('adminlte_lang::message.entity') }}</th>
										<th></th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($leads as $lead)
										<tr class="item{{$lead->id}}">
											<td>{{ $lead->id }}</td>
											<td>{{ $lead->nombre_lead }}</td>
											<td>{{ $lead->apellido_lead }}</td>
											<td>{{ $lead->email_lead }}</td>
											<td>{{ $lead->tel_lead }}</td>
											<td>{{ $leadControl->showStatusName($lead->id_status)}}</td>
											<td>@if ($lead->created_at!=NULL) 
												{{ date('d/m/Y', strtotime($lead->created_at)) }}
											@endif
											</td>
											<td>Es el origen del registro?</td>
											<td width="15%">
												@can('leads.show')
													<button value="{{ $lead->id }}" class="show-modal btn btn-success btn-xs" data-id="{{$lead->id}}"
  							data-nombre="{{$lead->nombre}}" data-apellido="{{$lead->apellido}}" data-email="{{$lead->email}}" data-status="{{$lead->id_status}}" data-creat_at="{{$lead->creat_at}}" data-entity="{{$lead->id_entity}}"><span class="glyphicon glyphicon-eye-open"></span></button>
												@endcan
												
												@can('leads.edit')
													<button value="{{ $lead->id }}" class="edit-modal btn btn-info btn-xs" data-id="{{$lead->id}}"
  							data-nombre="{{$lead->nombre}}" data-apellido="{{$lead->apellido}}" data-email="{{$lead->email}}" data-status="{{$lead->id_status}}" data-creat_at="{{$lead->creat_at}}" data-entity="{{$lead->id_entity}}"><span class="glyphicon glyphicon-pencil"></span></button>
													
												@endcan
												@can('leads.destroy')
	                                				<button value="{{ $lead->id }}" class="delete-modal btn btn-danger btn-xs" data-id="{{$lead->id}}"
  							data-nombre="{{$lead->nombre}}">
  													<span class="glyphicon glyphicon-trash"></span></button>
			                                    @endcan
			                                </td>            
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $leads->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
	<!-- jQuery scripts -->
	<script type="text/javascript" src="js/script_leads.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
@endsection

