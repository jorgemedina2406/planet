@extends('admin.template')

@section('styles')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->

<style>
.dropdown-menu{
    z-index: 100;
}
</style>
@endsection

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.catalogs.products.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Crear Exportacion </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            crear exportacion </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

            <!--begin::Portlet-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Crear exportacion
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" id="kt_form_1" method="post" action="{{ route('create.export') }}"  novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="kt-portlet__body pb-0">
                                <div class="kt-section mb-0">
                                    <div class="kt-section__content">
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
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                <label class="form-control-label">* Referencia:</label>
                                                <input type="text" name="reference" class="form-control" placeholder="" value="">
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label">* Courier:</label>
                                                <select class="form-control kt-selectpicker" name="courier_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $couriers as $courier )
                                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label">* Fecha de notificacion:</label>
                                                <input type="text" name="date_notification" id=""  class="form-control kt_datepicker_1" placeholder="" value="" autocomplete="false">
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label">* MAWB:</label>
                                                <input type="text" name="mawb" class="form-control" placeholder="" value="">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* HAWB:</label>
                                                <input type="text" name="hawb" class="form-control" placeholder="" value="">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Linea aerea:</label>
                                                <select class="form-control kt-selectpicker" name="line_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $lines as $line )
                                                    <option value="{{ $line->id }}">{{ $line->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Numero de vuelo:</label>
                                                <input type="text" name="flight" class="form-control" placeholder="" value="">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Fecha de vuelo:</label>
                                                <input type="text" name="date_flight" id="" class="form-control kt_datepicker_1" placeholder="" value="" autocomplete="false">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* CR:</label>
                                                <select class="form-control kt-selectpicker" name="cr_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $crs as $cr )
                                                    <option value="{{ $cr->id }}">{{ $cr->code }} - {{ $cr->name }}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Incoterm:</label>
                                                <select class="form-control kt-selectpicker" name="incoterm_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $incoterms as $incoterm )
                                                    <option value="{{ $incoterm->id }}">{{ $incoterm->name }}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Exportador:</label>
                                                <select class="form-control kt-selectpicker" name="exporter_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $exporters as $exporter )
                                                    <option value="{{ $exporter->id }}">{{ $exporter->name }}</option>
                                                    @endforeach
                                                </select>                                            
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Shipper:</label>
                                                <select class="form-control kt-selectpicker" name="shipper" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $exporters as $shipper )
                                                    <option value="{{ $shipper->id }}">{{ $shipper->name }}</option>
                                                    @endforeach
                                                </select>                                             
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Consignatorio:</label>
                                                <select class="form-control kt-selectpicker" name="consignee_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $consignatories as $consignee )
                                                    <option value="{{ $consignee->id }}">{{ $consignee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Pais destino:</label>
                                                <div id="country">
                                                    <input type="text" id="country_old" name="destination_country" class="form-control" placeholder="" value="" readonly>
                                                    {{-- <select class="form-control kt-selectpicker" id="country_old" name="destination_country" data-live-search="true">
                                                        <option value="">Seleccionar</option>
                                                        @foreach( $countries as $country )
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>                                             --}}
                                                </div>
                                                <div id="country_new"></div>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Aeropuerto Codigo IATA:</label>
                                                <select class="form-control kt-selectpicker" id="airport" name="airport" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $airports as $airport )
                                                    <option value="{{ $airport->code }}" data-id="{{ $airport->country }} - {{ $airport->city }}">{{ $airport->code }} - {{ $airport->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Nro de facturas:</label>
                                                <input type="number" name="nro_invoices" class="form-control" placeholder="" value="">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Fecha de factura:</label>
                                                <input type="text" name="date_invoices" class="form-control kt_datepicker_1" id="" placeholder="" value="" autocomplete="false">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-5">
                                    <div class="kt-section__content">
                                        
                                        <div class="form-group row">
                                            <div class="col-md-6 border-right pr-5">
                                                <h4>Patente</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS PATENTS -->
                                                    <div class="col">
                                                        <label class="form-control-label">Patente:</label>
                                                        <select class="form-control kt-selectpicker" name="patent_id" id="patent" data-live-search="true">
                                                            <option value="" data-name="">Seleccionar</option>
                                                            @foreach( $patents as $patent )
                                                            <option value="{{ $patent->id }}" data-xyz="{{ $patent->agent_aduanal }}">{{ $patent->patent }}</option>
                                                            @endforeach
                                                        </select></div>
                                                    <div class="col">
                                                        <label class="form-control-label">Agente Aduanal:</label>
                                                        <input type="text" name="agent_aduanal" class="form-control" id="agent_aduanal" placeholder="" value="" readonly>
                                                    </div>
                                                    <!-- END FIELDS PATENTS -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <h4>Pedimentos</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS PEDIMENTS -->
                                                    @include('admin.exports.fields.fields_pediments')
                                                    <!-- END FIELDS PEDIMENTS -->
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-5">

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                {{-- <h4>Patente</h4> --}}
                                                <div class="form-group row mt-2">
                                                    <!-- FIELDS OTHERS -->
                                                    @include('admin.exports.fields.fields_others_create')
                                                    <!-- END FIELDS OTHERS -->
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-5">

                                        <div class="form-group row">
                                            <div class="col-md-6 border-right pr-5">
                                                <h4>Protocolos</h4>
                                                <div class="form-group row mt-5" id="protocol">
                                                    <!-- FIELDS PROTOCOLS -->
                                                    @include('admin.exports.fields.fields_protocols')
                                                    <!-- END FIELDS PROTOCOLS -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">&nbsp;</label>
                                                        <button type="button" class="btn btn-brand" onclick="addProtocol();">Agregar otro</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl-5">
                                                <h4>Cartas</h4>
                                                <div class="form-group row mt-5" id="card">
                                                    <!-- FIELDS CARDS -->
                                                    @include('admin.exports.fields.fields_cards')
                                                    <!-- END FIELDS CARDS -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">&nbsp;</label>
                                                        <button type="button" class="btn btn-brand" onclick="addCard();">Agregar otro</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr class="my-5">
                                        <h4>Datos de los productos</h4>
                                        <div class="form-group row mt-5">
                                            <!-- FIELDS PRODUCTS -->
                                            @include('admin.exports.fields.fields_products')
                                            <!-- END FIELDS PRODUCTS -->
                                        </div>
                                        <hr class="my-5">
                                        <h4>Datos de los permisos</h4>
                                        <div class="form-group row mt-5">
                                            <!-- FIELDS PERMISSIONS -->
                                            @include('admin.exports.fields.fields_permissions')
                                            <!-- END FIELDS PERMISSIONS -->
                                        </div>
                                        <hr class="my-5">
                                        <h4>Datos de los impuestos</h4>
                                        <div class="form-group row mt-5">
                                            <!-- FIELDS PERMISSIONS -->
                                            @include('admin.exports.fields.taxs')
                                            <!-- END FIELDS PERMISSIONS -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    
                                    <div class="row text-left">
                                        <div class="col">
                                            <label for="exampleInputEmail1">Agregar Evidencia 1</label>
                                            <div></div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="evidence_one" name="evidence[]" accept="application/pdf">
                                                <label class="custom-file-label" for="evidence">Buscar archivo</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">Agregar Evidencia 2</label>
                                            <div></div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="evidence_two" name="evidence[]" accept="application/pdf">
                                                <label class="custom-file-label" for="evidence">Buscar archivo</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">Agregar Evidencia 3</label>
                                            <div></div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="evidence_three" name="evidence[]" accept="application/pdf">
                                                <label class="custom-file-label" for="evidence">Buscar archivo</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">Agregar Evidencia 4</label>
                                            <div></div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="evidence_four" name="evidence[]" accept="application/pdf">
                                                <label class="custom-file-label" for="evidence">Buscar archivo</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col d-none" id="evidenceAdd">
                                        
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1"> &nbsp;</label>
                                            <div></div>
                                            <div class="custom-file">
                                                <button type="button" id="addEvidence" class="btn btn-brand">Agregar otra</button>
                                            </div>
                                        </div>                                      --}}
                                    </div>
                                    <div class="row text-right mt-4">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-brand" id="save">Guardar</button>
                                            <a href="{{ route('exports') }}" class="btn btn-secondary">Regresar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>

                    <!--end::Portlet-->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
@section('scripts')

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/validation/exports-validation.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/file-upload/dropzonejs.js') }}" type="text/javascript"></script>

<script>
    /* GET COUNTRY BY AIRPORT */
    $('#airport').on('change', function(){

        country    = $(this).find(":selected").data('id'); 
        
        // var passedArray = @json($countries);
        // var options = '';
        // var dataRoute = '<option value="">Seleccionar</option>';
        // var selected = '';

        // for(var i = 0; i < passedArray.length; i++){
            
        //     if( id === passedArray[i].id ) {
        //         var selected = 'selected';
        //     }

        //     options += '<option value="' + passedArray[i].id +'" '+selected+'>' + passedArray[i].name +'</option>';

        //     var selected = '';
        // }

        // select = '<div id="new_country"><select class="form-control kt-selectpicker" name="destination_country" data-live-search="true">\
        //                 '+options+'\
        //          </select></div>';

        $('#country_old').attr('value', country)


        // $('#country').remove();
        // $('#new_country').remove();
        // $('#country_new').append(select);
        // $('.kt-selectpicker').selectpicker();

    });
    /* END GET COUNTRY BY AIRPORT */

    $('#product_add').on('change', function(){
        route = $(this).find(":selected").data('route');
        id    = $(this).find(":selected").data('id');

        $.ajax({
            url: route,
            type: 'get'
        }).done(function(data) {
            $('#qty_delete_'+id).val(data.qty);
            $('#unid_delete_'+id).val(data.unid);
            $('#price_delete_'+id).val(data.price);
            $('#fraccion_delete_'+id).val(data.fraccion);
        });

    });

    $(document).on('change', '#product_adds', function(){
        route = $(this).find(":selected").data('route');
        id    = $(this).data('id');

        $.ajax({
            url: route,
            type: 'get'
        }).done(function(data) {
            $('#qty_delete_'+id).val(data.qty);
            $('#unid_delete_'+id).val(data.unid);
            $('#price_delete_'+id).val(data.price);
            $('#fraccion_delete_'+id).val(data.fraccion);
        });

    });
</script>

<script type="text/javascript">

    $('#patent').change(function(){
        agent = $(this).find(":selected").data('xyz');
        $('#agent_aduanal').val(agent);
    });

    $('#addEvidence').click(function(){
        field_evidence = '\
            <label for="exampleInputEmail1">Agregar Evidencia 3</label>\
            <div></div>\
            <div class="custom-file">\
                <input type="file" class="custom-file-input" name="evidence[]" accept="application/pdf">\
                <label class="custom-file-label" for="evidence">Buscar archivo</label>\
            </div>\
        ';

        $('#evidenceAdd').removeClass('d-none');
        $('#evidenceAdd').append(field_evidence);
    });

    var nextinput = 0;
    var tabindex = 5;

    function addProduct(){

        nextinput++;
        tabindex++;
        id = 'delete_' + nextinput;

        var passedArray = @json($products);
        var options = '<option value="">Seleccionar</option>';
        // var dataRoute = '<option value="">Seleccionar</option>';

        for(var i = 0; i < passedArray.length; i++){
            dataRoute = 'http://localhost/planet/public/administracion/catalogos/get-product-id/'+passedArray[i].id;
            options += '<option value="' + passedArray[i].id +'" data-route="'+dataRoute+'">' + passedArray[i].name +'</option>';
        }

        field_delete_product = '<div><button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm mt-4 ml-2 delete_product" data-id="'+id+'"><i class="la la-trash"></i></button><div>';

        field_product = '<div id="product_'+id+'"><select class="form-control mt-3 kt-selectpicker product_adds" id="product_adds" data-id="'+nextinput+'" name="product[]" data-live-search="true">' + options + '</select></div>';
        field_qty = '<input id="qty_'+id+'" type="text" name="qty[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindex+1)+'">';
        field_unid = '<input id="unid_'+id+'" type="text" name="unid[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindex+1)+'">';
        field_price = '<input id="price_'+id+'" type="text" name="price[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindex+1)+'">';
        field_fraccion = '<input id="fraccion_'+id+'" type="text" name="fraccion[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindex+1)+'">';

        $("#delete_product").append(field_delete_product);
        $("#product").append(field_product);
        $('.kt-selectpicker').selectpicker();
        $("#qty").append(field_qty);
        $("#unid").append(field_unid);
        $("#price").append(field_price);
        $("#fraccion").append(field_fraccion);

        $('.delete_product').click(function(){
            id_delete = $(this).data('id');

            $("#product_" + id_delete).remove();
            $("#qty_" + id_delete).remove();
            $("#unid_" + id_delete).remove();
            $("#price_" + id_delete).remove();
            $("#fraccion_" + id_delete).remove();
            $(this).remove();

        });
    }

    function addProtocol(){

        nextinput++;
        id = 'delete_' + nextinput;

        var passedArray = @json($protocols);
        // var options = '';
        var options = '<option value="">Seleccionar</option>';

        for(var i = 0; i < passedArray.length; i++){
            options += '<option value="' + passedArray[i].id +'">' + passedArray[i].name +'</option>';
        }

        field_delete_protocol = '<div><button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm mt-4 ml-2 delete_protocol" data-id="'+id+'"><i class="la la-trash"></i></button><div>';

        field_protocol = '<div class="col-lg-4 mb-3" id="protocol_'+nextinput+'">\
                    <label class="form-control-label">Protocolo '+(nextinput+1)+':</label>\
                    <div id="protocol_'+id+'" class="input-group">\
                        <select class="form-control kt-selectpicker protocol_adds" id="protocol_adds" name="protocol_id[]" data-live-search="true">' + options + '</select>\
                        <div class="input-group-append">\
                            <button data-id="'+nextinput+'" type="button" class="btn btn-danger btn-icon btn-icon-sm delete_protocol">\
                                <i class="flaticon2-trash" title="Eliminar Protocolo"></i>\
                            </button>\
                        </div>\
                    </div>\
                    </div>';

        $("#delete_protocol").append(field_delete_protocol);
        $("#protocol").append(field_protocol);
        $('.kt-selectpicker').selectpicker();

        $('.delete_protocol').click(function(){
            id_delete = $(this).data('id');

            $("#protocol_" + id_delete).remove();
            $(this).remove();
            nextinput--;

        });
    }

    function addCard(){

        nextinput++;
        id = 'delete_' + nextinput;

        var passedArray = @json($cards);
        // var options = '';
        var options = '<option value="">Seleccionar</option>';

        for(var i = 0; i < passedArray.length; i++){
            options += '<option value="' + passedArray[i].id +'">' + passedArray[i].name +'</option>';
        }

        field_delete_card = '<div><button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm mt-4 ml-2 delete_card" data-id="'+id+'"><i class="la la-trash"></i></button><div>';

        field_card = '<div class="col-lg-4 mb-3" id="card_'+nextinput+'">\
                    <label class="form-control-label">Carta '+(nextinput+1)+':</label>\
                    <div id="card_'+id+'" class="input-group">\
                        <select class="form-control kt-selectpicker card_adds" id="card_adds" name="card_id[]" data-live-search="true">' + options + '</select>\
                        <div class="input-group-append">\
                            <button data-id="'+nextinput+'" type="button" class="btn btn-danger btn-icon btn-icon-sm delete_card">\
                                <i class="flaticon2-trash" title="Eliminar Carta"></i>\
                            </button>\
                        </div>\
                    </div>\
                    </div>';

        $("#delete_card").append(field_delete_card);
        $("#card").append(field_card);
        $('.kt-selectpicker').selectpicker();

        $('.delete_card').click(function(){
            id_delete = $(this).data('id');

            $("#card_" + id_delete).remove();
            $(this).remove();
            nextinput--;

        });
    }

    function addPediment(){

        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }

        nextinput++;

        var passedArray = @json($pediments);
        var options = '';

        for(var i = 0; i < passedArray.length; i++){
            options += '<option value="' + passedArray[i].id +'">' + passedArray[i].pediment +'</option>';
        }

        field_pediment = '<select class="form-control kt-selectpicker" name="pediment_id[]" data-live-search="true">' + options + '</select>';
        field_nro_pediment = '<input type="text" name="nro_pediment[]" class="form-control mt-3" placeholder="" value="">';
        field_date_pediment = '<input type="text" name="date_pay[]" class="form-control kt_datepicker_1 mt-3" placeholder="" value="">';

        $("#pediment").append(field_pediment);
        $('.kt-selectpicker').selectpicker();
        $("#date_pediment").append(field_date_pediment);
        $("#nro_pediment").append(field_nro_pediment);

        $('.kt_datepicker_1').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows,
            format: 'dd/mm/yyyy',
        });
    }

    var tabindexPermit = 24;
    function addPermit(){
        
        tabindexPermit++;

        nextinput++;
        id = 'delete_permit_' + nextinput;

        var passedArray = @json($permissions);
        var options = '<option value="">Seleccionar</option>';

        for(var i = 0; i < passedArray.length; i++){
            // dataRoute = 'http://localhost/planet/public/administracion/catalogos/get-product-id/'+passedArray[i].id;
            options += '<option value="' + passedArray[i].id +'">' + passedArray[i].name +'</option>';
        }

        field_delete_permission = '<div><button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm mt-4 ml-2 delete_permission" data-id="'+id+'"><i class="la la-trash"></i></button></div>';

        field_permit = '<div id="permission_'+id+'"><select class="form-control mt-3 kt-selectpicker" name="permission[]" data-live-search="true">' + options + '</select></div>';
        field_previous_balance = '<input id="previous_'+id+'" type="text" name="previous_balance[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindexPermit+1)+'">';
        field_permit_discharge = '<input id="discharge_'+id+'" type="text" name="permit_discharge[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindexPermit+1)+'">';
        field_current_balance = '<input id="current_'+id+'" type="text" name="current_balance[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindexPermit+1)+'">';

        $("#delete_permission").append(field_delete_permission);
        $("#permit").append(field_permit);
        $('.kt-selectpicker').selectpicker();
        $("#previous_balance").append(field_previous_balance);
        $("#permit_discharge").append(field_permit_discharge);
        $("#current_balance").append(field_current_balance);

        $('.delete_permission').click(function(){
            id_delete = $(this).data('id');

            $("#permission_" + id_delete).remove();
            $("#previous_" + id_delete).remove();
            $("#discharge_" + id_delete).remove();
            $("#current_" + id_delete).remove();
            $(this).remove();

        });
    }
</script>  
<!--end::Page Scripts -->

@endsection

@endsection
