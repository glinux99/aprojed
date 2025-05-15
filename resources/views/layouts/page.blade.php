<!DOCTYPE html>
<html>
<!-- Mirrored from www.ugpeotechnique.com/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 May 2023 06:46:14 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" >
    <meta name="app-url">
    <meta name="file-base-url" >

    <title>("APROJED ") | {{__("Acceuil")}}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{__('APROJED acceuil')}}" />
    <meta name="keywords" content="">


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="APROJED">
    <meta itemprop="description" content="__('APROJED ')">
    <meta itemprop="image" content="">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@linux99">
    <meta name="twitter:title" content="APROJED">
    <meta name="twitter:description" content="APROJED">
    <meta name="twitter:creator" content="@linux99">
    <meta name="twitter:image" content="">

    <!-- Open Graph data -->
    <meta property="og:title" content="APROJED" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/')}}" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="APROJED" />
    <meta property="og:site_name" content="APROJED" />
    <meta property="fb:app_id" content="">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('uploads/all/4xnLnzEeu3dFKDGSBMlvLXPLGXFdHEkvqBSZREmO.png')}}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/ui/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/ui/plugins/revolution/css/settings.css')}}" rel="stylesheet" type="text/css" />
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{ asset('assets/ui/plugins/revolution/css/layers.css')}}" rel="stylesheet" type="text/css" />
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="{{ asset('assets/ui/plugins/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <!-- REVOLUTION NAVIGATION STYLES -->
    <link href="{{ asset('assets/ui/css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/ui/css/responsive.css')}}" rel="stylesheet" />
    <!--<link href="css/color.css" rel="stylesheet">-->

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if lt IE 9
      ]><script src="{{ asset('assets/ui/https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js')}}"></script
    ><![endif]-->
    <!--[if lt IE 9]><script src="{{ asset('assets/ui/js/respond.js')}}"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader"></div> -->

        @include('layouts.topbar')

        @yield('content')

        @include('sweetalert::alert')
        <section class="main-footer py-md-5 py-lg-5 py-2 text-light footer-widget" style="background:#04340b ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-none d-lg-block d-md-block text-center text-md-left">
                        <div class="mt-4">
                            <a href="{{ route('index')}}" class="d-block">
                                <img class="lazyload" src="{{ asset('assets/ui/images/logo.png')}}" width="80"
                                    height="80" class=" h-30px h-md-40px" alt="">
                            </a>
                            <div class="my-3">
                                <span class="text-uppercase"
                                    style="color: rgb(242, 243, 248); font-family: 'Open Sans', sans-serif; background-color: rgb(17, 23, 35);">{{
                                    config('app.name')}}</span>
                            </div>
                            <div class="w-300px mw-100 mx-auto mx-md-0">
                               {{__(" Notre rayon d'action est toute la RDC. Toutefois ses activités peuvent s’étendre dans d’autres pays selon les besoins exprimés et les moyens disponibles")}}
                                {{-- <a href="#" target="_blank" class="d-inline-block mr-3 ml-0">
                                    <img src="{{ asset('assets/img/app.png')}}" class="mx-100 h-60px">
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 ml-auto col-md-4 mr-0">
                        <div class="text-left mt-4">
                            <h4 class=" text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                              {{  __("Contact")}}
                            </h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <span class="d-block opacity-30">{{__("Adresse")}}</span>
                                    <span class="d-block opacity-70"> {{ Session('config')->adresse ?? 'Goma, Centre
                                        ville'}}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="d-block opacity-30">{{__("Telephone")}}</span>
                                    <span class="d-block opacity-70">{{ Session('config')->numeropv ??
                                        '+243970912428'}}</span>
                                </li>
                                <li class="mb-2">
                                    <span class="d-block opacity-30">{{__('Email:')}}</span>
                                    <span class="d-block opacity-70">
                                        <a href="mailto:{{ Session('config')->email ?? 'genesiskikimba@gmail.com'}}"
                                            class="text-white">{{ Session('config')->email ??
                                            'genesiskikimba@gmail.com'}}</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 col-md-4">
                        <div class="text-left mt-4">
                            <h4 class="text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                             {{   __('Liens rapides')}}
                            </h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="#" class="opacity-50 hov-opacity-100 text-reset">
                                       {{ __('Aides')}}
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="opacity-50 hov-opacity-100 text-reset">
                                     {{   __("Support")}}
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('contact')}}" class="opacity-50 hov-opacity-100 text-reset">
                                       {{ __("Joignez-nous")}}
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('contact')}}" class="opacity-50 hov-opacity-100 text-reset">
                                      {{  __("Contactez-nous")}}
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="opacity-50 hov-opacity-100 text-reset">
                                        {{__("Nos partenaires")}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-12  col-lg-3 row ">
                        <div class="text-left mt-4 col-md-12 col-6  col-lg-12 mr-0 pr-0">
                            <h4 class="text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                                {{__('Mon compte')}}
                            </h4>
                            <ul class="list-unstyled">
                                @if (Auth::check())
                                <li class="mb-2">
                                    <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('admin.site')}}">
                                       {{ __('Dashboard Admin')}}
                                    </a>
                                </li>

                                <li class="mb-2">
                                    <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Se deconnecter') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                <li class="mb-2">
                                    <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('login')}}">
                                        {{__('Se connecter')}}
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="text-left mt-4 ml-3 col-md-12 col-6 col-lg-12 m-0 p-0">
                            <a href="#" class="text-white">
                                <h4 class="text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                                  {{  __("Faire un don")}}
                                </h4>
                                <span class="d-block fs-20">
                                 <img src="https://tmb.cd/wp-content/uploads/2021/12/logo-carre-big-279x300.png" alt="tmb logo" class="h-30px">  TMB 00017-28007-75095790001-20
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
        <footer class="pt-3 pb-7 pb-xl-3 text-light" style="background:#031406FF " >
            <div class="container" >
                <div class="row align-items-center" >
                    <div class="col-lg-4">
                        <div class="fs-20 text-center text-md-left opacity-40  lh-1" current-verison="1.0.1">


                            <span style="text-transform: capitalize!important;" class="d-block mb-2">
                                © @php
                                echo Date('Y')
                                @endphp {{
                                Config('app.name')}}
                                | {{__("Limited.
                                All Rights Reserved.")}} <br>
                            </span>
                           {{ __("propulse par")}} <a href="//wa.me/+243970912428" target="_blank"
                                rel="noopener noreferrer" class="text-white">
                                Linux99
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <ul class="list-inline my-3 my-md-0 social text-center">
                            <li class="list-inline-item">
                                <a href="{{ '//'}}" target="_blank"
                                    class="facebook soc text-reset d-inline-block opacity-60 py-2"><i
                                        class="soc lab la-facebook text-white la-lg opacity-50"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ '//' }}" target="_blank"
                                    class="twitter soc text-reset d-inline-block opacity-60 py-2"><i
                                        class="lab la-twitter text-white la-lg opacity-50"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ '//' }}" target="_blank"
                                    class="instagram soc text-reset d-inline-block opacity-60 py-2"><i
                                        class="lab la-instagram text-white la-lg opacity-50"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{'//'}}" target="_blank"
                                    class="youtube soc text-reset d-inline-block opacity-60 py-2"><i
                                        class="lab la-youtube text-white la-lg opacity-50"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ '//'}}" target="_blank"
                                    class="linkedin soc text-reset d-inline-block opacity-60 py-2"><i
                                        class="lab la-linkedin-in text-white la-lg opacity-50"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="//https://wa.me/ }}" target="_blank"
                                    class="whatsapp soc text-reset d-inline-block opacity-60 py-2"><i
                                        class="lab la-whatsapp text-white la-lg opacity-60"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-center text-md-right">
                            <ul class="list-inline mb-0">
                                <a href="" class="text-white">
                                    <span class="text-center text-md-left opacity-40">
                                       {{ __("Terms & Condition | Cookie Policy")}}
                                    </span>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html">
        <span class="icon fa fa-angle-double-up"></span>
    </div>
    <script src="{{ asset('assets/ui/js/jquery.js')}}"></script>
    <!--Revolution Slider-->
    <script src="{{ asset('assets/ui/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}">
    </script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}">
    </script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}">
    </script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}">
    </script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}">
    </script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}">
    </script>
    <script src="{{ asset('assets/ui/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{ asset('assets/ui/js/main-slider-script.js')}}"></script>

    <script src="{{ asset('assets/ui/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/ui/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('assets/ui/js/owl.js')}}"></script>
    <script src="{{ asset('assets/ui/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('assets/ui/js/wow.js')}}"></script>
    <script src="{{ asset('assets/ui/js/knob.js')}}"></script>
    <script src="{{ asset('assets/ui/js/appear.js')}}"></script>
    <script src="{{ asset('assets/ui/js/script.js')}}"></script>
</body>


</html>
