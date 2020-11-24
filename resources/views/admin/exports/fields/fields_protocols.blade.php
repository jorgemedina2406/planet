<div class="col-lg-4 mb-3">
    <label class="form-control-label">Protocolo 1:</label>
    <div class="input-group">
        <select class="form-control kt-selectpicker" id="protocol_add" name="protocol_id[]" data-live-search="true">
            <option value="">Seleccionar</option>
            @foreach( $protocols as $protocol )
            <option value="{{ $protocol->id }}" data-id="0">{{ $protocol->name }}</option>
            @endforeach
        </select>
        {{-- <div class="input-group-append">
            <button type="button" class="btn btn-danger btn-icon btn-icon-sm delete-evidence"><i class="flaticon2-trash" title="Eliminar Protocolo"></i></button>
        </div> --}}
    </div>
</div>