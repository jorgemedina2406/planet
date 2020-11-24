@extends('admin.template')

@section('styles')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->
@endsection

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.catalogs.products.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        @include('admin.exports.modal-observation')


        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Editar Exportacion </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            editar exportacion </a>
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
                                    Datos de la exportacion
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" id="kt_form_1" method="post" action="{{ route('update.export', $export->id) }}"  novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $export->id }}">
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
                                                <input type="text" name="reference" class="form-control" placeholder="" value="{{ $export->reference }}">
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label">* Courier:</label>
                                                <select class="form-control kt-selectpicker" name="courier_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $couriers as $courier )
                                                    <option value="{{ $courier->id }}" {{ ($courier->id == $export->courier_id) ? 'selected' : '' }}>{{ $courier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label">* Fecha de notificacion:</label>
                                                <input type="text" name="date_notification" id=""  class="form-control kt_datepicker_1" placeholder="" value="{{ $export->date_notification }}">
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label">* MAWB:</label>
                                                <input type="text" name="mawb" class="form-control" placeholder="" value="{{ $export->mawb }}">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* HAWB:</label>
                                                <input type="text" name="hawb" class="form-control" placeholder="" value="{{ $export->hawb }}">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Linea Aerea:</label>
                                                <select class="form-control kt-selectpicker" name="line_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $lines as $line )
                                                    <option value="{{ $line->id }}" {{ ($line->id == $export->line_id) ? 'selected' : '' }}>{{ $line->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Numero de vuelo:</label>
                                                <input type="text" name="flight" class="form-control" placeholder="" value="{{ $export->flight }}">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Fecha de vuelo:</label>
                                                <input type="text" name="date_flight" id="" class="form-control kt_datepicker_1" placeholder="" value="{{ $export->date_flight }}">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* CR:</label>
                                                <select class="form-control kt-selectpicker" name="cr_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $crs as $cr )
                                                    <option value="{{ $cr->id }}" {{ ($cr->id == $export->cr_id) ? 'selected' : '' }}>{{ $cr->code }} - {{ $cr->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Incoterm:</label>
                                                <select class="form-control kt-selectpicker" name="incoterm_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $incoterms as $incoterm )
                                                    <option value="{{ $incoterm->id }}" {{ ($incoterm->id == $export->incoterm_id) ? 'selected' : '' }}>{{ $incoterm->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Exportador:</label>
                                                <select class="form-control kt-selectpicker" name="exporter_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $exporters as $exporter )
                                                    <option value="{{ $exporter->id }}" {{ ($exporter->id == $export->exporter_id) ? 'selected' : '' }}>{{ $exporter->name }}</option>
                                                    @endforeach
                                                </select>                                            
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Shipper:</label>
                                                <select class="form-control kt-selectpicker" name="shipper" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $exporters as $shipper )
                                                    <option value="{{ $shipper->id }}" {{ ($shipper->id == $export->shipper) ? 'selected' : '' }}>{{ $shipper->name }}</option>
                                                    @endforeach
                                                </select>                                             
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Consignatorio:</label>
                                                <select class="form-control kt-selectpicker" name="consignee_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $consignatories as $consignee )
                                                    <option value="{{ $consignee->id }}" {{ ($consignee->id == $export->consignee_id) ? 'selected' : '' }}>{{ $consignee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Pais destino:</label>
                                                {{-- <div id="country"> --}}
                                                    <input type="text" id="country_old" name="destination_country" class="form-control" value="{{ $export->destination_country }}" readonly>
                                                    {{-- <select class="form-control kt-selectpicker" id="country_old" name="destination_country" data-live-search="true">
                                                        <option value="">Seleccionar</option>
                                                        @foreach( $countries as $country )
                                                        <option value="{{ $country->nam }}" {{ ($country->id == $export->destination_country) ? 'selected' : '' }}>{{ $country->name }}</option>
                                                        @endforeach
                                                    </select> --}}
                                                {{-- </div>      --}}
                                                {{-- <div id="country_new"></div>                                       --}}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Aeropuerto codigo IATA:</label>
                                                <select class="form-control kt-selectpicker" id="airport" name="airport" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $airports as $airport )
                                                    <option value="{{ $airport->code }}" {{ ($airport->code == $export->airport) ? 'selected' : '' }} data-id="{{ $airport->country }} - {{ $airport->city }}">{{ $airport->code }} - {{ $airport->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Nro de facturas:</label>
                                                <input type="number" name="nro_invoices" class="form-control" placeholder="" value="{{ $export->nro_invoices }}">
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label">* Fecha de factura:</label>
                                                <input type="text" name="date_invoices" class="form-control kt_datepicker_1" id="" placeholder="" value="{{ $export->date_invoices }}">
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
                                                    @include('admin.exports.fields.fields_patents')
                                                    <!-- END FIELDS PATENTS -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <h4>Pedimentos</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS PEDIMENTS -->
                                                    @foreach( $pedimentsExports as $item )
                                                        <div class="col-4">
                                                            <label class="form-control-label">Pedimento:</label>
                                                            <select class="form-control kt-selectpicker" name="pediment_id[]" data-live-search="true">
                                                                @foreach( $pediments as $pediment )
                                                                <option value="{{ $pediment->id }}" {{ ($pediment->id == $item->pediment_id) ? 'selected' : '' }}>{{ $pediment->pediment }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="pediment" class="mt-3"></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label class="form-control-label">Numero:</label>
                                                            <input type="text" name="nro_pediment[]" class="form-control" placeholder="" value="{{ $item->nro_pediment }}">
                                                            <div id="nro_pediment" class="mt-3"></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label class="form-control-label">Fecha:</label>
                                                            <input type="text" name="date_pay[]" class="form-control kt_datepicker_1" placeholder="" value="{{ $item->date_pay }}">
                                                            <div id="date_pediment" class="mt-3"></div>
                                                        </div>
                                                    @endforeach
                                                    <div class="col-lg-12 mt-3">
                                                        <button type="button" class="btn btn-brand" onclick="addPediment();">Agregar otro</button>
                                                    </div>
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
                                                    @include('admin.exports.fields.fields_others')
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
                                                    @foreach( $protocolsExports as $key => $item )
                                                        {{-- <input type="hidden" name="protocol_id" value="{{ $item->id }}"> --}}

                                                        <div class="col-lg-4">
                                                            <label class="form-control-label">Protocolo {{ $key+1 }}:</label>
                                                            <div class="input-group">
                                                                <select class="form-control kt-selectpicker" id="protocol_add" name="protocol_id[]" data-live-search="true">
                                                                    <option value="">Seleccionar</option>
                                                                    @foreach( $protocols as $protocol )
                                                                    <option value="{{ $protocol->id }}" data-id="0" {{ ($protocol->id == $item->protocol_id) ? 'selected' : ' '}}>{{ $protocol->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-danger btn-icon btn-icon-sm delete-protocol" data-route="{{ route('delete.protocol.export', $item->id) }}"><i class="flaticon2-trash" title="Eliminar Protocolo"></i></button>
                                                                </div>
                                                            </div>                                                       
                                                        </div>

                                                    @endforeach
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">&nbsp;</label>
                                                        <button type="button" class="btn btn-brand" onclick="addProtocol({{count($protocolsExports)}});">Agregar otro</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl-5">
                                                <h4>Cartas</h4>
                                                <div class="form-group row mt-5" id="card">
                                                    <!-- FIELDS CARDS -->
                                                    @foreach( $cardsExports as $key => $item )
                                                        {{-- <input type="hidden" name="card_id" value="{{ $item->id }}"> --}}

                                                        <div class="col-lg-4">
                                                            <label class="form-control-label">Carta {{ $key+1 }}:</label>
                                                            <div class="input-group">
                                                                <select class="form-control kt-selectpicker" id="card_add" name="card_id[]" data-live-search="true">
                                                                    <option value="">Seleccionar</option>
                                                                    @foreach( $cards as $card )
                                                                    <option value="{{ $card->id }}" data-id="0" {{ ($card->id == $item->card_id) ? 'selected' : ' '}}>{{ $card->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-danger btn-icon btn-icon-sm delete-card" data-route="{{ route('delete.card.export', $item->id) }}"><i class="flaticon2-trash" title="Eliminar Protocolo"></i></button>
                                                                </div>
                                                            </div>                                                       
                                                        </div>

                                                    @endforeach
                                                    <!-- END FIELDS CARDS -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">&nbsp;</label>
                                                        <button type="button" class="btn btn-brand" onclick="addCard({{count($cardsExports)}});">Agregar otro</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr class="my-5">
                                        
                                        <h4>Datos de los productos</h4>
                                        <div class="form-group row mt-5">
                                            @foreach( $productsExports as $key => $item )
                                            <div class="col-lg-2 mt-4">
                                                    @if($key == 0)
                                                    <label class="form-control-label">* Producto:</label>
                                                    @endif
                                                    <select class="form-control kt-selectpicker product_add" id="product_add" name="product[]" data-live-search="true">
                                                        <option value="">Seleccionar</option>
                                                        @foreach( $products as $product )
                                                        <option value="{{ $product->id }}" data-id="{{ $key }}" data-route="{{ route('get.product.id', $product->id) }}" {{ ($product->id == $item->product_id) ? 'selected' : '' }}>{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <div id="product"></div> --}}
                                                </div>
                                                <div class="col-lg-2 mt-4">
                                                    @if($key == 0)
                                                    <label class="form-control-label">* Cantidad:</label>
                                                    @endif
                                                    <input id="qty_delete_product_{{ $key }}" type="text" name="qty[]" class="form-control" placeholder="" value="{{ $item->qty }}">
                                                    {{-- <div id="qty"></div> --}}
                                                </div>
                                                <div class="col-lg-3 mt-4">
                                                    @if($key == 0)
                                                    <label class="form-control-label">* Unidad de factura:</label>
                                                    @endif
                                                    <input id="unid_delete_product_{{ $key }}" type="text" name="unid[]" class="form-control" placeholder="" value="{{ $item->unid }}">
                                                    {{-- <div id="unid"></div> --}}
                                                </div>
                                                <div class="col-lg-2 mt-4">
                                                    @if($key == 0)
                                                    <label class="form-control-label">* Valor Producto:</label>
                                                    @endif
                                                    <input id="price_delete_product_{{ $key }}" type="text" name="price[]" class="form-control" placeholder="" value="{{ $item->price }}">
                                                    {{-- <div id="price"></div> --}}
                                                </div>
                                                <div class="col-lg-2 mt-4">
                                                    @if($key == 0)
                                                    <label class="form-control-label">* Fraccion Arancelaria:</label>
                                                    @endif
                                                    <input id="fraccion_delete_product_{{ $key }}" type="text" name="fraccion[]" class="form-control" placeholder="" value="{{ $item->fraccion }}">
                                                    {{-- <div id="fraccion"></div> --}}
                                                </div>
                                                <div class="col-lg-1">
                                                    @if( $key == 0 )
                                                    <label class="form-control-label mt-4">Acciones</label>
                                                    @else
                                                    <label class="form-control-label">&nbsp;</label>
                                                    @endif
                                                    <div>
                                                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm ml-2 delete_product" data-route="{{ route('delete.product.import',$item->id) }}"><i class="la la-trash"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                                <div class="col-lg-2">
                                                    <div id="product"></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div id="qty"></div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div id="unid"></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div id="price"></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div id="fraccion"></div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div id="delete_product">
                                                    </div>
                                                </div>
                                            <div class="col-lg-12 mt-3">
                                                <button type="button" class="btn btn-brand" onclick="addProduct();">Agregar otro</button>
                                            </div>
                                        </div>

                                        <hr class="my-5">

                                        <h4>Datos de los permisos</h4>
                                        <div class="form-group row mt-2">
                                            <!-- FIELDS PERMISSIONS -->
                                            <div class="col-lg-3 mt-4">
                                                <label class="form-control-label">Permiso:</label>
                                            </div>
                                            <div class="col-lg-3 mt-4">
                                                <label class="form-control-label">Saldo anterior:</label>
                                            </div>
                                            <div class="col-lg-2 mt-4">
                                                <label class="form-control-label">Descargo de permiso:</label>
                                            </div>
                                            <div class="col-lg-2 mt-4">
                                                <label class="form-control-label">Saldo actual:</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="form-control-label mt-4">Acciones</label>
                                                <label class="form-control-label">&nbsp;</label>
                                            </div>
                                            @foreach( $permissionsExports as $item )
                                                <div class="col-lg-3 mt-4">
                                                   
                                                    <select class="form-control kt-selectpicker permission_add" id="permission_add" name="permission[]" data-live-search="true">
                                                        <option value="">Seleccionar</option>
                                                        @foreach( $permissions as $permission )
                                                        <option value="{{ $permission->id }}" {{ ($permission->id == $item->permit) ? 'selected' : '' }}>{{ $permission->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 mt-4">
                                                    
                                                    <input type="text" name="previous_balance[]" class="form-control" placeholder="" value="{{ $item->previous_balance }}">
                                                    {{-- <div id="previous_balance"></div> --}}
                                                </div>
                                                <div class="col-lg-2 mt-4">
                                                    
                                                    <input type="text" name="permit_discharge[]" class="form-control" placeholder="" value="{{ $item->permit_discharge }}">
                                                    {{-- <div id="permit_discharge"></div> --}}
                                                </div>
                                                <div class="col-lg-2 mt-4">
                                                    
                                                    <input type="text" name="current_balance[]" class="form-control" placeholder="" value="{{ $item->current_balance }}">
                                                    {{-- <div id="current_balance"></div> --}}
                                                </div>
                                                <div class="col-lg-2 mt-4">
                                                    <div>
                                                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm ml-2 delete_permission" data-route="{{ route('delete.permission.export',$item->id) }}"><i class="la la-trash"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-lg-3">
                                                <div id="permit"></div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div id="previous_balance"></div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div id="permit_discharge"></div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div id="current_balance"></div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div id="delete_permission">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <button type="button" class="btn btn-brand" onclick="addPermit();">Agregar otro</button>
                                            </div>
                                            <!-- END FIELDS PERMISSIONS -->
                                        </div>
                                        <hr class="my-5">

                                        <h4>Datos de los impuestos</h4>
                                        <div class="form-group row mt-5">
                                            <!-- FIELDS TAXS -->
                                            @include('admin.exports.fields.taxs')
                                            <!-- END FIELDS TAXS -->
                                        </div>
                                        <div class="form-group row mt-5 text-left">
                                            @if( isset($export->evidence) && $export->evidence != '' )
                                                @foreach( explode(',', $export->evidence) as $key => $item )
                                                <div class="col">
                                                    <label for="exampleInputEmail1"> &nbsp;</label>
                                                    <div></div>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evidenceModal{{ $key }}">Ver evidencia {{ $key+1 }}</button>
                                                    <button type="button" data-route="{{ route('delete.evidence', [$export->id, $key]) }}" class="btn btn-danger btn-icon btn-icon-sm delete-evidence"><i class="flaticon2-trash" title="Eliminar Evidencia"></i></button>
                                                </div>
                                            
                                                @include('admin.exports.modal-evidence')
                                            
                                                @endforeach
                                            @endif

                                            @php
                                                $count = count(explode(',', $export->evidence));
                                            @endphp

                                            @if( !isset($export->evidence) || $export->evidence == '' )
                                                @php
                                                    $count = 0;
                                                @endphp
                                            @endif

                                            @for ($i = $count; $i < 4; $i++)
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Agregar Evidencia {{ $i+1 }}</label>
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="evidence{{$i}}" name="evidence[]" accept="application/pdf">
                                                        <label class="custom-file-label text-left" for="evidence">Buscar archivo</label>
                                                    </div>
                                                </div>    
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row  text-right">
                                        <div class="col-lg-12">
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

        // document.getElementById("country_old").value = country;


        $('#country_old').attr('value', country)

        // select = '<div id="new_country"><select class="form-control kt-selectpicker" name="destination_country" data-live-search="true">\
        //                 '+options+'\
        //         </select></div>';

                

        // $('#country').remove();
        // $('#new_country').remove();
        // $('#country_new').append(select);
        // $('.kt-selectpicker').selectpicker();

    });
    /* END GET COUNTRY BY AIRPORT */

    $('.product_add').on('change', function(){
        route = $(this).find(":selected").data('route');
        id    = $(this).find(":selected").data('id');

        $.ajax({
            url: route,
            type: 'get'
        }).done(function(data) {
            $('#qty_delete_product_'+id).val(data.qty);
            $('#unid_delete_product_'+id).val(data.unid);
            $('#price_delete_product_'+id).val(data.price);
            $('#fraccion_delete_product_'+id).val(data.fraccion);
        });

    });

    // $('#recognition_id').on('change', function(){

    //     selected = $(this).find(":selected").val();
    //     recognition = $('#recognition_new').val(selected);
    //     $('#modalObservation').modal('show');

    // });

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

    $('#save').click(function(){
        $('#save').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light');
    });

    $('.delete_product').click(function(){

        route = $(this).data('route');
        swal.fire({
            title: 'Esta seguro?',
            text: "Esta a punto de eliminar un producto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminarlo!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: route,
                    type: 'get'
                }).done(function() {
                    swal.fire(
                        'Eliminado!',
                        'El producto se ha eliminado.',
                        'success'
                    );
                    location.reload();
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire(
                    'Cancelado',
                    'El producto no se elimino',
                    'error'
                )
            }
        });

    });

    /* DELETE PERMISSION */
    $('.delete_permission').click(function(){

        route = $(this).data('route');
        swal.fire({
            title: 'Esta seguro?',
            text: "Esta a punto de eliminar un permiso!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminarlo!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: route,
                    type: 'get'
                }).done(function() {
                    swal.fire(
                        'Eliminado!',
                        'El permiso se ha eliminado.',
                        'success'
                    );
                    location.reload();
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire(
                    'Cancelado',
                    'El permiso no se elimino',
                    'error'
                )
            }
        });

    });

    $('.delete-evidence').on('click', function(){
        route = $(this).data('route');
        swal.fire({
            title: 'Esta seguro?',
            text: "Esta a punto de eliminar la evidencia!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminarla!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: route,
                    type: 'get'
                }).done(function() {
                    swal.fire(
                        'Eliminada!',
                        'La evidencia se ha eliminado.',
                        'success'
                    );
                    location.reload();
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire(
                    'Cancelado',
                    'La evidencia no se elimino',
                    'error'
                )
            }
        });
    });

    /* DELETE PROTOCOL */
    $('.delete-protocol').on('click', function(){
        route = $(this).data('route');
        swal.fire({
            title: 'Esta seguro?',
            text: "Esta a punto de eliminar el protocolo!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminarla!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: route,
                    type: 'get'
                }).done(function() {
                    swal.fire(
                        'Eliminada!',
                        'El protocolo se ha eliminado.',
                        'success'
                    );
                    location.reload();
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire(
                    'Cancelado',
                    'El protocolo no se elimino',
                    'error'
                )
            }
        });
    });

    /* DELETE CARD */
    $('.delete-card').on('click', function(){
        route = $(this).data('route');
        swal.fire({
            title: 'Esta seguro?',
            text: "Esta a punto de eliminar la carta!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, eliminarla!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: route,
                    type: 'get'
                }).done(function() {
                    swal.fire(
                        'Eliminada!',
                        'La carta se ha eliminado.',
                        'success'
                    );
                    location.reload();
                });
            } else if (result.dismiss === 'cancel') {
                swal.fire(
                    'Cancelado',
                    'La carta no se elimino',
                    'error'
                )
            }
        });
    });

    $('#patent').change(function(){
        agent = $(this).find(":selected").data('xyz');
        $('#agent_aduanal').val(agent);
    })

    var nextinput = 0;
    var tabindex = 50;

    function addProduct(){

        nextinput++;
        tabindex++;
        id = 'delete_' + nextinput;

        var passedArray = @json($products);
        var options = '<option value="">Seleccionar</option>';

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

    var count = '{{ count($protocolsExports) }}';

    function addProtocol(){
        count++;
        id = 'delete_' + count;

        var passedArray = @json($protocols);
        // var options = '';
        var options = '<option value="">Seleccionar</option>';

        for(var i = 0; i < passedArray.length; i++){
            options += '<option value="' + passedArray[i].id +'">' + passedArray[i].name +'</option>';
        }

        field_delete_protocol = '<div><button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm mt-4 ml-2 delete_protocol" data-id="'+id+'"><i class="la la-trash"></i></button><div>';

        field_protocol = '<div class="col-lg-4 mb-3" id="protocol_'+count+'">\
                    <label class="form-control-label">Protocolo '+count+':</label>\
                    <div id="product_'+id+'" class="input-group">\
                        <select class="form-control kt-selectpicker protocol_adds" name="protocol_id[]" data-live-search="true">' + options + '</select>\
                        <div class="input-group-append">\
                            <button data-id="'+count+'" id="protocolo_'+count+'" type="button" class="btn btn-danger btn-icon btn-icon-sm delete_protocol" onclick="deleteProtocol('+count+');">\
                                <i class="flaticon2-trash" title="Eliminar Protocolo"></i>\
                            </button>\
                        </div>\
                    </div>\
                    </div>';

        $("#delete_protocol").append(field_delete_protocol);
        $("#protocol").append(field_protocol);
        $('.kt-selectpicker').selectpicker();

        

    }

    var count_card = '{{ count($cardsExports) }}';

    function addCard(){
        count_card++;
        id = 'delete_' + count_card;

        var passedArray = @json($cards);
        // var options = '';
        var options = '<option value="">Seleccionar</option>';

        for(var i = 0; i < passedArray.length; i++){
            options += '<option value="' + passedArray[i].id +'">' + passedArray[i].name +'</option>';
        }

        field_delete_card = '<div><button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm mt-4 ml-2 delete_card" data-id="'+id+'"><i class="la la-trash"></i></button><div>';

        field_card = '<div class="col-lg-4 mb-3" id="card_'+count_card+'">\
                    <label class="form-control-label">Carta '+count_card+':</label>\
                    <div id="product_'+id+'" class="input-group">\
                        <select class="form-control kt-selectpicker card_adds" name="card_id[]" data-live-search="true">' + options + '</select>\
                        <div class="input-group-append">\
                            <button data-id="'+count_card+'" id="carta_'+count_card+'" type="button" class="btn btn-danger btn-icon btn-icon-sm delete_card" onclick="deleteCard('+count_card+');">\
                                <i class="flaticon2-trash" title="Eliminar Carta"></i>\
                            </button>\
                        </div>\
                    </div>\
                    </div>';

        $("#delete_card").append(field_delete_card);
        $("#card").append(field_card);
        $('.kt-selectpicker').selectpicker();

        

    }

    function deleteProtocol(id){
            console.log('count_card antes de borrar '+count_card);

            id_delete = id;

            $("#protocol_" + id_delete).remove();
            $('#protocolo_'+id).remove();
            
            count_card--;

            console.log('count_card despues de borrar '+count_card);


    };

    function deleteCard(id){

            id_delete = id;

            $("#card_" + id_delete).remove();
            $('#carta_'+id).remove();
            
            count_card--;

    };

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
    $("#nro_pediment").append(field_nro_pediment);
    $("#date_pediment").append(field_date_pediment);

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

    nextinput++;
    tabindexPermit++;

    id = 'delete_' + nextinput;

    var passedArray = @json($permissions);
    var options = '<option value="">Seleccionar</option>';

    for(var i = 0; i < passedArray.length; i++){
        options += '<option value="' + passedArray[i].id +'">' + passedArray[i].name +'</option>';
    }

    field_delete_permission = '<div><button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-sm mt-4 ml-2 delete_permission" data-id="'+id+'"><i class="la la-trash"></i></button><div>';

    field_permission = '<div id="permission_'+id+'"><select class="form-control mt-3 kt-selectpicker permission_adds" id="permission_adds" data-id="'+nextinput+'" name="permission[]" data-live-search="true">' + options + '</select></div>';
    field_previous_balance = '<input id="previous_'+id+'" type="text" name="previous_balance[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindexPermit+1)+'">';
    field_permit_discharge = '<input id="discharge_'+id+'" type="text" name="permit_discharge[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindexPermit+1)+'">';
    field_current_balance = '<input id="current_'+id+'" type="text" name="current_balance[]" class="form-control mt-3" placeholder="" value="" tabindex="'+(tabindexPermit+1)+'">';

    $("#delete_permission").append(field_delete_permission);
    $("#permit").append(field_permission);
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

    // function addPermit(){

    //     field_permit = '<input type="text" name="permit[]" class="form-control mt-3" placeholder="" value="">';
    //     field_previous_balance = '<input type="text" name="previous_balance[]" class="form-control mt-3" placeholder="" value="">';
    //     field_permit_discharge = '<input type="text" name="permit_discharge[]" class="form-control mt-3" placeholder="" value="">';
    //     field_current_balance = '<input type="text" name="current_balance[]" class="form-control mt-3" placeholder="" value="">';

    //     $("#permit").append(field_permit);
    //     $("#previous_balance").append(field_previous_balance);
    //     $("#permit_discharge").append(field_permit_discharge);
    //     $("#current_balance").append(field_current_balance);
    // }
</script>  

<!--end::Page Scripts -->

@endsection

@endsection                                 