<div class="col">
    <label class="form-control-label">Patente:</label>
    <select class="form-control kt-selectpicker" name="patent_id" id="patent" data-live-search="true">
        <option value="" data-name="">Seleccionar</option>
        @foreach( $patents as $patent )
        <option value="{{ $patent->id }}" data-xyz="{{ $patent->agent_aduanal }}" {{ ($patent->id == $import->patent_id) ? 'selected' : '' }}>{{ $patent->patent }}</option>
        @endforeach
    </select></div>
<div class="col">
    <label class="form-control-label">Agente Aduanal:</label>
    @php
        $agent = (isset($import->patent)) ? $import->patent->agent_aduanal : '';
    @endphp
    <input type="text" name="agent_aduanal" class="form-control" id="agent_aduanal" placeholder="" value="{{ $agent }}" readonly>
</div>