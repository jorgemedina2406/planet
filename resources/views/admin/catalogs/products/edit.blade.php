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
                        <form class="kt-form kt-form--label-right" id="kt_form_1" method="post" action="{{ route('update.product', $product->id) }}"  novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
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
                                            <div class="col-lg-6">
                                                <label class="form-control-label">* Codigo:</label>
                                                <input type="text" name="code" class="form-control" placeholder="" value="{{ $product->code }}">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-control-label">* Nombre:</label>
                                                <input type="text" name="name" class="form-control" placeholder="" value="{{ $product->name }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Cantidad:</label>
                                                <input type="text" name="qty" class="form-control" placeholder="" value="{{ $product->qty }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Unidad de factura:</label>
                                                <input type="text" name="unid" class="form-control" placeholder="" value="{{ $product->unid }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Valor producto:</label>
                                                <input type="text" name="price" class="form-control" placeholder="" value="{{ $product->price }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Fraccion Arencelaria:</label>
                                                <input type="text" name="fraccion" class="form-control" placeholder="" value="{{ $product->fraccion }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label for="description" class="form-control-label">* Descripcion:</label>
                                                <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
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
                                            <button type="reset" class="btn btn-secondary">Cancelar</button>
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
<script src="{{ asset('assets/js/pages/crud/forms/validation/products-validation.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

@endsection

@endsection
