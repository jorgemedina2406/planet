<div class="modal fade" id="newConsolidated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo consolidado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('create.consolidated') }}" id="kt_form_1" method="post">
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
                                <label for="code" class="form-control-label">* Referencia:</label>
                                <input type="text" name="des" class="form-control" id="des">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code" class="form-control-label">* Courier:</label>
                                <select class="form-control kt-selectpicker" name="courier_id" data-live-search="true">
                                    <option value="">Seleccionar</option>
                                    @foreach( $couriers as $courier )
                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">* Guia master:</label>
                                <input type="text" name="guie" class="form-control" id="guie">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty" class="form-control-label">* Hawbs:</label>
                                <input type="text" name="hawbs" class="form-control" id="hawbs">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unid" class="form-control-label">* Hawbs entregadas:</label>
                                <input type="text" name="hawbs_delivered" class="form-control" id="hawbs_delivered">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-control-label">* Hawns Planet:</label>
                                <input type="text" name="hawns_planet" class="form-control" id="hawns_planet">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fraccion" class="form-control-label">* Fecha de notificacion:</label>
                                <input type="text" name="date_notification" class="form-control kt_datepicker_1" id="date_notification">
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