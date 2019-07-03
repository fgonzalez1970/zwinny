<div class="form-group">
	{{ Form::label('id_entity', 'Entity') }}
	{{ Form::text('id_entity', null, ['class' => 'form-control', 'id' => 'id_entity']) }}
</div>
<div class="form-group">
	{{ Form::label('id_condicion_pago', 'Condición') }}
	{{ Form::text('id_condicion_pago', null, ['class' => 'form-control', 'id' => 'id_condicion_pago']) }}
</div>
<div class="form-group">
	{{ Form::label('id_giro', 'Giro') }}
	{{ Form::text('id_giro', null, ['class' => 'form-control', 'id' => 'id_giro']) }}
</div>
<div class="form-group">
	{{ Form::label('nombre_lead', 'Nombre') }}
	{{ Form::text('nombre_lead', null, ['class' => 'form-control', 'id' => 'nombre_lead']) }}
</div>
<div class="form-group">
	{{ Form::label('apellido_lead', 'Apellido') }}
	{{ Form::text('apellido_lead', null, ['class' => 'form-control', 'id' => 'apellido_lead']) }}
</div>
<div class="form-group">
	{{ Form::label('fecha_nac_lead', 'Fecha de Nacimiento') }}
	{{ Form::text('fecha_nac_lead', null, ['class' => 'form-control', 'id' => 'fecha_nac_lead']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>