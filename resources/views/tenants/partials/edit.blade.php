<!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" >
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_edit">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_edit">{{ trans('adminlte_lang::message.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_edit" autofocus>
                                <small>Min: 2, Max: 250, only text</small>
                                <p class="errorNombreEdit text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="contacto_edit">{{ trans('adminlte_lang::message.contact') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contacto_edit" autofocus>
                                <small>Min: 2, Max: 250, only text</small>
                                <p class="errorContactoEdit text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nom_bd_edit">{{ trans('adminlte_lang::message.name_bd') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nom_bd_edit">
                                <small>Min: 2, Max: 250, alphanumeric</small>
                                <p class="errorNomBdEdit text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_status_edit">{{ trans('adminlte_lang::message.status') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_status_edit">
                                    
                                </select>
                                <p class="errorStatusEdit text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_act_edit">{{ trans('adminlte_lang::message.dateAct') }}</label>
                            {{ Form::date('fecha_act_edit', null, ['class' => 'form-control', 'id' => 'fecha_act_edit']) }}
                            <p class="errorFechaActEdit text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_susp_edit">{{ trans('adminlte_lang::message.dateSusp') }}</label>
                            {{ Form::date('fecha_susp_edit', null, ['class' => 'form-control', 'id' => 'fecha_susp_edit']) }}
                            <p class="errorFechaSuspEdit text-center alert alert-danger hidden"></p>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>