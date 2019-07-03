@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.roles') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">ROLE : Show</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="example1" class="table table-bordered table-striped">
								
								<tbody>
									
										<tr>
											<td>Id:</td>
											<td>{{ $role->id }}</td>
										</tr>
										
										<tr>
											<td>Nombre:</td>
											<td>{{ $role->name }}</td>
										</tr>
										<tr>
											<td>Descripción:</td>
											<td>{{ $role->description }}</td>
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