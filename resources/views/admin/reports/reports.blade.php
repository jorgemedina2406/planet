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
                        Reportes </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                            reportes </a>
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
                                    Reporte
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form kt-form--label-right" id="kt_form_1" method="post" action="{{ route('create.report') }}"  novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="export" name="export" value="0">
                            <div class="kt-portlet__body pb-0 pb-5">
                                <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                                    <div class="row">
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <div class="kt-form__group">
                                                <div class="kt-form__control">
                                                    <select class="form-control kt-selectpicker" id="type" name="type">
                                                        <option value="">Tipo</option>
                                                        <option value="1" {{ (isset($type) && $type == 1) ? 'selected' : ''}}>Importacion</option>
                                                        <option value="2" {{ (isset($type) && $type == 2) ? 'selected' : ''}}>Exportacion</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <div class="kt-form__group">
                                                <div class="kt-form__control">
                                                    <div class="input-group">
                                                        <input type="text" name="mawb" class="form-control pl-2"
                                                            placeholder=" Mawb" id="mawb" value="{{ (isset($mawb)) ? $mawb : ''}}" autocomplete="false">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <div class="kt-form__group">
                                                <div class="kt-form__control">
                                                    <select class="form-control kt-selectpicker" name="status" id="kt_form_status_1">
                                                        <option value="">Estatus</option>
                                                        <option value="1" {{ (isset($status) && $status == 1) ? 'selected' : ''}}>Nuevas</option>
                                                        <option value="2" {{ (isset($status) && $status == 2) ? 'selected' : ''}}>En proceso</option>
                                                        <option value="3" {{ (isset($status) && $status == 3) ? 'selected' : ''}}>Terminadas</option>
                                                        <option value="4" {{ (isset($status) && $status == 4) ? 'selected' : ''}}>Canceladas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile" id="field_courier">
                                            <div class="kt-form__group">
                                                <div class="kt-form__control">
                                                    <select class="form-control kt-selectpicker" name="courier"> 
                                                        <option value="">Courier</option>
                                                        @foreach( $couriers as $item )
                                                        <option value="{{ $item->id }}" {{ (isset($courier) && $courier == $item->id) ? 'selected' : ''}}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile d-none" id="field_importer">
                                            <div class="kt-form__group">
                                                <div class="kt-form__control">
                                                    <select class="form-control kt-selectpicker" name="importer"> 
                                                        <option value="">Importador</option>
                                                        @foreach( $importers as $item )
                                                        <option value="{{ $item->id }}" {{ (isset($importer) && $importer == $item->id) ? 'selected' : ''}}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile d-none" id="field_exporter">
                                            <div class="kt-form__group">
                                                <div class="kt-form__control">
                                                    <select class="form-control kt-selectpicker" name="exporter" data-live-search="true">
                                                        <option value="">Exportador</option>
                                                        @foreach( $exporters as $item )
                                                        <option value="{{ $item->id }}" {{ (isset($exporter) && $exporter == $item->id) ? 'selected' : ''}}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <div class="kt-input-icon kt-input-icon--left">
                                                <div class="input-group">
                                                    <input type="text" name="date" class="form-control pl-2 kt_datetimepicker_6"
                                                        placeholder=" Fecha Inicio" id="dateSearch" value="{{ (isset($date_start)) ? $date_start : ''}}" autocomplete="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile mt-4">
                                            <div class="kt-input-icon kt-input-icon--left">
                                                <div class="input-group">
                                                    <input type="text" name="date_end" class="form-control pl-2 kt_datetimepicker_6"
                                                        placeholder=" Fecha Fin" id="dateSearch" value="{{ (isset($date_end)) ? $date_end : ''}}" autocomplete="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 kt-margin-b-20-tablet-and-mobile mt-4">
                                            <div class="kt-input-icon kt-input-icon--left">
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn-primary mr-4">Generar</button>
                                                    <button type="button" id="export-excel" class="btn btn-primary" data-route="{{ route('export.report.excel') }}" onclick="exportExcel()">Exportar Excel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                @if( isset($query) )
                                <!--begin: Datatable -->
									<table class="kt-datatable" id="html_table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Referencia</th>
                                                    <th>Courier</th>
                                                    <th>Fecha Notificacion</th>
                                                    <th>Mawb</th>
                                                    <th>Hawb</th>
                                                    <th>Linea Aerea</th>
                                                    @if( $type == 2 )
                                                    <th>Nro de Vuelo</th>
                                                    @endif
                                                    @if( $type == 2 )
                                                    <th>Exportador</th>
                                                    @endif
                                                    @if( $type == 1 )
                                                    <th>Importador</th>
                                                    @endif
                                                    <th>Estatus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $query as $item )
                                                <tr>
                                                    <td>{{ $item->reference }}</td>
                                                    <td>{{ $item->courier->name }}</td>
                                                    <td>{{ $item->date_notification }}</td>
                                                    <td>{{ $item->mawb }}</td>
                                                    <td>{{ $item->hawb }}</td>
                                                    <td>{{ $item->airline->name }}</td>
                                                    @if( $item->flight )
                                                    <td>{{ $item->flight }}</td>
                                                    @endif
                                                    @if( isset($item->exporter) )
                                                    <td>{{ $item->exporter->name }}</td>
                                                    @endif
                                                    @if( isset($item->importer) )
                                                    <td>{{ $item->importer->name }}</td>
                                                    @endif
                                                    <td>{{ $item->estatus }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
    
                                        <!--end: Datatable -->
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="kt_morris_3" style="height:500px;"></div>
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
{{-- <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ asset('assets/js/pages/components/charts/morris-charts.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('assets/js/pages/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/validation/countries-validation.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

<script>
    $(document).ready(function () {
        @if( isset($queryChart) )
        var queryChart = @json($queryChart);

        // BAR CHART
        new Morris.Bar({
            element: 'kt_morris_3',
            data: queryChart,
            xkey: 'y',
            ykeys: ['a','b'],
            labels: ['Importaciones', 'Exportaciones'],
            barColors: ['#2abe81', '#24a5ff']
        });
        @endif

    });
</script>

<script>

    @if( isset($type) && $type == 1 )
        $('#field_importer').removeClass('d-none');
        $('#field_exporter').addClass('d-none');
    @else
        $('#field_importer').addClass('d-none');
        $('#field_exporter').removeClass('d-none');
    @endif

    function exportExcel() {

        route = $('#export-excel').data('route');
        $('#export').val(1);

        $('form#kt_form_1').submit();

        // $.ajax({
        //     url: route,
        //     type: 'get',
        //     data: $('#kt_form_1').serialize()
        // }).done(function(data) {
            
        // });

    }

    $('#type').on('change', function(){
        
        type = $(this).val();

        if( type == 1 ) {
            $('#field_importer').removeClass('d-none');
            $('#field_exporter').addClass('d-none');
        }else if( type == 2 ) {
            $('#field_importer').addClass('d-none');
            $('#field_exporter').removeClass('d-none');
        }

    });
</script>

@endsection

@endsection
