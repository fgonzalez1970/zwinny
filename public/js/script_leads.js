
        
    //import modal
    $(document).on('click', '.import-modal', function() {
        //alert('import');
        //solicitar la lista de los sources para elegir
            $.ajax({
                type: 'GET',
                url: 'leads/listSources/list',
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
                url: 'leads/listStatus/list',
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
        $('.modal-title').text('Importar Prospectos');
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
                url: 'leads/import/excel',
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

     //file type validation
    $("#file_import").change(function() {
        var file = this.files[0];
        //alert(file.name);
        var name = file.name;
        var tipofile = name.substring(name.lastIndexOf("."));
        //alert(tipofile);
        var match= [".xls",".xlsx",".cvs"];
        if(!((tipofile==match[0]) || (tipofile==match[1]) || (tipofile==match[2]))){
            setTimeout(function () {
                            $('#importModal').modal('show');
                            toastr.error('Validation error!', 'Ingrese un archivo con extensión Excel o CVS', {timeOut: 5000});
                        }, 500);
            $("#file_import").val('');
            return false;
        }
    });

    