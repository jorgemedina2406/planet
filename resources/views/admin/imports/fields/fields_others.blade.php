<div class="col-3">
    <label class="form-control-label">Fecha de transferencia:</label>
    <input type="text" name="date_transfer" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="{{ (isset($import->date_transfer)) ? $import->date_transfer : '' }}">
</div>
<div class="col-3">
    <label class="form-control-label">Fecha de previo:</label>
    <input type="text" name="date_previous" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="{{ (isset($import->date_previous)) ? $import->date_previous : '' }}">
</div>
<div class="col-3">
    <label class="form-control-label">Fecha de despacho:</label>
    <input type="text" name="date_dispatch" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="{{ (isset($import->date_dispatch)) ? $import->date_dispatch : '' }}">
</div>
<div class="col-3">
    <label class="form-control-label">Fecha de entrega:</label>
    <input type="text" name="date_delivery" class="form-control kt_datepicker_1" autocomplete="false" placeholder="" value="{{ (isset($import->date_delivery)) ? $import->date_delivery : '' }}">
</div>
<div class="col-3 mt-3">
    <label class="form-control-label">Quien recibe:</label>
    <input type="text" name="who_receives" class="form-control" placeholder="" value="{{ (isset($import->who_receives)) ? $import->who_receives : '' }}">
</div>
<div class="col-3 mt-3">
    <label class="form-control-label">Reconocimiento aduanero:</label>
    <select class="form-control kt-selectpicker" name="recognition_id" data-live-search="true"  id="recognition_id">
        <option value="">Seleccionar</option>
        @foreach( $recognitions as $recognition )
        <option value="{{ $recognition->id }}" {{ ($import->recognition_id == $recognition->id) ? 'selected' : '' }}>{{ $recognition->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-3 mt-3">
    <label class="form-control-label">Hora de salida de reconocimiento:</label>
    <input type="text" name="recognition_departure_time" class="form-control" autocomplete="false" id="kt_timepicker_2" placeholder="" value="{{ (isset($import->recognition_departure_time)) ? $import->recognition_departure_time : '' }}">
</div>