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
                            <label class="col-lg-2 control-label">ID </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="id_show" id="id_show" disabled>
                            </div>
                            <label class="col-lg-2 control-label">{{ trans('adminlte_lang::message.name') }}<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="nombre_txt_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('adminlte_lang::message.origin') }} </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="id_show" id="origin_show" disabled="">
                            </div>
                            <label class="col-lg-2 control-label">{{ trans('adminlte_lang::message.status') }} </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="status_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('adminlte_lang::message.name') }}  </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="id_show" id="nombre_show" disabled>
                            </div>
                            <label class="col-lg-2 control-label">{{ trans('adminlte_lang::message.lastname') }} </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="apellido_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">{{ trans('adminlte_lang::message.name') }}  </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="id_show" id="nombre_show" disabled>
                            </div>
                            <label class="col-lg-2 control-label">{{ trans('adminlte_lang::message.lastname') }} </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="apellido_show" disabled>
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