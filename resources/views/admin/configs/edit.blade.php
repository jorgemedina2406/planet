@extends('admin.template')

@section('styles')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->
@endsection

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.configs.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Configuracion </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            configuracion </a>
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
                                    Datos de configuracion
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" id="kt_form_2" method="post" action="{{ route('update.config') }}"  novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="id" value="{{ $config->id }}">
                            <div class="kt-portlet__body pb-0">
                                <div class="kt-section mb-0">
                                    <div class="kt-section__content">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label class="form-control-label">* Empresa:</label>
                                                <input type="text" name="name" class="form-control" placeholder="" value="{{ $config->name }}">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-control-label">* Pais:</label>
                                                <select class="form-control" name="country">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $countries as $country )
                                                    <option value="{{ $country->id }}" {{ ($country->id == $config->country) ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Estado:</label>
                                                <input type="text" name="state" class="form-control" placeholder="" value="{{ $config->state }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Ciudad:</label>
                                                <input type="text" name="city" class="form-control" placeholder="" value="{{ $config->city }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Colonia:</label>
                                                <input type="text" name="colony" class="form-control" placeholder="" value="{{ $config->colony }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Calle:</label>
                                                <input type="text" name="street" class="form-control" placeholder="" value="{{ $config->street }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Nro Int:</label>
                                                <input type="text" name="nro_int" class="form-control" placeholder="" value="{{ $config->nro_int }}">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label class="form-control-label">* Nro Ext:</label>
                                                <input type="text" name="nro_ext" class="form-control" placeholder="" value="{{ $config->nro_ext }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row  text-right">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-brand">Guardar</button>
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

<!--end::Page Scripts -->

@endsection

@endsection
