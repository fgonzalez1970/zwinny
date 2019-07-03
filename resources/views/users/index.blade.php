@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.users') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">{{ trans('adminlte_lang::message.users') }}</h3>
						<a href="{{ route('users.create') }}" class="btn btn-info btn-sm pull-right">+ {{ trans('adminlte_lang::message.create') }}</a>
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
						<div class="table-responsive">
						  	<table id="usersTable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.name') }}</th>
										<th>{{ trans('adminlte_lang::message.email') }}</th>
										<th>{{ trans('adminlte_lang::message.idtenant') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr class="item{{$user->id}}">
											<td>{{ $user->id }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td align="center">{{ $user->tenant_id }}</td>
											<td width="15%">
												@if ($user->id==1)
													&nbsp;
												@else
													@can('users.show')
														<a href="{{ action('UserController@show', ['id' => $user->id]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><span class="fa fa-list-alt"></span></a>
													@endcan
													@can('users.edit')
													<a href="{{ action('UserController@edit', ['id' => $user->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
													@endcan
													@can('users.delete')
													<a href="{{ action('UserController@destroy', ['id' => $user->id]) }}" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
													@endcan
												@endif
				                            </td> 
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
	
	<!-- jQuery scripts -->
	<script type="text/javascript" src="js/script_users.js"></script>    

@endsection