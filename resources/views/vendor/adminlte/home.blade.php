@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<?php use App\Http\Controllers\TenantController; 
$tenantControl = new TenantController; ?>
	<div class="container-fluid spark-screen">
		<!-- /.row -->
        <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bank fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$datos[0]}}</div>
                                    <div>{{ trans('adminlte_lang::message.totaltenants') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('tenants.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$datos[1]}}</div>
                                    <div>{{ trans('adminlte_lang::message.totalusers') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('users.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Item 3</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Item 4</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
        </div>
            <!-- /.row -->
		<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12">
				<div class="box">					
					<div class="box-header with-border">
					  <h3 class="box-title">{{ trans('adminlte_lang::message.lastusers') }}</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					  </div>
					</div>
					<div class="box-body">						
						<div class="table-responsive">
				  			<table class="table">
							<tr>
					  			<th style="width: 10px">#</th>
					  			<th>{{ trans('adminlte_lang::message.name') }}</th>
					  			<th>{{ trans('adminlte_lang::message.email') }}</th>
					  			<th style="width: 40px">{{ trans('adminlte_lang::message.tenant') }}</th>
							</tr>
							@foreach($users as $user)
								<tr>
					  				<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
					  				<td>{{ $user->tenant_id }}</td>
								</tr>
							@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-xs-12">
				<div class="box">					
					<div class="box-header with-border">
					  <h3 class="box-title">{{ trans('adminlte_lang::message.lasttenants') }}</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					  </div>
					</div>
					<div class="box-body">						
						<div class="table-responsive">
				  			<table class="table">
							<tr>
					  			<th style="width: 10px">#</th>
					  			<th>{{ trans('adminlte_lang::message.name') }}</th>
					  			<th>{{ trans('adminlte_lang::message.status') }}</th>
							</tr>
							@foreach($tenants as $tenant)
								<tr>
					  				<td>{{ $tenant->id }}</td>
									<td>{{ $tenant->name }}</td>
									@if ($tenant->id_status=='1')
										<td><span class="badge bg-blue">{{ $tenantControl->showStatusName($tenant->id_status) }}</span></td>
									@elseif ($tenant->id_status=='2')
										<td><span class="badge bg-yellow">{{ $tenant->id_status }}</span></td>
									@endif

								</tr>
							@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection
