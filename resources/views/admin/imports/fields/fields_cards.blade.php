<div class="col-lg-4 mb-3">
    <label class="form-control-label">Carta 1:</label>
    <div class="input-group">
        <select class="form-control kt-selectpicker" id="card_add" name="card_id[]" data-live-search="true">
            <option value="">Seleccionar</option>
            @foreach( $cards as $card )
            <option value="{{ $card->id }}" data-id="0">{{ $card->name }}</option>
            @endforeach
        </select>
        {{-- <div class="input-group-append">
            <button type="button" class="btn btn-danger btn-icon btn-icon-sm delete-evidence"><i class="flaticon2-trash" title="Eliminar Carta"></i></button>
        </div> --}}
    </div>
</div>