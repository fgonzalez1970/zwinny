<!-- Modal form to edit a form -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_add">{{ trans('adminlte_lang::message.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_add" autofocus>
                                <small>Min: 2, Max: 250, only text</small>
                                <p class="errorNombre text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="contacto_add">{{ trans('adminlte_lang::message.contact') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contacto_add" autofocus>
                                <small>Min: 2, Max: 250, only text</small>
                                <p class="errorContacto text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nom_bd_add">{{ trans('adminlte_lang::message.name_bd') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nom_bd_add">
                                <small>Min: 2, Max: 250, alphanumeric</small>
                                <p class="errorNomBd text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_status_add">{{ trans('adminlte_lang::message.status') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_status_add">
                                    
                                </select>
                                <p class="errorStatus text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_act_add">{{ trans('adminlte_lang::message.dateAct') }}</label>
                            {{ Form::date('fecha_act_add', null, ['class' => 'form-control', 'id' => 'fecha_act_add']) }}
                            <p class="errorFechaAct text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_susp_add">{{ trans('adminlte_lang::message.dateSusp') }}</label>
                            {{ Form::date('fecha_susp_add', null, ['class' => 'form-control', 'id' => 'fecha_susp_add']) }}
                            <p class="errorFechaSusp text-center alert alert-danger hidden"></p>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>