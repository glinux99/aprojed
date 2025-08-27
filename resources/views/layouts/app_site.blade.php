<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @php
        // Default Meta
        $defaultTitle = 'APROJED - Actions et Projets pour un Développement Durable';
        $defaultDescription = $siteSettings->seo_description ?? "APROJED s'engage dans des projets concrets pour un développement qui respecte l'environnement et valorise les communautés locales en R.D. Congo.";
        $defaultKeywords = $siteSettings->seo_keywords ?? 'développement durable, RDC, Congo, projets humanitaires, éducation, santé, environnement, APROJED';
        $defaultImage = asset($siteSettings->logo_path ?? 'assets/img/logo_social.png'); // A default social sharing image
    @endphp

    <!-- SEO Meta Tags -->
    <title>@yield('title', $defaultTitle)</title>
    <meta name="description" content="@yield('description', $defaultDescription)">
    <meta name="keywords" content="@yield('keywords', $defaultKeywords)">
    <meta name="author" content="APROJED R.D.Congo">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', $defaultTitle)">
    <meta property="og:description" content="@yield('description', $defaultDescription)">
    <meta property="og:image" content="@yield('og_image', $defaultImage)">
    <meta property="og:site_name" content="APROJED R.D.Congo">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', $defaultTitle)">
    <meta property="twitter:description" content="@yield('description', $defaultDescription)">
    <meta property="twitter:image" content="@yield('og_image', $defaultImage)">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>



    <!-- Navbar Start ss-->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                @php
                    $address = $siteSettings->address ?? 'Goma, RDC, Congo';
                @endphp
                <small><i class="fa fa-map-marker-alt me-2"></i>
                <span @if(strlen($address) > 45) style="font-size: 0.85em; vertical-align: middle;" @endif>{{ $address }}</span>
                </small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>{{ $siteSettings->email?? "info@aprojed.com"}}</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Suivez-nous sur:</small>
                <a class="text-white-50 ms-3" href="{{ $siteSettings->facebook_url ?? ""}}"><i class="fab fa-facebook-f"></i></a>
                <a class="text-white-50 ms-3" href="{{ $siteSettings->twitter_url?? ""}}"><i class="fab fa-twitter"></i></a>
                <a class="text-white-50 ms-3" href="{{ $siteSettings->linkedin_url?? ""}}"><i class="fab fa-linkedin-in"></i></a>
                <a class="text-white-50 ms-3" href="{{ $siteSettings->instagram_url?? ""}}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="/" class="navbar-brand ms-4 ms-lg-0">
                <img src="{{ asset('assets/img/logo sur fond vert.png') }}" width="150"
                                    height="40" class=" h-30px h-md-40px" alt="">
                {{-- <h1 class="fw-bold text-primary m-0">APRO<span class="text-white">JED</span></h1> --}}
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Acceuil</a>
                    <a href="/about" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">A propos</a>
                    <a href="/activities" class="nav-item nav-link {{ Request::is('activities') ? 'active' : '' }}">Activités</a>

                    <a href="/contact" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-outline-primary py-2 px-3" href="#" data-bs-toggle="modal" data-bs-target="#donateModal" style="color: #ff6f0f">
                        Faire un don
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    @yield('content')

   @include('layouts.footer')

       <!-- Donate Modal Start -->
    <div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donateModalLabel">Faire un Don</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center p-4">
                        <img src="https://tmb.cd/wp-content/uploads/2021/12/logo-carre-small.png" class="img-fluid mb-4" style="height: 70px; object-fit: contain;" alt="Logo TMB">
                        <h5 class="mb-3">Actions et projets pour le developpement ASBL</h5>
                        <p class="mb-2">Pour soutenir nos actions, vous pouvez effectuer un virement sur le compte suivant :</p>
                        <p class="h4 text-primary my-3 font-monospace">00017 28007 75095790001 20</p>
                        <p class="text-muted">Pour toute question, n'hésitez pas à nous contacter au :<br><strong>{{ $siteSettings->phone_number ?? 'Numéro non disponible' }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate Modal End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/lib/parallax/parallax.min.js')}}"></script>

    <!-- Template Javascript --> {{-- <script src="js/main.js"></script> --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
