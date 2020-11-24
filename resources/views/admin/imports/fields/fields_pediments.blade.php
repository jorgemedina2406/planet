<div class="col-4">
    <label class="form-control-label">Pedimento:</label>
    <select class="form-control kt-selectpicker" name="pediment_id[]" data-live-search="true">
        @foreach( $pediments as $pediment )
        <option value="{{ $pediment->id }}">{{ $pediment->pediment }}</option>
        @endforeach
    </select>
    <div id="pediment" class="mt-3"></div>
</div>
<div class="col-4">
    <label class="form-control-label">Numero:</label>
    <input type="text" name="nro_pediment[]" class="form-control" placeholder="" value="">
    <div id="nro_pediment" class="mt-3"></div>
</div>
<div class="col-4">
    <label class="form-control-label">Fecha:</label>
    <input type="text" name="date_pay[]" class="form-control kt_datepicker_1" placeholder="" value="">
    <div id="date_pediment" class="mt-3"></div>
</div>
<div class="col-lg-12 mt-3">
    <button type="button" class="btn btn-brand" onclick="addPediment();">Agregar otro</button>
</div>