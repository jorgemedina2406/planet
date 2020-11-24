<div class="col-lg-2">
    <label class="form-control-label">* Producto:</label>
    <div id="product_delete_0">
        <select class="form-control kt-selectpicker" id="product_add" name="product[]" data-live-search="true">
            <option value="">Seleccionar</option>
            @foreach( $products as $product )
            <option value="{{ $product->id }}" data-id="0" data-route="{{ route('get.product.id', $product->id) }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div id="product"></div>
</div>
<div class="col-lg-2">
    <label class="form-control-label">* Cantidad:</label>
    <input id="qty_delete_0" type="text" name="qty[]" class="form-control" placeholder="" value="" tabindex="1">
    <div id="qty"></div>
</div>
<div class="col-lg-3">
    <label class="form-control-label">* Unidad de factura:</label>
    <input id="unid_delete_0" type="text" name="unid[]" class="form-control" placeholder="" value="" tabindex="2">
    <div id="unid"></div>
</div>
<div class="col-lg-2">
    <label class="form-control-label">* Valor Producto:</label>
    <input id="price_delete_0" type="text" name="price[]" class="form-control" placeholder="" value="" tabindex="3">
    <div id="price"></div>
</div>
<div class="col-lg-2">
    <label class="form-control-label">* Fraccion Arancelaria:</label>
    <input id="fraccion_delete_0" type="text" name="fraccion[]" class="form-control" placeholder="" value="" tabindex="4">
    <div id="fraccion"></div>
</div>
<div class="col-lg-1">
    <label class="form-control-label">Acciones</label>
    <div id="delete_product">
        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm ml-2 delete_product" data-id="delete_0"><i class="la la-trash"></i></button>
    </div>
</div>
<div class="col-lg-12 mt-3">
    <button type="button" class="btn btn-brand" onclick="addProduct();">Agregar otro</button>
</div>