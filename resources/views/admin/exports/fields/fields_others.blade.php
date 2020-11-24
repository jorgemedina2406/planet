<div class="col">
    <label class="form-control-label">Fecha recepcion muestra:</label>
    <input type="text" name="sample_reception_date" class="form-control kt_datepicker_1" placeholder="" value="{{ (isset($export->sample_reception_date)) ? $export->sample_reception_date : '' }}">
</div>
<div class="col">
    <label class="form-control-label">Fecha cruce pedimento:</label>
    <input type="text" name="date_crossing_pediment" class="form-control kt_datepicker_1" placeholder="" value="{{ (isset($export->date_crossing_pediment)) ? $export->date_crossing_pediment : '' }}">
</div>
<div class="col">
    <label class="form-control-label">Reconocimiento aduanero:</label>
    <select class="form-control kt-selectpicker" name="recognition_id" data-live-search="true" id="recognition_id">
        <option value="">Seleccionar</option>
        @foreach( $recognitions as $recognition )
        <option value="{{ $recognition->id }}" {{ ($export->recognition_id == $recognition->id) ? 'selected' : '' }}>{{ $recognition->name }}</option>
        @endforeach
    </select> 
</div>
<div class="col">
    <label class="form-control-label">Hora de salida de reconocimiento:</label>
    <input type="text" name="recognition_departure_time" class="form-control" id="kt_timepicker_2" placeholder="" value="{{ (isset($export->recognition_departure_time)) ? $export->recognition_departure_time : '' }}">
</div>