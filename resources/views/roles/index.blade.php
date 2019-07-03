@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.roles') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">ROLES</h3>
						<a href="{{ route('roles.create') }}" class="btn btn-info btn-sm pull-right">+ {{ trans('adminlte_lang::message.create') }}</a>
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
						  	<table id="rolesTable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>{{ trans('adminlte_lang::message.name') }}</th>
										<th>{{ trans('adminlte_lang::message.description') }}</th>
										<th>{{ trans('adminlte_lang::message.actions') }}</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($roles as $role)
										<tr class="item{{$role->id}}">
											<td>{{ $role->id }}</td>
											<td>{{ $role->name }}</td>
											<td>{{ $role->description }}</td>
											<td width="15%">
												@can('roles.show')
													<a href="{{ action('RoleController@show', ['id' => $role->id]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><span class="fa fa-list-alt"></span></a>
												@endcan
												@can('roles.edit')
												<a href="{{ action('RoleController@edit', ['id' => $role->id]) }}" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o"></i></a>
												@endcan
												@can('roles.delete')
												<a href="{{ action('RoleController@destroy', ['id' => $role->id]) }}" class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash-o"></i></a>
												@endcan
			                                </td> 
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
	
	<!-- jQuery scripts -->
	<script type="text/javascript" src="js/script_roles.js"></script>    

@endsection