<!-- Modal form to edit a form -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_show">{{ trans('adminlte_lang::message.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="contacto_show">{{ trans('adminlte_lang::message.contact') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contacto_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nom_bd_show">{{ trans('adminlte_lang::message.name_bd') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nom_bd_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="status_show">{{ trans('adminlte_lang::message.status') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_act_show">{{ trans('adminlte_lang::message.dateAct') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fecha_act_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_susp_show">{{ trans('adminlte_lang::message.dateSusp') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fecha_susp_show" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>