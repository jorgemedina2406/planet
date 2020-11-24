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
                        Productos </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            producto </a>
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
                                    Datos del producto
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                            <div class="kt-portlet__body pb-0">
                                <div class="kt-section mb-0">
                                    <div class="kt-section__content">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label class="form-control-label font-weight-bold">Codigo:</label>
                                                {{ $product->code }}
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-control-label font-weight-bold">Nombre:</label>
                                                {{ $product->name }}
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label font-weight-bold">Cantidad:</label>
                                                {{ $product->qty }}
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label font-weight-bold">Unidad de factura:</label>
                                                {{ $product->unid }}
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label font-weight-bold">Valor producto:</label>
                                                {{ $product->price }}
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label font-weight-bold">Fraccion Arencelaria:</label>
                                                {{ $product->fraccion }}
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label for="description" class="form-control-label font-weight-bold">Descripcion:</label>
                                                {{ $product->description }}
                                            </div>
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
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/validation/products-validation.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

@endsection

@endsection
