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
						<h3 class="box-title">LEAD : Edit</h3>
					</div>
					<div class="box-body">
						{!! Form::model($lead, ['route' => ['leads.update', $lead->id],
                    'method' => 'PUT']) !!}

                        @include('leads.partials.form')
                        
                    {!! Form::close() !!}
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection