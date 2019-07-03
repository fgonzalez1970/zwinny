<div class="form-group">
	{{ Form::label('nombre', 'Nombre') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('contacto', 'Contacto') }}
	{{ Form::text('contacto', null, ['class' => 'form-control', 'id' => 'contacto']) }}
</div>
<div class="form-group">
	{{ Form::label('nom_bd', 'Nombre de la Base de Datos') }}
	{{ Form::text('nom_bd', null, ['class' => 'form-control', 'id' => 'nom_bd']) }}
</div>
<div class="form-group">
	{{ Form::label('id_status', 'Estado') }}
	{{ Form::text('id_status', null, ['class' => 'form-control', 'id' => 'id_status']) }}
</div>
<div class="form-group">
	{{ Form::label('fecha_activacion', 'Fecha de Activación') }}
	{{ Form::date('fecha_activacion', null, ['class' => 'form-control', 'id' => 'fecha_activacion']) }}
</div>
<div class="form-group">
	{{ Form::label('fecha_suspension', 'Fecha de Suspensión') }}
	{{ Form::date('fecha_suspension', null, ['class' => 'form-control', 'id' => 'fecha_suspension']) }}
</div>
