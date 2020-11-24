@extends('admin.template')

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.imports.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Información Importación </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            información importación </a>
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
                                    Datos de la importación
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
                                                {{ $import->reference }}
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label font-weight-bold">Courier:</label>
                                                {{ $import->courier->name }}
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label font-weight-bold">Fecha de notificacion:</label>
                                                {{ $import->date_notification }}
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="form-control-label font-weight-bold">MAWB:</label>
                                                {{ $import->mawb }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">HAWB:</label>
                                                {{ $import->hawb }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Linea Aerea / Naviera:</label>
                                                {{ $import->airline->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">CR:</label>
                                                {{ $import->cr->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Incoterm:</label>
                                                {{ $import->incoterm->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Importador:</label>
                                                {{ $import->importer->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Proveedor:</label>
                                                {{ $import->provider->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Consignatorio:</label>
                                                {{ $import->consignee->name }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Pais de origen:</label>
                                                {{ $import->country->name }}                                          
                                            </div>
                                            {{-- <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Aeropuerto codigo IATA:</label>
                                                {{ $import->airport }}
                                            </div> --}}
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Nro de facturas:</label>
                                                {{ $import->nro_invoices }}
                                            </div>
                                            <div class="col-lg-3 mt-3">
                                                <label class="form-control-label font-weight-bold">Fecha de factura:</label>
                                                {{ $import->date_invoices }}
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
                                                        @if( isset($import->patent) )
                                                            {{ $import->patent->patent }}                                                        
                                                        @endif
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-control-label font-weight-bold">Agente Aduanal:</label>
                                                        @if( isset($import->patent) )
                                                            {{ $import->patent->agent_aduanal }}
                                                        @endif
                                                    </div>
                                                    <!-- END FIELDS PATENTS -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <h4>Datos de los pedimentos</h4>
                                                <div class="form-group row mt-5">
                                                    <!-- FIELDS PEDIMENTS -->
                                                    @foreach( $pedimentsImports as $item )
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
                                                    <div class="col-3">
                                                        <label class="form-control-label font-weight-bold">Fecha de transferencia:</label>
                                                        {{ $import->date_transfer }}
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-control-label font-weight-bold">Fecha de previo:</label>
                                                        {{ $import->date_previous }}
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-control-label font-weight-bold">Fecha de despacho:</label>
                                                        {{ $import->date_dispatch }}
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-control-label font-weight-bold">Fecha de entrega:</label>
                                                        {{ $import->date_delivery }}
                                                    </div>
                                                    <div class="col-3 mt-3">
                                                        <label class="form-control-label font-weight-bold">Quien recibe:</label>
                                                        {{ $import->who_receives }}
                                                    </div>
                                                    <div class="col-3 mt-3">
                                                        <label class="form-control-label font-weight-bold">Reconocimiento aduanero:</label>
                                                         {{ ($import->recognition) ? $import->recognition->name : '' }}
                                                    </div>
                                                    <div class="col-3 mt-3">
                                                        <label class="form-control-label font-weight-bold">Hora de salida de reconocimiento:</label>
                                                        {{ $import->recognition_departure_time }}
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
                                                    @foreach( $protocolsImports as $key => $item )

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
                                                    @foreach( $cardsImports as $key => $item )

                                                        <div class="col-lg-3">
                                                            <label class="form-control-label font-weight-bold">Carta {{ $key+1 }}:</label>
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
                                            @foreach( $productsImports as $item )
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
                                            @foreach( $permissionsImports as $item )
                                                <input type="hidden" name="permission_id" value="{{ $item->id }}">

                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Permiso:</label>
                                                    @foreach( $permissions as $permission )
                                                    {{ ($permission->id == $item->permit_id) ? $permission->name : '' }}
                                                    @endforeach   
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Saldo anterior:</label>
                                                    {{ $item->previous_balance }}
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Descargo de permiso:</label>
                                                    {{ $item->permit_discharge }}
                                                </div>
                                                <div class="col-lg-3 mt-3">
                                                    <label class="form-control-label font-weight-bold">Saldo actual:</label>
                                                    {{ $item->current_balance }}
                                                </div>
                                            @endforeach
                                            <!-- END FIELDS PERMISSIONS -->
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
                                            <a href="{{ route('report.import.pdf', $import->id) }}" class="btn btn-brand">Exportar PDF</a>
                                            <a href="{{ route('imports') }}" class="btn btn-secondary">Regresar</a>
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
