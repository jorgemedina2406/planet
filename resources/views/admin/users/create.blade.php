<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('create.user') }}" id="kt_form_1" method="post">
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
                            <div class="form-group">
                                <label for="name" class="form-control-label">* Nombre:</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lastname" class="form-control-label">* Apellido:</label>
                                <input type="text" name="lastname" class="form-control" id="lastname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-control-label">* Email:</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-control-label">* Pais:</label>
                                <select class="form-control" name="country">
                                    <option value="">Seleccionar</option>
                                    @foreach( $countries as $country )
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state" class="form-control-label">* Estado:</label>
                                <input type="text" name="state" class="form-control" id="state">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city" class="form-control-label">* Ciudad:</label>
                                <input type="text" name="city" class="form-control" id="city">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="street" class="form-control-label">* Calle</label>
                                <input type="text" name="street" class="form-control" id="street">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="colony" class="form-control-label">* Colonia</label>
                                <input type="text" name="colony" class="form-control" id="colony">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="municipality" class="form-control-label">* Municipio:</label>
                                <input type="text" name="municipality" class="form-control" id="municipality">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="entity_federal" class="form-control-label">* Entidad federal:</label>
                                <input type="text" name="entity_federal" class="form-control" id="entity_federal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nro_ext" class="form-control-label">* Nro exterior:</label>
                                <input type="text" name="nro_ext" class="form-control" id="nro_ext">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nro_int" class="form-control-label">* Nro interior:</label>
                                <input type="text" name="nro_int" class="form-control" id="nro_int">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="postal" class="form-control-label">* Postal:</label>
                                <input type="text" name="postal" class="form-control" id="postal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password" class="form-control-label">* Contraseña:</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="col-md-12 mt-1">
                            <div class="form-group">
                                <label for="role">* Role</label>
                                <div class="kt-radio-inline">
                                    <label class="kt-radio kt-radio--success">
                                        <input type="radio" name="role" value="Administrador" checked=""> Administrador
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--success">
                                        <input type="radio" name="role" value="Reporteador"> Reporteador
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--success">
                                        <input type="radio" name="role" value="Capturista"> Capturista
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--success">
                                        <input type="radio" name="role" value="Capturista Importacion"> Capturista Importación
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--success mt-3">
                                        <input type="radio" name="role" value="Capturista Exportacion"> Capturista Exportación
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--success mt-3">
                                        <input type="radio" name="role" value="Capturista Consolidados"> Capturista Consolidados
                                        <span></span>
                                    </label>
                                </div>
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