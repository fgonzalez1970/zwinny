
        //manejo jquery para show
        $(document).on('click', '.show-modal', function() {
            //('entré show');
            //solicitar el nombre del status que posee el tenant
            idStatus = $(this).data('status');
            $.ajax({
                type: 'GET',
                url: 'tenants/' + idStatus,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'idStatus': idStatus,
                },
                success: function(data) {
                    //console.log(data);
                    if ((data.errors)) {
                        //alert('errores');
                        setTimeout(function () {
                            toastr.error('Error! Status name not found', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        $('#status_show').val(data.name);
                    }
                }
            });
            //alert('aqui');
            fecha1= moment($(this).data('fecha_act')).format('DD/MM/YYYY');
            fecha2= moment($(this).data('fecha_susp')).format('DD/MM/YYYY');
            $('.modal-title').text('Show Tenant');
            $('#id_show').val($(this).data('id'));
            $('#nombre_show').val($(this).data('nombre'));
            $('#nom_bd_show').val($(this).data('nombd'));
            $('#contacto_show').val($(this).data('contacto'));
            $('#fecha_act_show').val(fecha1);
            $('#fecha_susp_show').val(fecha2);
            
            $('#showModal').modal('show');
        });

    //add model
    $(document).on('click', '.add-modal', function() {
        //alert('add');
        var id=0;
        //solicitar la lista de los status para tenants
            $.ajax({
                type: 'GET',
                url: 'tenants/listStatus/'+id,
                success: function(data) {
                    console.log(data);
                    // Guardamos el select de los status
                    var statusList = $("#id_status_add");
                    // Limpiamos el select
                    statusList.find('option').remove();
                    statusList.append('<option value="">- Seleccione -</option>');
                    $(data).each(function(i, v){ // indice, valor
                        statusList.append('<option value="' + v.id + '">' + v.name + '</option>');
                    })
                    $('.modal-title').text('Add Tenant');
                    $('#addModal').modal('show');

                }
            });
    });

    $('.modal-footer').on('click', '.add', function() {
        //alert($('#description_add').val());
        $.ajax({
                type: 'POST',
                url: 'tenants/store',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'nombre': $('#nombre_add').val(),
                    'contacto': $('#contacto_add').val(),
                    'nom_bd': $('#nom_bd_add').val(),
                    'id_status': $('#id_status_add').val(),
                    'fecha_activacion':$('#fecha_act_add').val(),
                    'fecha_suspension':$('#fecha_susp_add').val(),
                },
                success: function(data) {
                    //console.log(data);
                    $('.errorNonmbre').addClass('hidden');
                    $('.errorContacto').addClass('hidden');
                    $('.errorBd').addClass('hidden');
                    $('.errorStatus').addClass('hidden');
                    $('.errorFechaAct').addClass('hidden');
                    $('.errorFechaSusp').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.nombre) {
                            $('.errorNombre').removeClass('hidden');
                            $('.errorNombre').text(data.errors.nombre);
                        }
                        if (data.errors.contacto) {
                            $('.errorContacto').removeClass('hidden');
                            $('.errorContacto').text(data.errors.contacto);
                        }
                        if (data.errors.nom_bd) {
                            $('.errorNomBd').removeClass('hidden');
                            $('.errorNomBd').text(data.errors.nom_bd);
                        }
                        if (data.errors.id_status) {
                            $('.errorStatus').removeClass('hidden');
                            $('.errorStatus').text(data.errors.id_status);
                        }
                        if (data.errors.fecha_activacion) {
                            $('.errorFechaAct').removeClass('hidden');
                            $('.errorFechaAct').text(data.errors.fecha_activacion);
                        }
                        if (data.errors.fecha_suspension) {
                            $('.errorFechaSusp').removeClass('hidden');
                            $('.errorFechaSusp').text(data.errors.fecha_suspension);
                        }
                    } else {
                        
                        $.ajax({
                            type: 'GET',
                            url: 'tenants/' + data.id_status,
                            data: {
                            '_token': $('input[name=_token]').val(),
                            'idStatus': data.id_status,
                            },
                            success: function(statusData) {
                                console.log(statusData);
                                if ((statusData.errors)) {
                                    setTimeout(function () {
                                    toastr.error('Error! Status name not found', 'Error Alert', {timeOut: 5000});
                                    }, 500);
                                } else {
                                    var status = statusData.name;
                                    var fecha1 = "";
                                    var fecha2= "";
                                    if (data.fecha_activacion!=null)
                                        fecha1= moment(data.fecha_activacion).format('DD/MM/YYYY');
                                    if (data.fecha_suspension!=null)
                                        fecha2 = moment(data.fecha_suspension).format('DD/MM/YYYY');
                                    toastr.success('Successfully added Tenant!', 'Success Alert', {timeOut: 5000});
                                    $('#tenantsTable').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nombre + "</td><td>" + data.contacto + "</td><td>" + data.nom_bd + "</td><td>" + status + "</td><td>" + fecha1 + "</td><td>" + fecha2 + "</td><td><button class='show-modal btn btn-xs btn-success' data-id='" + data.id + "' data-nombre='" + data.nombre + "' data-nombd='" + data.nom_bd + "' data-contacto='" + data.contacto + "' data-status='" + data.id_status + "' data-fecha_act='" + data.fecha_activacion + "' data-fecha_susp='" + data.fecha_suspension + "'><span class='glyphicon glyphicon-eye-open'></span></button> <button class='edit-modal btn btn-xs btn-info' data-id='" + data.id + "' data-nombre='" + data.nombre + "' data-nombd='" + data.nom_bd + "' data-contacto='" + data.contacto + "' data-status='" + data.id_status + "' data-fecha_act='" + data.fecha_activacion + "' data-fecha_susp='" + data.fecha_suspension + "'><span class='glyphicon glyphicon-edit'></span></button> <button class='delete-modal btn btn-xs btn-danger' data-id='" + data.id + "' data-nombre='" + data.nombre + "'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
                                }
                            }
                        });
                    }
                },
        });
    });

    
    //manejo jquery para edit
        $(document).on('click', '.edit-modal', function() {
            //alert('entré');
            fecha1= moment($(this).data('fecha_act')).format('DD/MM/YYYY');
            fecha2= moment($(this).data('fecha_susp')).format('DD/MM/YYYY');
            //alert("fecha1: "+fecha1);
            //alert(fecha2);
            $('.modal-title').text('Edit Tenant');
            $('#id_edit').val($(this).data('id'));
            $('#nombre_edit').val($(this).data('nombre'));
            $('#nom_bd_edit').val($(this).data('nombd'));
            $('#contacto_edit').val($(this).data('contacto'));
            $('#fecha_act_edit').val($(this).data('fecha_act'));
            $('#fecha_susp_edit').val($(this).data('fecha_susp'));
            var id_stat=$(this).data('status');
            //alert( $('#fecha_act_edit').val());
            //buscamos la lista de status 
            var id =0;
            $.ajax({
                type: 'GET',
                url: 'tenants/listStatus/'+id,
                success: function(data) {
                    //console.log(data);
                    // Guardamos el select de los status
                    var statusList = $("#id_status_edit");
                    // Limpiamos el select
                    statusList.find('option').remove();
                    statusList.append('<option value="">- Seleccione -</option>');
                    
                    $(data).each(function(i, v){ // indice, valor
                        if (v.id==id_stat)
                            txt_append = '<option value="' + v.id + '"  selected>' + v.name + '</option>';
                        else
                             txt_append = '<option value="' + v.id + '">' + v.name + '</option>';
                        statusList.append(txt_append);
                    })
                    id = $('#id_edit').val();
                    $('#editModal').modal('show');

                }
            });
        });

        $('.modal-footer').on('click', '.edit', function() {
            var idTnt = $("#id_edit").val();
            //alert("id tenant: "+idTnt);
            $.ajax({
                type: 'PUT',
                url: 'tenants/'+ idTnt + '/edit',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'nombre': $('#nombre_edit').val(),
                    'contacto': $('#contacto_edit').val(),
                    'nom_bd': $('#nom_bd_edit').val(),
                    'id_status': $('#id_status_edit').val(),
                    'fecha_activacion':$('#fecha_act_edit').val(),
                    'fecha_suspension':$('#fecha_susp_edit').val(),
                },
                success: function(data) {
                    $('.errorNonmbre').addClass('hidden');
                    $('.errorContacto').addClass('hidden');
                    $('.errorBd').addClass('hidden');
                    $('.errorStatus').addClass('hidden');
                    $('.errorFechaAct').addClass('hidden');
                    $('.errorFechaSusp').addClass('hidden');

                    if ((data.errors)) {
                        //alert('errores');
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.nombre) {
                            $('.errorNombreEdit').removeClass('hidden');
                            $('.errorNombreEdit').text(data.errors.nombre);
                        }
                        if (data.errors.contacto) {
                            $('.errorContactoEdit').removeClass('hidden');
                            $('.errorContactoEdit').text(data.errors.contacto);
                        }
                        if (data.errors.nom_bd) {
                            $('.errorNomBdEdit').removeClass('hidden');
                            $('.errorNomBdEdit').text(data.errors.nom_bd);
                        }
                        if (data.errors.id_status) {
                            $('.errorStatusEdit').removeClass('hidden');
                            $('.errorStatusEdit').text(data.errors.id_status);
                        }
                        if (data.errors.fecha_activacion) {
                            $('.errorFechaActEdit').removeClass('hidden');
                            $('.errorFechaActEdit').text(data.errors.fecha_activacion);
                        }
                        if (data.errors.fecha_suspension) {
                            $('.errorFechaSuspEdit').removeClass('hidden');
                            $('.errorFechaSuspEdit').text(data.errors.fecha_suspension);
                        }
                    } else {

                        $.ajax({
                            type: 'GET',
                            url: 'tenants/' + data.id_status,
                            data: {
                            '_token': $('input[name=_token]').val(),
                            'idStatus': data.id_status,
                            },
                            success: function(statusData) {
                                //console.log(statusData);
                                if ((statusData.errors)) {
                                    setTimeout(function () {
                                    toastr.error('Error! Status name not found', 'Error Alert', {timeOut: 5000});
                                    }, 500);
                                } else {
                                    var status = statusData.name;
                                    var fecha1 = "";
                                    var fecha2= "";
                                    if (data.fecha_activacion!=null)
                                        fecha1= moment(data.fecha_activacion).format('DD/MM/YYYY');
                                    if (data.fecha_suspension!=null)
                                        fecha2 = moment(data.fecha_suspension).format('DD/MM/YYYY');
                                    toastr.success('Successfully updated Tenant!', 'Success Alert', {timeOut: 5000});
                                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nombre + "</td><td>" + data.contacto + "</td><td>" + data.nom_bd + "</td><td>" + status + "</td><td>" + fecha1 + "</td><td>" + fecha2 + "</td><td><button class='show-modal btn btn-xs btn-success' data-id='" + data.id + "' data-nombre='" + data.nombre + "' data-nombd='" + data.nom_bd + "' data-contacto='" + data.contacto + "' data-status='" + data.id_status + "' data-fecha_act='" + data.fecha_activacion + "' data-fecha_susp='" + data.fecha_suspension + "'><span class='glyphicon glyphicon-eye-open'></span></button> <button class='edit-modal btn btn-xs btn-info' data-id='" + data.id + "' data-nombre='" + data.nombre +  "' data-nombd='" + data.nom_bd + "' data-contacto='" + data.contacto + "' data-status='" + data.id_status + "' data-fecha_act='" + data.fecha_activacion + "' data-fecha_susp='" + data.fecha_suspension + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-xs btn-danger' data-id='" + data.id + "' data-nombre='" + data.nombre + "'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
                                }
                            }
                        });
                        //toastr.success('Successfully updated Tenant!', 'Success Alert', {timeOut: 5000});
                        //$('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nombre + "</td><td>" + data.contacto + "</td><td>" + data.nom_bd + "</td><td>" + status + "</td><td>" + fecha1 + "</td><td>" + fecha2 + "</td><td><button class='show-modal btn btn-xs btn-success' data-id='" + data.id + "' data-nombre='" + data.nombre + "' data-nombd='" + data.nom_bd +"' data-contacto='" + data.contacto + "' data-status='" + data.id_status + "' data-fecha_act='" + data.fecha_activacion + "' data-fecha_susp='" + data.fecha_suspension + "'><span class='glyphicon glyphicon-eye-open'></span></button> <button class='edit-modal btn btn-xs btn-info' data-id='" + data.id + "' data-nombre='" + data.nombre +  "' data-nombd='" + data.nom_bd + "' data-contacto='" + data.contacto + "' data-status='" + data.id_status + "' data-fecha_act='" + data.fecha_activacion + "' data-fecha_susp='" + data.fecha_suspension + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-xs btn-danger' data-id='" + data.id + "' data-nombre='" + data.nombre + "'><span class='glyphicon glyphicon-trash'></span></button></td></tr>");
                    }
                }
            });
        });

        // delete a tenant
        $(document).on('click', '.delete-modal', function() {
            //alert('entre: '+$(this).data('id'));
            $('.modal-title').text('Delete Tenant');
            $('#id_delete').val($(this).data('id'));
            $('#nombre_delete').val($(this).data('nombre'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
            //alert('id: '+id);
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'tenants/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id,
                },
                success: function(data) {
                    //console.log(data);
                    if ((data.errors)) {
                        //alert('errores');
                        setTimeout(function () {
                            toastr.error('Validation error! Tenant is assigned to users', 'Error Alert', {timeOut: 5000});
                        }, 500);
                    } else {
                        toastr.success('Succ;essfully deleted Tenant!', 'Success Alert', {timeOut: 5000});
                        //alert(data['id']);
                        $('.item' + data['id']).remove();
                    }
                }
            });
        });
