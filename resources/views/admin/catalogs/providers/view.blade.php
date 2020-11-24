@extends('admin.template')

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.catalogs.providers.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Proveedores </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            proveedores </a>
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
                                    Datos del proveedor
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                            <div class="kt-portlet__body pb-0">
                                <div class="kt-section mb-0">
                                    <div class="kt-section__content">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="form-control-label font-weight-bold">Proveedor:</label>
                                                {{ $provider->name }}
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-control-label font-weight-bold">Calle:</label>
                                                {{ $provider->street }}
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-control-label font-weight-bold">Nro. Ext:</label>
                                                {{ $provider->nro_ext }}
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-control-label font-weight-bold">Nro. Int:</label>
                                                {{ $provider->nro_int }}
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label font-weight-bold">Colonia:</label>
                                                {{ $provider->colony }}
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label font-weight-bold">Municipio:</label>
                                                {{ $provider->municipality }}
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label font-weight-bold">Entidad Federal:</label>
                                                {{ $provider->federal_entity }}
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label font-weight-bold">Cod. Postal:</label>
                                                {{ $provider->postal }}
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <label class="form-control-label font-weight-bold">Pais:</label>
                                                <option value="">Seleccionar</option>
                                                @foreach( $countries as $country )
                                                {{ ($country->id == $provider->country_id) ? $country->name : '' }}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row  text-right">
                                        <div class="col-lg-12">
                                            <a href="{{ route('providers') }}" class="btn btn-secondary">Regresar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="{{ asset('assets/js/pages/crud/forms/validation/providers-validation.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

@endsection

@endsection
