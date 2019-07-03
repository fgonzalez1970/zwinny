@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.leads') }}
@endsection

<?php use App\Http\Controllers\T01_LeadController; 
$leadControl = new T01_LeadController; ?>

@section('main-content')
	@include('t01_leads.partials.import')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<div class="box">

					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.leads') }}</h3>
							<button class="btn btn-warning btn-sm pull-right export" onclick="location.href = '{{ route('t01_leads.export') }}'">
                  				<span class='glyphicon glyphicon-export'></span> {{trans('adminlte_lang::message.export')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="import-modal btn btn-success btn-sm pull-right import">
                  				<span class='glyphicon glyphicon-import'></span> {{trans('adminlte_lang::message.import')}}
              				</button>&nbsp;&nbsp;
              				<button type="button" class="btn btn-primary btn-sm pull-right import" onclick="location.href = '{{ route('t01_leads.create') }}'">
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
										<h6>{{ trans('adminlte_lang::message.totalleads') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-success box-inverse">
									<div class="box-body text-center">
										<h1 class="font-light text-white"><h1><?php echo $counts[1]; ?></h1></h1>
										<h6 class="text-white mb-10">{{ trans('adminlte_lang::message.np_leads') }}</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-danger">
									<div class="box-body text-center">
										<h1 class="font-light text-white"><h1><?php echo $counts[2]; ?></h1></h1>
										<h6 class="text-white mb-10">En Contacto</h6>
									</div>
								</div>
							</div>
							<!-- Column -->
							<div class="col-md-6 col-lg-3 col-xlg-3">
								<div class="box box-inverse box-dark">
									<div class="box-body text-center">
										<h1 class="font-light text-white"><h1><?php echo $counts[3]; ?></h1></h1>
										<h6 class="text-white mb-10">Seguimiento</h6>
									</div>
								</div>
							</div>
							
							<!-- Column -->
						</div>
						<div class="table-responsive">
						  	
						  	<table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">

								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.code') }}</th>
										<th>{{ trans('adminlte_lang::message.name') }}</th>
										<th>{{ trans('adminlte_lang::message.lastname') }}</th>
										<th>{{ trans('adminlte_lang::message.email') }}</th>
										<th>{{ trans('adminlte_lang::message.phonemobile') }}</th>
										<th>{{ trans('adminlte_lang::message.source') }}</th>
										<th>{{ trans('adminlte_lang::message.status') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($leads as $lead)
										<tr class="item{{$lead->id}}">
											<td>{{ $lead->id }}</td>
											<td>{{ $lead->code_lead }}</td>
											<td>{{ $lead->name_lead }}</td>
											<td>{{ $lead->lastname_lead }}</td>
											<td>{{ $lead->email_lead }}</td>
											<td>{{ $lead->phone_movil }}</td>
											<td>{{ $leadControl->showSourceName($lead->id_source)}}</td>
											<td>{{ $leadControl->showStatusName($lead->id_status)}}</td>
											<td width="15%">
												@can('t01_leads.show')
													<a href="{{ action('T01_leadController@show', ['id' => $lead->id]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><span class="fa fa-list-alt"></span></a>
												@endcan
												@can('t01_leads.edit')
												<a href="{{ action('T01_leadController@edit', ['id' => $lead->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
												@endcan
												@can('t01_leads.destroy')
												<a href="{{ action('T01_leadController@destroy', ['id' => $lead->id]) }}" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
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
	<script type="text/javascript" src="js/script_leads.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
@endsection

