@extends('admin.template')

@section('styles')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendors Styles -->
@endsection

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.exports.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-list-3"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Lista de exportaciones
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="dropdown dropdown-inline">
                    <a href="{{ route('report-export-excel') }}"  class="btn btn-outline-brand btn-elevate btn-icon">
                        <i class="la la-file-excel-o"></i>
                    </a>
                </div>
                &nbsp;
                <div class="dropdown dropdown-inline">
                    <a href="{{ route('create.export.view') }}" class="btn btn-brand btn-icon-sm">
                        <i class="flaticon2-plus"></i> Nueva
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin: Search Form -->
        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
            <div class="row">
                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-input-icon kt-input-icon--left">
                        <input type="text" class="form-control" placeholder="Todos los campos..." id="generalSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                            <span><i class="la la-search"></i></span>
                        </span>
                    </div>
                </div>
                <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-form__group">
                        <div class="kt-form__control">
                            <select class="form-control bootstrap-select" id="kt_form_status">
                                <option value="">Estatus</option>
                                <option value="">Todos</option>
                                <option value="1">Nuevas</option>
                                <option value="2">En Proceso</option>
                                <option value="3">Terminadas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-form__group">
                        <div class="kt-form__control">
                            <select class="form-control kt-selectpicker" id="kt_form_exporter" data-live-search="true">
                                <option value="">Exportador</option>
                                @foreach( $exporters as $exporter )
                                <option value="{{ $exporter->name }}">{{ $exporter->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-input-icon kt-input-icon--left">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="la la-search"></i></span>
                            <input type="text" class="form-control pl-2 kt_datepicker_1"
                                placeholder="Buscar por Fecha..." id="dateSearch">
                            <div class="input-group-append">
                                <button id="dateSearchButton" class="btn btn-primary" type="button">Buscar!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                    <div class="kt-input-icon kt-input-icon--left">
                        <input type="text" class="form-control" placeholder="Linea aerea..." id="lineSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                            <span><i class="la la-search"></i></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!--end: Search Form -->
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <div class="kt-datatable" id="ajax_data" data-route="{{ route('get.data.export') }}"></div>
        <!--end: Datatable -->

    </div>
</div>
<div id="kt_modal_sub_KTDatatable_remote" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" style="min-height: 90px;">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Cambiar Estatus
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!--begin: Search Form -->
                    <div class="kt-form kt-form--label-right kt-margin-t-10 kt-margin-b-10">
                        <div class="row align-items-center">
                            <div class="col-xl-12 order-2 order-xl-1">
                                <div class="row align-items-center">
                                    <div class="col-md-12 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-form__group kt-form__group--inline w-100">
                                            <div class="form-group ">
                                                <label>Estatus</label>
                                                <select class="form-control kt-selectpicker" name="status_id" id="kt_form_status_change">
                                                    <option value="2">En proceso</option>
                                                    <option value="3">Terminada</option>
                                                    <option value="4">Cancelada</option>
                                                    <option value="5">Revalidado y previo</option>
                                                    <option value="6">Despacho</option>
                                                    <option value="7">Rojo</option>
                                                    <option value="8">Verde</option>
                                                    <option value="9">Entregado</option>
                                                </select> 
                                                <div class="mt-3 d-none text-center" id="observation">
                                                    <h6>Si desea agregar una observación, introduzcala a continuación</h6>
                                                    <textarea name="observation" class="form-control" id="observationInfo" cols="20" rows="10"></textarea>
                                                </div>
                                                
                                                <div class="input-group-prepend mt-3 float-right">
                                                    <button class="btn btn-brand" id="changeStatus" data-route="{{ route('update.status.export') }}" type="button">Actualizar!</button>
                                                </div>                                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end: Search Form -->
                </div>
                <div class="modal-footer kt-hidden">
                    <button type="button" class="btn btn-clean btn-bold btn-upper btn-font-md" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default btn-bold btn-upper btn-font-md">Submit</button>
                </div>
            </div>
        </div>
    </div>
@section('scripts')

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/metronic-datatable/base/data-ajax-export.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

@endsection

@endsection