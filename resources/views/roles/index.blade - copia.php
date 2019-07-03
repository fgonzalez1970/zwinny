@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.roles') }}
@endsection


@section('main-content')
	@include('roles.partials.add')
	@include('roles.partials.edit')
	@include('roles.partials.show')
	@include('roles.partials.delete')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">ROLES</h3>
						<button class="add-modal btn btn-info btn-sm pull-right">+ {{ trans('adminlte_lang::message.create') }}</button>
					</div>
					<div class="box-body">
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
											<td>
												@can('roles.show')
													<button value="{{ $role->id }}" class="show-modal btn btn-success btn-xs" data-id="{{$role->id}}"
  							data-name="{{$role->name}}" data-description="{{$role->description}}"><span class="glyphicon glyphicon-eye-open"></span></button>
												@endcan
												@can('roles.edit')
														<button value="{{ $role->id }}" class="edit-modal btn btn-info btn-xs" data-id="{{$role->id}}"
  							data-name="{{$role->name}}" data-description="{{$role->description}}"><span class="glyphicon glyphicon-pencil"></span></button>
												@endcan
												@can('roles.destroy')
			                                    	<button value="{{ $role->id }}" class="delete-modal btn btn-danger btn-xs" data-id="{{$role->id}}"
  							data-name="{{$role->name}}"><span class="glyphicon glyphicon-trash"></span></button>
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