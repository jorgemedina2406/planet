<div class="col-3">
    <label class="form-control-label">Fecha de transferencia:</label>
    <input type="text" name="date_transfer" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="">
</div>
<div class="col-3">
    <label class="form-control-label">Fecha de previo:</label>
    <input type="text" name="date_previous" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="">
</div>
<div class="col-3">
    <label class="form-control-label">Fecha de despacho:</label>
    <input type="text" name="date_dispatch" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="">
</div>
<div class="col-3">
    <label class="form-control-label">Fecha de entrega:</label>
    <input type="text" name="date_delivery" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="">
</div>
<div class="col-3 mt-3">
    <label class="form-control-label">Quien recibe:</label>
    <input type="text" name="who_receives" class="form-control" placeholder="" value="">
</div>
<div class="col-3 mt-3">
    <label class="form-control-label">Reconocimiento aduanero:</label>
    <select class="form-control kt-selectpicker" name="recognition_id" data-live-search="true">
        <option value="">Seleccionar</option>
        @foreach( $recognitions as $recognition )
        <option value="{{ $recognition->id }}">{{ $recognition->name }}</option>
        @endforeach
    </select></div>
<div class="col-3 mt-3">
    <label class="form-control-label">Hora de salida de reconocimiento:</label>
    <input type="text" name="recognition_departure_time" class="form-control" autocomplete="false" id="kt_timepicker_2" placeholder="" value="">
</div>