<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->

<head>
	<base href="/">
	<meta charset="utf-8" />
	<title>Planet Logistic | Login</title>
	<meta name="description" content="Login page example">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

	<!--end::Fonts -->

	<!--begin::Page Custom Styles(used by this page) -->
	<link href="{{ asset('assets/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />

	<!--end::Page Custom Styles -->

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
	<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
	class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<!-- begin:: Page -->
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
			<div
				class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

				<!--begin::Aside-->
				<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
					style="background-image: url({{ asset('assets/media/bg/bg-4.png') }});">
					<div class="kt-grid__item d-flex justify-content-center">
						<a href="#" class="kt-login__logo">
							<img src="{{ asset('assets/media/logos/logoapp.png') }}">
						</a>
					</div>
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
						<div class="kt-grid__item kt-grid__item--middle">
							<h3 class="kt-login__title">Bienvenido a Planet Logistic</h3>
							<h4 class="kt-login__subtitle">Planet Logistic S.A. de C.V. es una empresa de servicios al
								comercio exterior, creada para brindar un servicio con atención personalizada a nuestros
								socios comerciales.</h4>
						</div>
					</div>
					<div class="kt-grid__item">
						<div class="kt-login__info">
							<div class="kt-login__copyright">
								<p class="mb-0 text-white">Personalizada a nuestros socios comerciales.</p>
								<p class="text-white">&copy 2019 Planet Logistic S.A. DE C.V. Todos los derechos
								reservados. Desarrollado por
								<a href="http://www.planetlogistic.com.mx" target="_blank" class="kt-link text-success font-weight-bold">
									&nbsp;dosbytes.com.mx</a></p>
								
							</div>
							{{-- <div class="kt-login__menu">
									<a href="#" class="kt-link">Privacy</a>
									<a href="#" class="kt-link">Legal</a>
									<a href="#" class="kt-link">Contact</a>
								</div> --}}
						</div>
					</div>
				</div>

				<!--begin::Aside-->

				<!--begin::Content-->
				<div
					class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

					<!--begin::Head-->
					{{-- <div class="kt-login__head">
							<span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
							<a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>
						</div> --}}

					<!--end::Head-->

					<!--begin::Body-->
					<div class="kt-login__body">

						<!--begin::Signin-->
						<div class="kt-login__form">
							<div class="kt-login__title">
								<h3>Ingresar</h3>
							</div>

							<!--begin::Form-->
							<form class="kt-form" action="{{ route('login') }}" method="post" novalidate="novalidate"
								id="kt_login_form">
								@csrf
								<div class="form-group">
									<input class="form-control" type="email" placeholder="e-mail" name="email"
										autocomplete="off">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Contraseña" name="password"
										autocomplete="off">
								</div>

								<!--begin::Action-->
								<div class="kt-login__actions">
									{{-- <a href="#" class="kt-link kt-login__link-forgot">
											Forgot Password ?
										</a> --}}
									<button id="" type="submit"
										class="btn btn-primary btn-elevate kt-login__btn-primary">Ingresar</button>
								</div>

								<!--end::Action-->
							</form>

							<!--end::Form-->

							<!--begin::Divider-->
							{{-- <div class="kt-login__divider">
									<div class="kt-divider">
										<span></span>
										<span>OR</span>
										<span></span>
									</div>
								</div> --}}

							<!--end::Divider-->

							<!--begin::Options-->
							{{-- <div class="kt-login__options">
									<a href="#" class="btn btn-primary kt-btn">
										<i class="fab fa-facebook-f"></i>
										Facebook
									</a>
									<a href="#" class="btn btn-info kt-btn">
										<i class="fab fa-twitter"></i>
										Twitter
									</a>
									<a href="#" class="btn btn-danger kt-btn">
										<i class="fab fa-google"></i>
										Google
									</a>
								</div> --}}

							<!--end::Options-->
						</div>

						<!--end::Signin-->
					</div>

					<!--end::Body-->
				</div>

				<!--end::Content-->
			</div>
		</div>
	</div>

	<!-- end:: Page -->

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

	<!--end::Global Theme Bundle -->

	<!--begin::Page Scripts(used by this page) -->
	<script src="{{ asset('assets/js/pages/custom/login/login-1.js') }}" type="text/javascript"></script>

	<!--end::Page Scripts -->

	<script>
		@if( Session::has('message_error') )
                $('[data-switch=true]').bootstrapSwitch();
    
                    var content = {};
    
                        message = '{{ session("message_error") }}';
    
                        content.message = message;
                        content.title = 'Error';
                        content.icon = 'icon la la-hand-stop-o';
    
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
	<script>
		@if( Session::has('message_success') )
                $('[data-switch=true]').bootstrapSwitch();
    
                // handle the demo
                    var content = {};
    
                        message = '{{ session("message_success") }}';
    
                        content.message = message;
                        content.title = 'Error';
                        content.icon = 'icon la la-hand-stop-o';
    
                    var notify = $.notify(content, { 
                        type: 'success',
                        // allow_dismiss: $('#kt_notify_dismiss').prop('checked'),
                        // newest_on_top: $('#kt_notify_top').prop('checked'),
                        // mouse_over:  $('#kt_notify_pause').prop('checked'),
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
    
                    // if ($('#kt_notify_progress').prop('checked')) {
                    //     setTimeout(function() {
                    //         notify.update('message', '<strong>Saving</strong> Page Data.');
                    //         notify.update('type', 'primary');
                    //         notify.update('progress', 20);
                    //     }, 1000);
    
                    //     setTimeout(function() {
                    //         notify.update('message', '<strong>Saving</strong> User Data.');
                    //         notify.update('type', 'warning');
                    //         notify.update('progress', 40);
                    //     }, 2000);
    
                    //     setTimeout(function() {
                    //         notify.update('message', '<strong>Saving</strong> Profile Data.');
                    //         notify.update('type', 'danger');
                    //         notify.update('progress', 65);
                    //     }, 3000);
    
                    //     setTimeout(function() {
                    //         notify.update('message', '<strong>Checking</strong> for errors.');
                    //         notify.update('type', 'success');
                    //         notify.update('progress', 100);
                    //     }, 4000);
                    // }
                @endif
	</script>
</body>

<!-- end::Body -->

</html>