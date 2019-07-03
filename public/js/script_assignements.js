     //llenar el campo subtipo según el tipo seleccionado
    $("#id_tipo").change(function() {

        var id = $("#id_tipo option:selected").val()
        //alert(id);
        
        //buscamos la lista de resultados 
            $.ajax({
                type: 'GET',
                url: '/devices/listSubtypes/'+id,
                success: function(data) {
                    //alert("success");
                    //console.log(data);
                    // Guardamos el select de los subtipos
                    var subtypesList = $("#id_subtipo");
                    // Limpiamos el select
                    subtypesList.find('option').remove();
                    subtypesList.append('<option value="">- Seleccione -</option>');
                    
                    $(data).each(function(i, v){ // indice, valor
                        txt_append = '<option value="' + v.id + '">' + v.name + '</option>';
                        subtypesList.append(txt_append);
                    })
                }
            });
    });

     //llenar el campo devices según el sub-tipo seleccionado
    $("#id_subtipo").change(function() {

        var id_subtipo = $("#id_subtipo option:selected").val()
        //alert(id_subtipo);
        
        //buscamos la lista de resultados 
            $.ajax({
                type: 'GET',
                url: '/devices/listDevicesNoAssign/'+id_subtipo,
                success: function(data) {
                    //alert("success");
                    console.log(data);
                    // Guardamos el select de los subtipos
                    var devicesList = $("#id_dispositivo");
                    // Limpiamos el select
                    devicesList.find('option').remove();
                    devicesList.append('<option value="">- Seleccione -</option>');
                    
                    $(data).each(function(i, v){ // indice, valor
                        txt_append = '<option value="' + v.id + '">' + v.name + '</option>';
                        devicesList.append(txt_append);
                    })
                }
            });
    });

    