<!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="index.html">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}" />
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                fill="#000000" fill-rule="nonzero"
                                transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                            <path
                                d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3"
                                transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                        </g>
                    </svg></span>
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                fill="#000000" fill-rule="nonzero" />
                            <path
                                d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3"
                                transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                        </g>
                    </svg></span>
            </button>

            <!--
<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
-->
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
            data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item {{ request()->is('administracion/dashboard') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('dashboard') }}" class="kt-menu__link "><span
                            class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    <path
                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg></span><span class="kt-menu__link-text">Dashboard</span></a></li>
                <!-- Exports -->
                @if(\Auth::user()->role !== 'Reporteador')
                    @if(\Auth::user()->role !== 'Capturista Importacion' && \Auth::user()->role !== 'Capturista Consolidados')
                    <li class="kt-menu__item {{ request()->is('administracion/exportaciones') ? 'kt-menu__item--active' : '' }}"
                        aria-haspopup="true"><a href="{{ route('exports') }}" class="kt-menu__link "><span
                                class="kt-menu__link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                            x="11" y="2" width="2" height="12" rx="1" />
                                        <path
                                            d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                    </g>
                                </svg></span><span class="kt-menu__link-text">Exportaciones</span></a></li>
                    @endif
                    @if(\Auth::user()->role !== 'Capturista Exportacion' && \Auth::user()->role !== 'Capturista Consolidados')
                    <!-- Imports -->
                    <li class="kt-menu__item {{ request()->is('administracion/importaciones') ? 'kt-menu__item--active' : '' }}"
                        aria-haspopup="true"><a href="{{ route('imports') }}" class="kt-menu__link "><span
                                class="kt-menu__link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                            x="11" y="1" width="2" height="12" rx="1" />
                                        <path
                                            d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg></span><span class="kt-menu__link-text">Importaciones</span></a>
                    </li>
                    @endif
                    @if(\Auth::user()->role !== 'Capturista Exportacion' && \Auth::user()->role !== 'Capturista Importacion')
                    <!-- Consolidated -->
                    <li class="kt-menu__item {{ request()->is('administracion/consolidados') ? 'kt-menu__item--active' : '' }}"
                        aria-haspopup="true"><a href="{{ route('consolidated') }}" class="kt-menu__link "><span
                                class="kt-menu__link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M4.95312427,14.3025791 L3.04687573,13.6974209 C4.65100965,8.64439903 7.67317997,6 12,6 C16.32682,6 19.3489903,8.64439903 20.9531243,13.6974209 L19.0468757,14.3025791 C17.6880467,10.0222676 15.3768837,8 12,8 C8.62311633,8 6.31195331,10.0222676 4.95312427,14.3025791 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M5.73243561,6 L9.17070571,6 C9.58254212,4.83480763 10.6937812,4 12,4 C13.3062188,4 14.4174579,4.83480763 14.8292943,6 L18.2675644,6 C18.6133738,5.40219863 19.2597176,5 20,5 C21.1045695,5 22,5.8954305 22,7 C22,8.1045695 21.1045695,9 20,9 C19.2597176,9 18.6133738,8.59780137 18.2675644,8 L14.8292943,8 C14.4174579,9.16519237 13.3062188,10 12,10 C10.6937812,10 9.58254212,9.16519237 9.17070571,8 L5.73243561,8 C5.38662619,8.59780137 4.74028236,9 4,9 C2.8954305,9 2,8.1045695 2,7 C2,5.8954305 2.8954305,5 4,5 C4.74028236,5 5.38662619,5.40219863 5.73243561,6 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z M4,19 C2.34314575,19 1,17.6568542 1,16 C1,14.3431458 2.34314575,13 4,13 C5.65685425,13 7,14.3431458 7,16 C7,17.6568542 5.65685425,19 4,19 Z M4,17 C4.55228475,17 5,16.5522847 5,16 C5,15.4477153 4.55228475,15 4,15 C3.44771525,15 3,15.4477153 3,16 C3,16.5522847 3.44771525,17 4,17 Z M20,19 C18.3431458,19 17,17.6568542 17,16 C17,14.3431458 18.3431458,13 20,13 C21.6568542,13 23,14.3431458 23,16 C23,17.6568542 21.6568542,19 20,19 Z M20,17 C20.5522847,17 21,16.5522847 21,16 C21,15.4477153 20.5522847,15 20,15 C19.4477153,15 19,15.4477153 19,16 C19,16.5522847 19.4477153,17 20,17 Z" fill="#000000"/>
                                    </g>
                                </svg></span><span class="kt-menu__link-text">Consolidados</span></a></li>
                    @endif
                <!-- Catalogs -->
                <li class="kt-menu__item  kt-menu__item--submenu 
                        {{ request()->is('administracion/catalogos/productos') || 
                        request()->is('administracion/catalogos/paises') || 
                        request()->is('administracion/catalogos/monedas') ||  
                        request()->is('administracion/catalogos/patentes') ||  
                        request()->is('administracion/catalogos/pedimentos') ||
                        request()->is('administracion/catalogos/editar-impuestos/1') ||
                        request()->is('administracion/catalogos/consignatorios') || 
                        request()->is('administracion/catalogos/exportadores') ||
                        request()->is('administracion/catalogos/importadores') ||
                        request()->is('administracion/catalogos/proveedores') ||
                        request()->is('administracion/catalogos/couriers') || 
                        request()->is('administracion/catalogos/cr') || 
                        request()->is('administracion/catalogos/incoterms') || 
                        request()->is('administracion/catalogos/airlines') || 
                        request()->is('administracion/catalogos/aeropuertos') || 
                        request()->is('administracion/catalogos/permisos') || 
                        request()->is('administracion/catalogos/reconocimientos') || 
                        request()->is('administracion/catalogos/cartas') || 
                        request()->is('administracion/catalogos/protocolos') ? 'kt-menu__item--active kt-menu__item--open' : '' }}  ? 'kt-menu__item--active kt-menu__item--open' : '' }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                        class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                    <path
                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg></span><span class="kt-menu__link-text">Catálogos</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                    class="kt-menu__link"><span class="kt-menu__link-text">Catalogos</span></span></li>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/productos') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('products') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Productos</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/paises') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('countries') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Paises</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/monedas') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('currencies') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Monedas</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/patentes') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('patents') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Patentes</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/pedimentos') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('pediments') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Pedimentos</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/editar-impuestos/1') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('edit.tax',[1]) }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Impuestos</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/consignatorios') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('consignatories') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Consignatorios</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/exportadores') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('exporters') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Exportadores</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/importadores') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('importers') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Importadores</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/proveedores') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('providers') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Proveedores</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/cr') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('crs') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">CR</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/incoterms') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('incoterms') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Incoterms</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/airlines') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('airlines') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Lineas aereas</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/couriers') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('couriers') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Couriers</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/protocolos') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('protocols') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Protocolos</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/cartas') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('cards') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Cartas</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/permisos') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('permissions') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Permisos</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/aeropuertos') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('airports') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Aeropuertos</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/catalogos/reconocimientos') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('recognitions') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Reconocimiento Aduanero</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        </ul>
                    </div>
                </li>
                <!-- Users -->
                <li class="kt-menu__item  kt-menu__item--submenu 
                     {{ request()->is('administracion/usuarios') ? 'kt-menu__item--active kt-menu__item--open' : '' }}  ? 'kt-menu__item--active kt-menu__item--open' : '' }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">Usuarios</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                    class="kt-menu__link"><span class="kt-menu__link-text">Usuarios</span></span></li>
                            <li
                                class="kt-menu__item  kt-menu__item--submenu {{ request()->is('administracion/usuarios') ? 'kt-menu__item--active' : '' }}">
                                <a href="{{ route('users') }}" class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Usuarios</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                {{-- <li class="kt-menu__item  kt-menu__item--submenu"><a href="{{ route('roles') }}"
                                class="kt-menu__link"><i
                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                    class="kt-menu__link-text">Paises</span><i
                                    class="kt-menu__ver-arrow la la-angle-right"></i></a> --}}
                        </ul>
                    </div>
                </li>
                @endif
                <!-- Reports -->
                <li class="kt-menu__item {{ request()->is('administracion/crear-reporte') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{ route('report') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">Reportes</span>
                    </a>
                </li>
                @if(\Auth::user()->role != 'Reporteador')
                <!-- Configs -->
                <li class="kt-menu__item {{ request()->is('administracion/configuracion') ? 'kt-menu__item--active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{ route('configs') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z"
                                        fill="#000000" />
                                    <path
                                        d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">Configuraciones</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- end:: Aside Menu -->
</div>