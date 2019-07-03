<!-- Modal form to edit a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                	<h3 class="text-center">{{ trans('adminlte_lang::message.delTenant') }}</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" name="id_delete">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">{{ trans('adminlte_lang::message.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_delete" name="nombre_delete">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                    	<button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
