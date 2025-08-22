<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aprojed - ACTIONS ET PROJETS POUR UN DEVELOPPEMENT DURABLE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="ACTIONS ET PROJETS POUR UN DEVELOPPEMENT DURABLE" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

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



    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>{{ $siteSettings->address ?? "Goma, RDC, Congo"}}</small>
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
                    <a class="btn btn-outline-primary py-2 px-3" href="" style="color: #ff6f0f">
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
