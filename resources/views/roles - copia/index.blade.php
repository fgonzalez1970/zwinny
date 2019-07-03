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
						<h3 class="box-title">ROLES</h3>

					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="tablaRoles" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Descripción</th>
										<th colspan="3"></th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($roles as $role)
										<tr>
											<td>{{ $role->id }}</td>
											<td>{{ $role->name }}</td>
											<td>{{ $role->descripcion }}</td>
											@can('roles.show')
												<td>
													<a href="{{ route('roles.show',$role->id)}}" class="btn btn-sm btn-default">View</a>
												</td>
											@endcan
											@can('roles.edit')
												<td>
													<a href="{{ route('roles.edit',$role->id)}}" class="btn btn-sm btn-default">Edit</a>
												
												</td>
											@endcan
											@can('roles.destroy')
	                                			<td>
			                                    	{!! Form::open(['route' => ['roles.destroy', $role->id], 
			                                    'method' => 'DELETE']) !!}
				                                        <button class="btn btn-sm btn-danger">
				                                            Del
				                                        </button>
			                                    	{!! Form::close() !!}
			                                	</td>
			                                @endcan
										</tr>
									@endforeach
								</tbody>
						  </table>
						  {{ $roles->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection