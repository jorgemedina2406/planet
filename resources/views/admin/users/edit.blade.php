@extends('admin.template')

@section('styles')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->
@endsection

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.users.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Usuarios </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            usuarios </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <div class="kt-subheader__wrapper">
                        
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
                                    Datos del usuario
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" id="kt_form_2" method="post" action="{{ route('update.user', $user->id) }}"  novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="kt-portlet__body pb-0">
                                <div class="kt-section mb-0">
                                    <div class="kt-section__content">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name" class="form-control-label">Nombre:</label>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->profile->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname" class="form-control-label">Apellido:</label>
                                                    <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $user->profile->lastname }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email" class="form-control-label">Email:</label>
                                                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-control-label">Pais:</label>
                                                    <select class="form-control" name="country">
                                                    <option value="">Seleccionar</option>
                                                    @foreach( $countries as $country )
                                                    <option value="{{ $country->id }}" {{ ($user->profile->country == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="state" class="form-control-label">Estado:</label>
                                                    <input type="text" name="state" class="form-control" id="state" value="{{ $user->profile->state }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city" class="form-control-label">Ciudad:</label>
                                                    <input type="text" name="city" class="form-control" id="city" value="{{ $user->profile->city }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="street" class="form-control-label">Calle</label>
                                                    <input type="text" name="street" class="form-control" id="street" value="{{ $user->profile->street }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="colony" class="form-control-label">Colonia</label>
                                                    <input type="text" name="colony" class="form-control" id="colony" value="{{ $user->profile->colony }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="municipality" class="form-control-label">Municipio:</label>
                                                    <input type="text" name="municipality" class="form-control" id="municipality" value="{{ $user->profile->municipality }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="federal_entity" class="form-control-label">Entidad federal:</label>
                                                    <input type="text" name="federal_entity" class="form-control" id="federal_entity" value="{{ $user->profile->federal_entity }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nro_ext" class="form-control-label">Nro exterior:</label>
                                                    <input type="text" name="nro_ext" class="form-control" id="nro_ext" value="{{ $user->profile->nro_ext }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nro_int" class="form-control-label">Nro interior:</label>
                                                    <input type="text" name="nro_int" class="form-control" id="nro_int" value="{{ $user->profile->nro_int }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="postal" class="form-control-label">Postal:</label>
                                                    <input type="text" name="postal" class="form-control" id="postal" value="{{ $user->profile->postal }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password" class="form-control-label">Contraseña:</label>
                                                    <input type="password" name="password" class="form-control" id="password">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio kt-radio--success">
                                                            <input type="radio" name="role" value="Administrador" {{ ($user->role == 'Administrador') ? 'checked' : '' }}> Administrador
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio kt-radio--success">
                                                            <input type="radio" name="role" value="Reporteador" {{ ($user->role == 'Reporteador') ? 'checked' : '' }}> Reporteador
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio kt-radio--success">
                                                            <input type="radio" name="role" value="Capturista" {{ ($user->role == 'Capturista') ? 'checked' : '' }}> Capturista
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio kt-radio--success">
                                                            <input type="radio" name="role" value="Capturista Importacion" {{ ($user->role == 'Capturista Importacion') ? 'checked' : '' }}> Capturista Importación
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio kt-radio--success">
                                                            <input type="radio" name="role" value="Capturista Exportacion" {{ ($user->role == 'Capturista Exportacion') ? 'checked' : '' }}> Capturista Exportación
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio kt-radio--success">
                                                            <input type="radio" name="role" value="Capturista Consolidados" {{ ($user->role == 'Capturista Consolidados') ? 'checked' : '' }}> Capturista Consolidados
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
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
                                            <a href="{{ route('users') }}" class="btn btn-secondary">Cancelar</a>
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
