@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.leads') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">LEAD : Show</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="example1" class="table table-bordered table-striped">
								
								<tbody>
									
										<tr>
											<td>Id:</td>
											<td>{{ $lead->id }}</td>
										</tr>
										<tr>
											<td>Entidad:</td>
											<td>{{ $lead->id_entity }}</td>
										</tr>
										<tr>
											<td>Condición Pago:</td>
											<td>{{ $lead->id_condicion_pago }}</td>
										</tr>
										<tr>
											<td>Giro:</td>
											<td>{{ $lead->id_giro }}</td>
										</tr>
										<tr>
											<td>Nombre:</td>
											<td>{{ $lead->nombre_lead }}</td>
										</tr>
										<tr>
											<td>Apellido:</td>
											<td>{{ $lead->apellido_lead }}</td>
										</tr>
								</tbody>
						  </table>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection