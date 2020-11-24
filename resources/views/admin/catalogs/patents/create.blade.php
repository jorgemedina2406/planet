<div class="modal fade" id="newPatent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Patente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('create.patent') }}" id="kt_form_1" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <div class="alert alert-danger kt-hide" role="alert" id="kt_form_1_msg">
                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                            <div class="alert-text">
                                Por favor confirme que los campos obligatorios (*) esten correctos e intente de nuevo
                            </div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="patent" class="form-control-label">* Patente:</label>
                                <input type="text" name="patent" class="form-control" id="patent">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agent_aduanal" class="form-control-label">* Agente Aduanal:</label>
                                <input type="text" name="agent_aduanal" class="form-control" id="agent_aduanal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>