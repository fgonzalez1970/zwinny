@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<?php use App\Http\Controllers\T01_leadController; 
$leadControl = new T01_leadController;
use App\Http\Controllers\T02_contactController; 
$contactControl = new T02_contactController;
?>
	<div class="container-fluid spark-screen">
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-rocket fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $datos[0] }}</div>
                                    <div>{{ trans('adminlte_lang::message.totalleads') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('t01_leads.index') }}">
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
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $datos[1] }}</div>
                                    <div>{{ trans('adminlte_lang::message.totalactivities') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('t02_contacts.index') }}">
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
					  <h3 class="box-title">{{ trans('adminlte_lang::message.lastleads') }}</h3>

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
					  			<th>{{ trans('adminlte_lang::message.status') }}</th>
							</tr>
							@foreach($leads as $lead)
								<tr>
					  				<td>{{ $lead->id }}</td>
									<td>{{ $lead->name_lead." ".$lead->lastname_lead }}</td>
									<td>{{ $lead->email_lead }}</td>
									@if ($lead->id_status=='1')
										<td><span class="badge bg-blue">{{ $leadControl->showStatusName($lead->id_status) }}</span></td>
									@elseif ($lead->id_status=='2')
										<td><span class="badge bg-yellow">{{ $leadControl->showStatusName($lead->id_status) }}</span></td>
									@elseif ($lead->id_status=='3')
										<td><span class="badge bg-green">{{ $leadControl->showStatusName($lead->id_status) }}</span></td>
									@elseif ($lead->id_status=='4')
										<td><span class="badge bg-purple">{{ $leadControl->showStatusName($lead->id_status) }}</span></td>
									@elseif ($lead->id_status=='5')
										<td><span class="badge bg-red">{{ $leadControl->showStatusName($lead->id_status) }}</span></td>
									@endif

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
					  <h3 class="box-title">{{ trans('adminlte_lang::message.lastactivities') }}</h3>

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
					  			<th>{{ trans('adminlte_lang::message.date') }}</th>
					  			<th>{{ trans('adminlte_lang::message.subject') }}</th>
					  			<th>{{ trans('adminlte_lang::message.way') }}</th>
					  			<th>{{ trans('adminlte_lang::message.source') }}</th>
					  			<th>{{ trans('adminlte_lang::message.status') }}</th>
							</tr>
							@foreach($contacts as $contact)
								<tr>
					  				<td>{{ $contact->id }}</td>
									<td>{{ $contact->date }}</td>
									<td>{{ $contact->subject }}</td>
									<td>{{ $contactControl->showWayName($contact->id_way) }}</td>
									<td>{{ $contactControl->showSourceName($contact->id_source) }}</td>
									@if ($contact->id_status=='1')
										<td><span class="badge bg-blue">{{ $contactControl->showStatusName($contact->id_status) }}</span></td>
									@elseif ($contact->id_status=='2')
										<td><span class="badge bg-success">{{ $contactControl->showStatusName($contact->id_status) }}</span></td>
									@elseif ($contact->id_status=='3')
										<td><span class="badge bg-red">{{ $contactControl->showStatusName($contact->id_status) }}</span></td>
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