@extends('admin.template')

@section('styles')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->
@endsection

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.catalogs.exporters.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Exportadores </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            exportadores </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
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
                                    Datos del exportador
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" id="kt_form_1" method="post" action="{{ route('update.exporter', $exporter->id) }}"  novalidate="novalidate">
                            @csrf
                            <div class="form-group px-4 mt-3">
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
                            <input type="hidden" name="id" value="{{ $exporter->id }}">
                            <div class="kt-portlet__body pb-0">
                                <div class="kt-section mb-0">
                                    <div class="kt-section__content">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="form-control-label">* Exportador:</label>
                                                <input type="text" name="name" class="form-control" placeholder="" value="{{ $exporter->name }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-control-label">* Pais:</label>
                                                <select class="form-control kt-selectpicker" name="country_id" data-live-search="true">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $countries as $country )
                                                    <option value="{{ $country->id }}" {{ ($country->id == $exporter->country_id) ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>  
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-control-label">* Cod. Postal:</label>
                                                <input type="text" name="postal" class="form-control" placeholder="" value="{{ $exporter->postal }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-control-label">RFC o taxid:</label>
                                                <input type="text" name="rfc" class="form-control" placeholder="" value="{{ $exporter->rfc }}">
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label">Calle:</label>
                                                <input type="text" name="street" class="form-control" placeholder="" value="{{ $exporter->street }}">
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label">Nro. Ext:</label>
                                                <input type="text" name="nro_ext" class="form-control" placeholder="" value="{{ $exporter->nro_ext }}">
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label">Nro. Int:</label>
                                                <input type="text" name="nro_int" class="form-control" placeholder="" value="{{ $exporter->nro_int }}">
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label">Colonia:</label>
                                                <input type="text" name="colony" class="form-control" placeholder="" value="{{ $exporter->colony }}">
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label">Municipio:</label>
                                                <input type="text" name="municipality" class="form-control" placeholder="" value="{{ $exporter->municipality }}">
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label">Entidad Federal:</label>
                                                <input type="text" name="federal_entity" class="form-control" placeholder="" value="{{ $exporter->federal_entity }}">
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label">Email:</label>
                                                <input type="text" name="email" class="form-control" placeholder="" value="{{ $exporter->email }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row  text-right">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-brand">Actualizar</button>
                                            <a href="{{ route('exporters') }}" class="btn btn-secondary">Cancelar</a>
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
<script src="{{ asset('assets/js/pages/crud/forms/validation/exporters-validation.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

@endsection

@endsection
