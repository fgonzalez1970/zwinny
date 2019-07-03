    <!-- Modal form to edit a form -->
        <div id="importModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">{{ trans('adminlte_lang::message.importacts') }}</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="import-form" enctype="multipart/form-data" method="POST" >
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="file_import">{{ trans('adminlte_lang::message.file') }}:</label>
                                <div class="col-sm-10">
                                    <input type="file" name="file_import" class="form-control" id="file_import" value="">
                                    <p class="errorFileImport text-center alert alert-danger hidden"></p> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nombre_edit">{{ trans('adminlte_lang::message.source') }}</label>
                                <div class="col-sm-10">
                                    <select class="form-control select_box" id="id_source" name="id_source" style="width: 100%" required>
                                        <option value="">- Seleccione -</option>
                                    </select>
                                    <p class="errorSource text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_status">{{ trans('adminlte_lang::message.status') }}</label>
                                <div class="col-sm-10">
                                    <select class="form-control select_box" id="id_status" name="id_status" style="width: 100%" required>
                                        <option value="">- Seleccione -</option>
                                    </select>
                                    <p class="errorStatus text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="flag_owner">{{trans('adminlte_lang::message.assigned')}}:</label>
                                <div class="col-lg-4">
                                    <fieldset class="controls">
                                        <input name="flag_owner" type="radio" id="radio1" value="0" required>
                                        <label for="radio_1">{{trans('adminlte_lang::message.everybody')}}</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="flag_owner" type="radio" id="radio2" value="1">
                                        <label for="radio_2">{{trans('adminlte_lang::message.someone')}}</label>                  
                                    </fieldset>
                                    <p class="errorFlagOwner text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                        <div class="form-group" id="users_asigned">

                          <br/>

                          <label for="field-1" class="col-sm-2 control-label">{{trans('adminlte_lang::message.users')}}<span
                                        class="required">*</span></label>
                          </label>
                          <div class="col-lg-10">
                              <div class="checkbox c-checkbox">
                                  <input type="checkbox" value="1" name="assigned_to[]" class="needsclick">Admin Gral 
                                  <strong class="btn-danger">admin-zwinny</strong>
                                </div>
                              @foreach($listUsers as $user)
                                <div class="checkbox c-checkbox">
                                  <input type="checkbox" value="{{$user->id}}" name="assigned_to[]" class="needsclick">{{$user->name}} 
                                  <strong class="btn-primary">{{$user->getFirstRoleName()}}</strong>
                                </div>
                              @endforeach
                              <p class="errorAssigned text-center alert alert-danger hidden"></p>
                          </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary import" data-dismiss="modal">
                                <span class='glyphicon glyphicon-check'></span> Import
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>