<div class="col-lg-3">
    <label class="form-control-label">Permiso:</label>
    <select class="form-control kt-selectpicker" id="permission_add" name="permission[]" data-live-search="true">
        <option value="">Seleccionar</option>
        @foreach( $permissions as $permission )
        <option value="{{ $permission->id }}" data-id="0">{{ $permission->name }}</option>
        @endforeach
    </select>
    <div id="permit"></div>
</div>
<div class="col-lg-3">
    <label class="form-control-label">Saldo anterior:</label>
    <input type="text" name="previous_balance[]" class="form-control" placeholder="" value="" tabindex="21">
    <div id="previous_balance"></div>
</div>
<div class="col-lg-3">
    <label class="form-control-label">Descargo de permiso:</label>
    <input type="text" name="permit_discharge[]" class="form-control" placeholder="" value="" tabindex="22">
    <div id="permit_discharge"></div>
</div>
<div class="col-lg-2">
    <label class="form-control-label">Saldo actual:</label>
    <input type="text" name="current_balance[]" class="form-control" placeholder="" value="" tabindex="23">
    <div id="current_balance"></div>
</div>
<div class="col-lg-1 pt-3">
    <div class="py-3" id="delete_permission">
        <label class="form-control-label">&nbsp;</label>
        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="la la-trash"></i></button>
    </div>
</div>
<div class="col-lg-12 mt-3">
    <button type="button" class="btn btn-brand" onclick="addPermit();">Agregar otro</button>
</div>