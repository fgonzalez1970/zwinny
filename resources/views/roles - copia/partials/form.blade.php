
<div class="form-group">
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción') }}
	{{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
</div>
<h4>Lista de Permisos</h4>
<div class="form-group">
	<ul class="list-unstyled">
		
    </ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>