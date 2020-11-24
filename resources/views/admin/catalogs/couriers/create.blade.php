<div class="modal fade" id="newCourier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Courier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('create.courier') }}" id="kt_form_1" method="post">
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
                        <div class="col">
                            <div class="form-group">
                                <label for="name" class="form-control-label">* Nombre:</label>
                                <input type="text" name="name" class="form-control" id="name">
                             </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">* Ciudad:</label>
                                <input type="text" name="city" class="form-control" id="city">
                             </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">* Postal:</label>
                                <input type="text" name="postal" class="form-control" id="postal">
                             </div>
                            <div class="form-group">
                                <label class="form-control-label">* Pais:</label>
                                <select class="form-control kt-selectpicker" name="country_id" data-live-search="true">
                                    <option value="">Seleccionar</option>
                                    @foreach( $countries as $country )
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
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