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
						<h3 class="box-title">LEADS</h3>

						<div class="box-tools pull-right">
							@can('leads.create')
								<a href="{{route('leads.create')}}" class="btn btn-sm btn-primary pull-right">Create</a>
							@endcan
							
						</div>
					</div>
					<div class="box-body">
						<div class="table-responsive">
						  	<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Email</th>
										<th colspan="3"></th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($leads as $lead)
										<tr>
											<td>{{ $lead->id }}</td>
											<td>{{ $lead->codigo_lead }}</td>
											<td>{{ $lead->nombre_lead }}</td>
											<td>{{ $lead->apellido_lead }}</td>
											<td>{{ $lead->email}}</td>
											@can('leads.show')
												<td>
													<a href="{{ route('leads.show',$lead->id)}}" class="btn btn-sm btn-default">View</a>
												</td>
											@endcan
											@can('leads.edit')
												<td>
													<a href="{{ route('leads.edit',$lead->id)}}" class="btn btn-sm btn-default">Edit</a>
												
												</td>
											@endcan
											@can('leads.destroy')
	                                			<td>
			                                    	{!! Form::open(['route' => ['leads.destroy', $lead->id], 
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
						  {{ $leads->render() }}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection