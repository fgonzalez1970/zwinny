
        
    //import modal
    $(document).on('click', '.import-modal', function() {
        //alert('import');
        //solicitar la lista de los sources para elegir
            $.ajax({
                type: 'GET',
                url: 'contacts/listSources/list',
                success: function(data) {
                    console.log(data);
                    // Guardamos el select de los sources
                    var sourcesList = $("#id_source");
                    // Limpiamos el select
                    sourcesList.find('option').remove();
                    sourcesList.append('<option value="">- Seleccione -</option>');
                    $(data).each(function(i, v){ // indice, valor
                        sourcesList.append('<option value="' + v.id + '">' + v.name + '</option>');
                    })
                }
            });
        //solicitar la lista de los status para elegir
            $.ajax({
                type: 'GET',
                url: 'contacts/listStatus/list',
                success: function(data) {
                    //console.log(data);
                    // Guardamos el select de los status
                    var statusList = $("#id_status");
                    // Limpiamos el select
                    statusList.find('option').remove();
                    statusList.append('<option value="">- Seleccione -</option>');
                    $(data).each(function(i, v){ // indice, valor
                        statusList.append('<option value="' + v.id + '">' + v.name + '</option>');
                    })
                }
            });
        $('.modal-title').text('Importar Actividades');
        $('#importModal').modal('show');
    });

    $('.modal-footer').on('click', '.import', function() {

    //$("#import-form").on('submit', function(e){
        //alert('aqui');
        //e.preventDefault();
        var form = $(this);
        var formData = new FormData(document.getElementById("import-form"));
        //alert("hasta aquí");
        //return false;
        $.ajax({
                url: 'contacts/import/excel',
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#import-modal').modal('show');
                            toastr.error('No se pudo importar el archivo!', 'Import error', {timeOut: 5000});
                        }, 500);
                    } else {
                        window.location.reload(true);
                        toastr.success('Successfully import file!', 'Success Alert', {timeOut: 5000});
                    }
                    //alert('sali');
                }
            });

    });

     //llenar el campo result según el status seleccionado
    $("#id_status").change(function() {

        var id = $("#id_status option:selected").val()
        //alert(id);
        
        //buscamos la lista de resultados 
            $.ajax({
                type: 'GET',
                url: '/contacts/listResults/'+id,
                success: function(data) {
                    //alert("success");
                    console.log(data);
                    // Guardamos el select de los result
                    var resultList = $("#id_result");
                    // Limpiamos el select
                    resultList.find('option').remove();
                    resultList.append('<option value="">- Seleccione -</option>');
                    
                    $(data).each(function(i, v){ // indice, valor
                        txt_append = '<option value="' + v.id + '">' + v.name + '</option>';
                        resultList.append(txt_append);
                    })
                }
            });
    });

    