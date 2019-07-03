        // add a new role
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add Role');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
        	//alert($('#description_add').val());
            $.ajax({
                type: 'POST',
                url: 'roles',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('#name_add').val(),
                    'description': $('#desc_add').val()
                },
                success: function(data) {
                    $('.errorName').addClass('hidden');
                    $('.errorDescription').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(data.errors.name);
                        }
                        if (data.errors.description) {
                            $('.errorDescription').removeClass('hidden');
                            $('.errorDescription').text(data.errors.description);
                        }
                    } else {
                        toastr.success('Successfully added Role!', 'Success Alert', {timeOut: 5000});
                        $('#rolesTable').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.description + "</td><td><button class='show-modal btn btn-xs btn-success' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-eye-open'></span></button> <button class='edit-modal btn btn-xs btn-info' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-edit'></span></button> <button class='delete-modal btn btn-xs btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
                    }
                },
            });
        });

    	//manejo jquery para edit
    	$(document).on('click', '.edit-modal', function() {
			//alert('entré');
            $('.modal-title').text('Edit Role');
            $('#id_edit').val($(this).data('id'));
            $('#name_edit').val($(this).data('name'));
            $('#desc_edit').val($(this).data('description'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });

        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'roles/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'name': $('#name_edit').val(),
                    'description': $('#desc_edit').val()
                },
                success: function(data) {
                    $('.errorName').addClass('hidden');
                    $('.errorDescription').addClass('hidden');

                    if ((data.errors)) {
                    	//alert('errores');
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(data.errors.name);
                        }
                        if (data.errors.description) {
                            $('.errorDescription').removeClass('hidden');
                            $('.errorDescription').text(data.errors.description);
                        }
                    } else {
                        toastr.success('Successfully updated Role!', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.description + "</td><td><button class='show-modal btn btn-success btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-eye-open'></span></button> <button class='edit-modal btn btn-info btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
                    }
                }
            });
        });

        //manejo jquery para show
    	$(document).on('click', '.show-modal', function() {
			//('entré show');
            $('.modal-title').text('Show Role');
            $('#id_show').val($(this).data('id'));
            $('#name_show').val($(this).data('name'));
            $('#desc_show').val($(this).data('description'));
            id = $('#id_show').val();
            $('#showModal').modal('show');
        });

        // delete a role
        $(document).on('click', '.delete-modal', function() {
        	//alert('entre: '+$(this).data('id'));
            $('.modal-title').text('Delete Role');
            $('#id_delete').val($(this).data('id'));
            $('#name_delete').val($(this).data('name'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
            //alert('id: '+id);
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'roles/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id,
                },
                success: function(data) {
                	console.log(data);
                	if ((data.errors)) {
                    	//alert('errores');
                        setTimeout(function () {
                            toastr.error('Validation error! Role is assigned to users', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                    	toastr.success('Successfully deleted Role!', 'Success Alert', {timeOut: 5000});
                    	$('.item' + data['id']).remove();
                    }
                }
            });
        });

        //manejo jquery para marcar y desmarcar los permisos
        $("#special").on( 'change', function() {
            //alert("click");
            if( $('#special').is(':checked') ) {
                //hay que checkear todos
                $('input[name="perm_check[]"]').each(function() {
                  $(this).prop('checked', true);
                });
               
            } else {
                //hay que descheckear todos
                $('input[name="perm_check[]"]').each(function() {
                  $(this).prop('checked', false);
                });
            }
        });