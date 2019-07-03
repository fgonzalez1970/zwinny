@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.users') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">USER : Show</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="example1" class="table table-bordered table-striped">
								
								<tbody>
									
										<tr>
											<td>Id:</td>
											<td>{{ $user->id }}</td>
										</tr>
										
										<tr>
											<td>Nombre:</td>
											<td>{{ $user->name }}</td>
										</tr>
										<tr>
											<td>Email:</td>
											<td>{{ $user->email }}</td>
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