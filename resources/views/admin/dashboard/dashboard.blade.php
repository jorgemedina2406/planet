@extends('admin.template')

@section('styles')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
<style>
.bg-purple{
    background-color: #bb07be;
}

.bg-orange{
    background-color: #ff8e01;
}

.bg-blue{
    background-color: #01dcff;
}

.kt-widget14__stats{
    font-size: 10px;
}

.kt-widget14__legend{
    padding-top: 0px !important;
    padding-bottom: 0px !important;
}
</style>
<!--end::Page Vendors Styles -->
@endsection

@section('content-head')
<!-- begin:: Content Head -->
@include('admin.dashboard.content-head')
<!-- end:: Content Head -->
@endsection

@section('content')
<!--Begin::Dashboard 1-->

<!--Begin::Row-->
<div class="row">
        <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">

                <!--begin:: Widgets/Daily Sales-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-widget14">
                        <div class="kt-widget14__header kt-margin-b-30">
                            <h3 class="kt-widget14__title">
                                Importaciones y Exportaciones año 2020
                            </h3>
                            <span class="kt-widget14__desc">
                                Importaciones y Exportaciones realizadas por mes
                            </span>
                        </div>
                        <div class="kt-widget14__chart" style="height:120px;">
                            <canvas id="kt_chart_daily_sales"></canvas>
                        </div>
                        <div class="kt-widget14__legends mt-2 pl-1">
                            <div class="kt-widget14__legend">
                                <span class="kt-widget14__bullet kt-bg-success"></span>
                                <span class="kt-widget14__stats">Exportaciones</span>
                            </div>
                            <div class="kt-widget14__legend">
                                <span class="kt-widget14__bullet kt-bg-warning"></span>
                                <span class="kt-widget14__stats">Importaciones</span>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!--end:: Widgets/Daily Sales-->
            </div>
            <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">
        
                <!--begin:: Widgets/Profit Share-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-widget14">
                        <div class="kt-widget14__header">
                            <h3 class="kt-widget14__title">
                                Importaciones
                            </h3>
                            <span class="kt-widget14__desc">
                                Numero de importaciones
                            </span>
                        </div>
                        <div class="kt-widget14__content">
                            <div class="kt-widget14__chart">
                                <div class="kt-widget14__stat">{{ $importsCount }}</div>
                                <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                            </div>
                            <div class="kt-widget14__legends">
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-primary"></span>
                                    <span class="kt-widget14__stats">Nuevas</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                                    <span class="kt-widget14__stats">En proceso</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-orange"></span>
                                    <span class="kt-widget14__stats">Terminadas</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-secondary"></span>
                                    <span class="kt-widget14__stats">Canceladas</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-dark"></span>
                                    <span class="kt-widget14__stats">Revalidado y previo</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-blue"></span>
                                    <span class="kt-widget14__stats">Despacho</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-danger"></span>
                                    <span class="kt-widget14__stats">Rojo</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                    <span class="kt-widget14__stats">Verde</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-purple"></span>
                                    <span class="kt-widget14__stats">Entregado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!--end:: Widgets/Profit Share-->
            </div>
            <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">
        
                <!--begin:: Widgets/Revenue Change-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-widget14">
                        <div class="kt-widget14__header">
                            <h3 class="kt-widget14__title">
                                Exportaciones
                            </h3>
                            <span class="kt-widget14__desc">
                                Numero de exportaciones
                            </span>
                        </div>
                        <div class="kt-widget14__content">
                            <div class="kt-widget14__chart">
                                <div id="kt_chart_revenue_change" style="height: 150px; width: 150px;"></div>
                            </div>
                            <div class="kt-widget14__legends">
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-primary"></span>
                                    <span class="kt-widget14__stats">Nuevas</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                                    <span class="kt-widget14__stats">En proceso</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-orange"></span>
                                    <span class="kt-widget14__stats">Terminadas</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-secondary"></span>
                                    <span class="kt-widget14__stats">Canceladas</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-dark"></span>
                                    <span class="kt-widget14__stats">Revalidado y previo</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-blue"></span>
                                    <span class="kt-widget14__stats">Despacho</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-danger"></span>
                                    <span class="kt-widget14__stats">Rojo</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-success"></span>
                                    <span class="kt-widget14__stats">Verde</span>
                                </div>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet bg-purple"></span>
                                    <span class="kt-widget14__stats">Entregado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!--end:: Widgets/Revenue Change-->
            </div>
    
    <div class="col-xl-8 order-lg-2 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Listado de exportaciones
                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable" id="ajax_data" data-route="{{ route('get.data.export') }}"></div>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

            <!--begin:: Widgets/New Users-->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Usuarios activos
                        </h3>
                    </div>
                    {{-- <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab2_content" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-widget4">
                                @foreach( $users as $user )
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <img src="assets/media/users/100_4.jpg" alt="">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="#" class="kt-widget4__username">
                                                {{ $user->profile->name }}
                                            </a>
                                            <p class="kt-widget4__text">
                                                Ultimo login el: {{ $user->login_date }}
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-label-brand btn-bold">{{ $user->role }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_widget4_tab2_content">
                            <div class="kt-widget4">
                                <div class="kt-widget4__item">
                                    <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        <img src="assets/media/users/100_2.jpg" alt="">
                                    </div>
                                    <div class="kt-widget4__info">
                                        <a href="#" class="kt-widget4__username">
                                            Kristika Bold
                                        </a>
                                        <p class="kt-widget4__text">
                                            Product Designer,Apple Inc
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-label-success">Follow</a>
                                </div>
                                <div class="kt-widget4__item">
                                    <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        <img src="assets/media/users/100_13.jpg" alt="">
                                    </div>
                                    <div class="kt-widget4__info">
                                        <a href="#" class="kt-widget4__username">
                                            Ron Silk
                                        </a>
                                        <p class="kt-widget4__text">
                                            Release Manager, Loop Inc
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-label-brand">Follow</a>
                                </div>
                                <div class="kt-widget4__item">
                                    <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        <img src="assets/media/users/100_9.jpg" alt="">
                                    </div>
                                    <div class="kt-widget4__info">
                                        <a href="#" class="kt-widget4__username">
                                            Nick Bold
                                        </a>
                                        <p class="kt-widget4__text">
                                            Web Developer, Facebook Inc
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-label-danger">Follow</a>
                                </div>
                                <div class="kt-widget4__item">
                                    <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        <img src="assets/media/users/100_2.jpg" alt="">
                                    </div>
                                    <div class="kt-widget4__info">
                                        <a href="#" class="kt-widget4__username">
                                            Wiltor Delton
                                        </a>
                                        <p class="kt-widget4__text">
                                            Project Manager, Amazon Inc
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-label-success">Follow</a>
                                </div>
                                <div class="kt-widget4__item">
                                    <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        <img src="assets/media/users/100_8.jpg" alt="">
                                    </div>
                                    <div class="kt-widget4__info">
                                        <a href="#" class="kt-widget4__username">
                                            Nick Bold
                                        </a>
                                        <p class="kt-widget4__text">
                                            Web Developer, Facebook Inc
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-label-info">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/New Users-->
        </div>
</div>
<!--End::Row-->

<!--End::Dashboard -->

@section('scripts')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/gmaps/gmaps.js" type="text/javascript') }}"></script>
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/metronic-datatable/base/data-ajax-export.js') }}" type="text/javascript"></script>
<!--end::Page Scripts -->

<script>

jQuery(document).ready(function() {
    // KTDashboard.init();

    profitShare();
    revenueChange();
    dailySales();

    function profitShare() {

        if (!KTUtil.getByID('kt_chart_profit_share')) {
            return;
        }

        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        parseInt({{ $importNew }}), 
                        parseInt({{ $importProcess }}), 
                        parseInt({{ $importFinish }}), 
                        parseInt({{ $importCancel }}), 
                        parseInt({{ $importRevalid }}), 
                        parseInt({{ $importDespacho }}), 
                        parseInt({{ $importRed }}), 
                        parseInt({{ $importGreen }}), 
                        parseInt({{ $importDelivered }})
                    ],
                    backgroundColor: [
                        KTApp.getStateColor('primary'),
                        KTApp.getStateColor('warning'),
                        '#ff8e01',
                        KTApp.getStateColor('secondary'),
                        KTApp.getStateColor('dark'),
                        '#01dcff',
                        KTApp.getStateColor('success'),
                        KTApp.getStateColor('danger'),
                        '#bb07be'
                    ]
                }],
                labels: [
                    'Nuevas',
                    'En Proceso',
                    'Terminadas',
                    'Canceladas',
                    'Revalidado y previo',
                    'Despacho',
                    'Rojo',
                    'Verde',
                    'Entregado'
                ]
            },
            options: {
                cutoutPercentage: 75,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Technology'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10,
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KTApp.getStateColor('brand'),
                    titleFontColor: '#ffffff',
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                }
            }
        };

        var ctx = KTUtil.getByID('kt_chart_profit_share').getContext('2d');
        var myDoughnut = new Chart(ctx, config);
    }

    function revenueChange() {
        if ($('#kt_chart_revenue_change').length == 0) {
            return;
        }

        Morris.Donut({
            element: 'kt_chart_revenue_change',
            data: [
                {
                    label: "Nuevas",
                    value: parseInt({{ $exportNew }})
                },
                {
                    label: "En Proceso",
                    value: parseInt({{ $exportProcess }})
                },
                {
                    label: "Terminadas",
                    value: parseInt({{ $exportFinish }})
                },
                {
                    label: "Canceladas",
                    value: parseInt({{ $exportCancel }})
                },
                {
                    label: "Revalidado y previo",
                    value: parseInt({{ $exportRevalid }})
                },
                {
                    label: "Despacho",
                    value: parseInt({{ $exportDespacho }})
                },
                {
                    label: "Rojo",
                    value: parseInt({{ $exportRed }})
                },
                {
                    label: "Verde",
                    value: parseInt({{ $exportGreen }})
                },
                {
                    label: "Entregadas",
                    value: parseInt({{ $exportDelivered }})
                }
            ],
            colors: [
                KTApp.getStateColor('primary'),
                KTApp.getStateColor('warning'),
                '#ff8e01',
                KTApp.getStateColor('secondary'),
                KTApp.getStateColor('dark'),
                '#01dcff',
                KTApp.getStateColor('success'),
                KTApp.getStateColor('danger'),
                '#bb07be'
            ],
        });
    }

    function dailySales() {
        var chartContainer = KTUtil.getByID('kt_chart_daily_sales');

        if (!chartContainer) {
            return;
        }

        var chartData = {
            labels: ["Enero ", "Febrero ", "Marzo ", "Abril ", "Mayo ", "Junio ", "Julio ", "Agosto ", "Septiembre ", "Octubre ", "Noviembre ", "Diciembre "],
            datasets: [{
                //label: 'Dataset 1',
                backgroundColor: KTApp.getStateColor('success'),
                data: [
                    parseInt({{$enero}}), 
                    parseInt({{$febrero}}), 
                    parseInt({{$marzo}}), 
                    parseInt({{$abril}}), 
                    parseInt({{$mayo}}), 
                    parseInt({{$junio}}), 
                    parseInt({{$julio}}), 
                    parseInt({{$agosto}}), 
                    parseInt({{$septiembre}}), 
                    parseInt({{$octubre}}), 
                    parseInt({{$noviembre}}), 
                    parseInt({{$diciembre}})
                ]
            }, {
                //label: 'Dataset 2',
                backgroundColor: KTApp.getStateColor('warning'),
                data: [
                    parseInt({{$eneroIm}}), 
                    parseInt({{$febreroIm}}), 
                    parseInt({{$marzoIm}}), 
                    parseInt({{$abrilIm}}), 
                    parseInt({{$mayoIm}}), 
                    parseInt({{$junioIm}}), 
                    parseInt({{$julioIm}}), 
                    parseInt({{$agostoIm}}), 
                    parseInt({{$septiembreIm}}), 
                    parseInt({{$octubreIm}}), 
                    parseInt({{$noviembreIm}}), 
                    parseInt({{$diciembreIm}})
                ]
            }]
        };

        var chart = new Chart(chartContainer, {
            type: 'bar',
            data: chartData,
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                    mode: 'nearest',
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                barRadius: 4,
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: false,
                        stacked: false
                    }],
                    yAxes: [{
                        display: false,
                        stacked: false,
                        gridLines: false
                    }]
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
    }
});
</script>
@endsection

@endsection