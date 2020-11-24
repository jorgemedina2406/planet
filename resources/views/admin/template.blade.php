<!DOCTYPE html>

<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Planet Logistic | Dashboard</title>
		<meta name="description" content="Updates and statistics">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="url" content="{{ env('APP_URL') }}">
        <meta name="userAuth" content="{{ \Auth::user()->role }}">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<!--end::Fonts -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="{{ asset('assets/css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Layout Skins -->

        <!-- begin::Styles yield -->
        @yield('styles')
        <!-- end::Styles yield -->
        
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    </head>
    
    <!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		@include('admin.partials.header-mobile')
        <!-- end:: Header Mobile -->
        
        <div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

                <!-- begin:: Aside -->
                @include('admin.partials.aside')
                <!-- end:: Aside -->

                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                    <!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                        @include('admin.partials.header')
					</div>
                    <!-- end:: Header -->

                    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                        <!-- begin:: Content Head -->
                        @yield('content-head')    
                        <!-- end:: Content Head -->

                        <!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            @yield('content')
                        </div>
                    </div>

                    <!-- begin:: Footer -->
                        @include('admin.partials.footer')
                    <!-- end:: Footer -->

                </div>
            </div>
		</div>

        <!-- end:: Page -->

        <!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>
        <!-- end::Scrolltop -->

        <!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#5d78ff",
                        "dark": "#282a3c",
                        "light": "#ffffff",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": [
                            "#c5cbe3",
                            "#a1a8c3",
                            "#3d4465",
                            "#3e4466"
                        ],
                        "shape": [
                            "#f0f3ff",
                            "#d9dffa",
                            "#afb4d4",
                            "#646c9a"
                        ]
                    }
                }
            };
        </script>
        <!-- end::Global Config -->
    
        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/pages/components/extended/bootstrap-notify.js') }}" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->

        <script>
            @if( Session::has('message_success') )
                $('[data-switch=true]').bootstrapSwitch();
                var content = {};
                    message = '{{ session("message_success") }}';
                    content.message = message;
                    content.title = 'Exito';
                    content.icon = 'icon la la-check-circle-o';
                var notify = $.notify(content, { 
                    type: 'success',
                    showProgressbar: true,
                    spacing: 10,                    
                    timer: 2000,
                    placement: {
                        from:'top', 
                        align: 'right'
                    },
                    offset: {
                        x: 30, 
                        y: 30
                    },
                    delay: 1000,
                    z_index: 10000,
                    animate: {
                        enter: 'animated bounceIn',
                        exit: 'animated bounceIn'
                    }
                });
            @endif
            @if( Session::has('message_error') )
                $('[data-switch=true]').bootstrapSwitch();
                var content = {};
                    message = '{{ session("message_error") }}';
                    content.message = message;
                    content.title = 'Error';
                    content.icon = 'icon la la la-hand-stop-o';
                var notify = $.notify(content, { 
                    type: 'danger',
                    showProgressbar: true,
                    spacing: 10,                    
                    timer: 2000,
                    placement: {
                        from:'top', 
                        align: 'right'
                    },
                    offset: {
                        x: 30, 
                        y: 30
                    },
                    delay: 1000,
                    z_index: 10000,
                    animate: {
                        enter: 'animated bounceIn',
                        exit: 'animated bounceIn'
                    }
                });
            @endif
        </script>

        @yield('scripts')

    </body>
	<!-- end::Body -->
</html>


    