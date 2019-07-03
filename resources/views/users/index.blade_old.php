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
						<h3 class="box-title">USERS</h3>

					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Email</th>
										<th colspan="3"></th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{ $user->id }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											@can('users.show')
												<td>
													<a href="{{ route('users.show',$user->id)}}" class="btn btn-sm btn-default">View</a>
												</td>
											@endcan
											@can('users.edit')
												<td>
													<a href="{{ route('users.edit',$user->id)}}" class="btn btn-sm btn-default">Edit</a>
												
												</td>
											@endcan
											@can('users.destroy')
	                                			<td>
			                                    	{!! Form::open(['route' => ['users.destroy', $user->id], 
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
						  {{ $users->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection