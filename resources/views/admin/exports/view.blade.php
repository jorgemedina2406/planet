@extends('admin.template')

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
                        Información de Exportación </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            información exportación </a>
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
                                    Datos de la exportación
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                            <div class="kt-portlet__body pb-0">
                                <div class="kt-section mb-0">
                                    <div class="kt-section__content">
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                <label class="form-control-label font-weight-bold">Referencia:</label>
                                                {{ $export->reference }}
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label font-weight-bold">Courier:</label>
                                                {{ $export->courier->name }}
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label font-weight-bold">Fecha de notificacion:</label>
                                                {{ $export->date_notification }}
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label font-weight-bold">MAWB:</label>
                                                {{ $export->mawb }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">HAWB:</label>
                                                {{ $export->hawb }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Linea Aerea:</label>
                                                {{ $export->airline->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Numero de vuelo:</label>
                                                {{ $export->flight }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Fecha de vuelo:</label>
                                                {{ $export->date_flight }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">CR:</label>
                                                {{ $export->cr->code }} - {{ $export->cr->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Incoterm:</label>
                                                {{ $export->incoterm->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Exportador:</label>
                                                {{ $export->exporter->name }}                                         
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Shipper:</label>
                                                {{ $export->shippers->name }}                                       
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Consignatorio:</label>
                                                {{ $export->consignee->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Pais destino:</label>
                                                {{ $export->destination_country }}                                          
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Aeropuerto:</label>
                                                {{ $export->airport }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Nro de facturas:</label>
                                                {{ $export->nro_invoices }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Fecha de factura:</label>
                                                {{ $export->date_invoices }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-5">
                                    <div class="kt-section__content">
                                        
                                        <div class="form-group row">
                                            <div class="col-md-6 border-right pr-5">
                                                <h4>Datos de la patente</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS PATENTS -->
                                                    <div class="col">
                                                        <label class="form-control-label font-weight-bold">Patente:</label>
                                                        @if( isset($export->patent) )
                                                            {{ $export->patent->patent }}                                                        
                                                        @endif
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control-label font-weight-bold">Agente Aduanal:</label>
                                                        @if( isset($export->patent) )
                                                            {{ $export->patent->agent_aduanal }}
                                                        @endif
                                                    </div>
                                                    <!-- END FIELDS PATENTS -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <h4>Datos de los pedimentos</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS PEDIMENTS -->
                                                    @foreach( $pedimentsExports as $item )
                                                        <div class="col-5">
                                                            <label class="form-control-label font-weight-bold">Pedimento:</label>
                                                            @foreach( $pediments as $pediment )
                                                            {{ ($pediment->id == $item->pediment_id) ? $pediment->pediment : '' }}
                                                            @endforeach
                                                        </div>
                                                        <div class="col-4">
                                                            <label class="form-control-label font-weight-bold">Numero:</label>
                                                            {{ $item->nro_pediment }}
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-control-label font-weight-bold">Fecha:</label>
                                                            {{ $item->date_pay }}
                                                        </div>
                                                    @endforeach
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
                                                    <div class="col">
                                                        <label class="form-control-label font-weight-bold">Fecha recepcion muestra:</label>
                                                        {{ $export->sample_reception_date }}
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control-label font-weight-bold">Fecha cruce pedimento:</label>
                                                        {{ $export->date_crossing_pediment }}
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control-label font-weight-bold">Reconocimiento aduanero:</label>
                                                        {{ ($export->recognition) ? $export->recognition->name : '' }}
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control-label font-weight-bold">Hora de salida de reconocimiento:</label>
                                                        {{ $export->recognition_departure_time }}
                                                    </div>
                                                    <!-- END FIELDS OTHERS -->
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-5">

                                        <div class="form-group row">
                                            <div class="col-md-6 border-right pr-5">
                                                <h4>Datos de los protocolos</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS PROTOCOLS -->
                                                    @foreach( $protocolsExports as $key => $item )

                                                        <div class="col-lg-3">
                                                            <label class="form-control-label font-weight-bold">Protocolo {{ $key+1 }}:</label>
                                                            @foreach( $protocols as $protocol )
                                                            {{ ($protocol->id == $item->protocol_id) ? $protocol->name : '' }}
                                                            @endforeach
                                                        </div>

                                                    @endforeach
                                                    <!-- END FIELDS PROTOCOLS -->
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl-5">
                                                <h4>Datos de las cartas</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS CARDS -->
                                                    @foreach( $cardsExports as $key => $item )

                                                        <div class="col-lg-3">
                                                            <label class="form-control-label font-weight-bold">Carta {{ $key }}:</label>
                                                            @foreach( $cards as $card )
                                                            {{ ($card->id == $item->card_id) ? $card->name : '' }}
                                                            @endforeach
                                                        </div>

                                                    @endforeach
                                                    <!-- END FIELDS CARDS -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr class="my-5">
                                        
                                        <h4>Datos de los productos</h4>
                                        <div class="form-group row mt-5">
                                            @foreach( $productsExports as $item )
                                                <div class="col-lg-2">
                                                    <label class="form-control-label font-weight-bold">Producto:</label>
                                                    @foreach( $products as $product )
                                                    {{ ($product->id == $item->product_id) ? $product->name : '' }}
                                                    @endforeach
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-control-label font-weight-bold">Cantidad:</label>
                                                    {{ $item->qty }}
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-control-label font-weight-bold">Unidad de factura:</label>
                                                    {{ $item->unid }}
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-control-label font-weight-bold">Valor Producto:</label>
                                                    {{ $item->price }}
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-control-label font-weight-bold">Fraccion Arancelaria:</label>
                                                    {{ $item->fraccion }}
                                                </div>
                                            @endforeach
                                        </div>

                                        <hr class="my-5">

                                        <h4>Datos de los permisos</h4>
                                        <div class="form-group row mt-5">
                                            <!-- FIELDS PERMISSIONS -->
                                            @foreach( $permissionsExports as $item )
                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Permiso:</label>
                                                    @foreach( $permissions as $permission )
                                                    {{ ($permission->id == $item->permit) ? $permission->name : '' }}
                                                    @endforeach                                                    
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Saldo anterior:</label>
                                                    {{ $item->previous_balance }}
                                                    <div id="previous_balance"></div>
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Descargo de permiso:</label>
                                                    {{ $item->permit_discharge }}
                                                    <div id="permit_discharge"></div>
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Saldo actual:</label>
                                                    {{ $item->current_balance }}
                                                    
                                                </div>
                                            @endforeach
                                            <!-- END FIELDS PERMISSIONS -->
                                        </div>
                                        <hr class="my-5">

                                        <h4>Datos de los impuestos</h4>
                                        <div class="form-group row mt-5">
                                            <!-- FIELDS TAXS -->
                                            <div class="col">
                                                <label class="form-control-label font-weight-bold">IGE:</label>
                                                {{ $tax->ige }}
                                            </div>
                                            <div class="col">
                                                <label class="form-control-label font-weight-bold">DTA:</label>
                                                {{ $tax->dta }}
                                            </div>
                                            <div class="col">
                                                <label class="form-control-label font-weight-bold">PRV:</label>
                                                {{ $tax->prv }}
                                            </div>
                                            <div class="col">
                                                <label class="form-control-label font-weight-bold">CNT:</label>
                                                {{ $tax->cnt }}
                                            </div>
                                            <!-- END FIELDS TAXS -->
                                        </div>
                                        <div class="form-group row mt-5 text-center">
                                            @if( isset($export->evidence) && $export->evidence != '' )
                                                @foreach( explode(',', $export->evidence) as $key => $item )
                                                <div class="col">
                                                    <label for="exampleInputEmail1"> &nbsp;</label>
                                                    <div></div>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evidenceModal{{ $key }}">Ver evidencia {{ $key+1 }}</button>
                                                    {{-- <button type="button" data-route="{{ route('delete.evidence', [$export->id, $key]) }}" class="btn btn-danger btn-icon btn-icon-sm delete-evidence"><i class="flaticon2-trash" title="Eliminar Evidencia"></i></button> --}}
                                                </div>
                                            
                                                @include('admin.exports.modal-evidence')
                                            
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row  text-right">
                                        <div class="col-lg-12">
                                            <a href="{{ route('report.export.pdf', $export->id) }}" class="btn btn-brand">Exportar PDF</a>
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
@endsection                                 