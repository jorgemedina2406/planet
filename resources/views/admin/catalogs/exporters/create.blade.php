<div class="modal fade" id="newExporter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo exportador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('create.exporter') }}" id="kt_form_1" method="post">
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
                        <div class="col-md-4">
                            <label class="form-control-label">* Exportador:</label>
                            <input type="text" name="name" id="name" data-route="{{ route('get.exporter.by.name') }}" class="form-control" placeholder="" value="">
                            <label for="" id="no_exist" class="text-success d-none">El nombre no existe</label>
                            <label for="" id="exist" class="text-danger d-none">El nombre existe</label>
                        </div>
                        <div class="col-md-4">
                            <label class="form-control-label">* Pais:</label>
                            <select class="form-control kt-selectpicker" name="country_id" data-live-search="true">
                                <option value="">Seleccionar</option>
                                @foreach( $countries as $country )
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>  
                        </div>
                        <div class="col-md-4">
                            <label class="form-control-label">* Cod. Postal:</label>
                            <input type="text" name="postal" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">RFC o Taxid:</label>
                            <input type="text" name="rfc" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">Calle:</label>
                            <input type="text" name="street" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">Nro. Ext:</label>
                            <input type="text" name="nro_ext" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">Nro. Int:</label>
                            <input type="text" name="nro_int" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">Colonia:</label>
                            <input type="text" name="colony" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">Municipio:</label>
                            <input type="text" name="municipality" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">Entidad Federal:</label>
                            <input type="text" name="federal_entity" class="form-control" placeholder="" value="">
                        </div>                        
                        <div class="col-md-4 mt-3">
                            <label class="form-control-label">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="" value="">
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