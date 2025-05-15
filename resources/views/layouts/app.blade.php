<!doctype html>
<html lang="fr">

<head>
    <meta name="app-url" content="/">
    <meta name="file-base-url" content="public/">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/ico.png')}}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}">
    <link href="{{asset('assets/selected2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <style>
        body {
            font-size: 12px;
        }
    </style>
    <script>
        var AIZ = AIZ || {};
        AIZ.local = {

        }
    </script>

</head>

<body class="">
    <div class="aiz-main-wrapper">
        <div class="aiz-sidebar-wrap">
            <div class="aiz-sidebar left c-scrollbar">
                <div class="aiz-side-nav-logo-wrap d-flex align-items-center">
                    <a href="/admin" class="d-block text-left d-flex">
                        <img class="" src="{{ asset('assets/ui/images/logo.png')}}" alt=""
                            class="mw-100 h-50px h-md-40px" height="100">

                    </a>
                    <div class="text-white">{{ config('app.name')}}</div>
                </div>
                <div class="aiz-side-nav-wrap">
                    <div class="px-20px mb-3">
                        <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text"
                            name="" placeholder="{{__('Rechercher dans le menu')}}" id="menu-search"
                            onkeyup="menuSearch()">
                    </div>
                    <ul class="aiz-side-nav-list" id="search-menu">
                    </ul>
                    <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                        <li class="aiz-side-nav-item">
                            <a href="/admin" class="aiz-side-nav-link">
                                <i class="las la-home aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__('Tableau de board')}}</span>
                            </a>
                        </li>

                        <!-- Addon Manager -->
                        <li class="aiz-side-nav-item">
                            <a href="{{route('news.config')}}" class="aiz-side-nav-link ">
                                <i class="las la-wrench aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__("Articles")}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('staff')}}" class="aiz-side-nav-link ">
                                <i class="las la-wrench aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__("Equipe")}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('admin.entreprise.config')}}" class="aiz-side-nav-link ">
                                <i class="las la-wrench aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{__("Entreprise")}}</span>
                            </a>
                        </li>
                    </ul><!-- .aiz-side-nav -->
                </div><!-- .aiz-side-nav-wrap -->
            </div><!-- .aiz-sidebar -->
            <div class="aiz-sidebar-overlay"></div>
        </div><!-- .aiz-sidebar -->
        <div class="aiz-content-wrapper">
            <div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
                <div class="d-flex">
                    <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3 ml-0"
                        data-toggle="aiz-mobile-nav">
                        <button class="aiz-mobile-toggler">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
                    <div class="d-flex justify-content-around align-items-center align-items-stretch">
                        <div class="d-flex justify-content-around align-items-center align-items-stretch">
                            <div class="aiz-topbar-item">
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-icon btn-circle btn-light" href="{{ route('index')}}"
                                        target="_blank" title="site web">
                                        <i class="las la-globe"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                            <div class="aiz-topbar-item">
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-soft-danger btn-sm d-flex align-items-center"
                                        href="{{ route('staff.create')}}">
                                        <i class="las la-hdd fs-20"></i>
                                        <span class="fw-500 ml-1 mr-0 d-none d-md-block">{{__("
                                            Creer un membre")}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around align-items-center align-items-stretch">

                        <div class="aiz-topbar-item ml-2">
                            <div class="align-items-stretch d-flex dropdown">
                                <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);"
                                    role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="btn btn-icon p-0 d-flex justify-content-center align-items-center">
                                        <span class="d-flex align-items-center position-relative">
                                            <i class="las la-bell fs-24"></i>
                                            <span
                                                class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                                        </span>
                                    </span>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                                    <div class="p-3 bg-light border-bottom">
                                        <h6 class="mb-0">{{__("Notifications")}}</h6>
                                    </div>
                                    <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items- py-3">
                                                <div class="media text-inherit">
                                                    <div class="media-body">
                                                        <p class="mb-1 text-truncate-2">
                                                            Mouvement: 20220420-07072866 a ete paye
                                                        </p>
                                                        <small class="text-muted">
                                                            22 juillet 2022, 16:15min
                                                        </small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-center border-top">
                                        <a href="#" class="text-reset d-block py-2">
                                           {{ __("Voir toutes les notifications")}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="aiz-topbar-item ml-2">
                            <div class="align-items-stretch d-flex dropdown " id="lang-change">
                                <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);"
                                    role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="btn btn-icon">
                                       @if(Config("app.locale")=='fr')
                                      <span class="flag-img"><img
                                        src="{{asset('assets/img/flags/fr.png')}}" alt="" /></span>  {{__("Français")}}
                                      @else
                                      @if(Config("app.locale")=='en')
                                       <span class="flag-img"><img
                                        src="{{asset('assets/img/flags/en.png')}}" alt="" /></span> {{__("Anglais")}}
                                        @else
                                      <span class="flag-img"><img
                                        src="{{asset('assets/img/flags/cd.png')}}" alt="" /></span>   {{__("Swahili")}}
                                      @endif
                                      @endif
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">
                                <li><a class="dropdown-item  active " href="{{ route('locale.change', 'fr')}}">
                              <span class="flag-img"><img class="language"
                                        src="{{asset('assets/img/flags/fr.png')}}" alt="" /></span>  {{__("Français")}}
                                </a></li>
                                <li><a class="dropdown-item  active " href="{{ route('locale.change', 'en')}}">
                                <span class="flag-img"><img class="language"
                                        src="{{asset('assets/img/flags/en.png')}}" alt="" /></span>{{__("Anglais")}}
                                </a></li>
                                 <li><a class="dropdown-item  active " href="{{ route('locale.change', 'sw')}}">
                              <span class="flag-img"><img class="language"
                                        src="{{asset('assets/img/flags/cd.png')}}" alt="" /></span>  {{__("Swahili")}}
                                </a></li>

                            </ul>
                            </div>
                        </div>
                        <div class="aiz-topbar-item ml-2">
                            <div class="align-items-stretch d-flex dropdown">
                                <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown"
                                    href="javascript:void(0);" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <span class="avatar avatar-sm mr-md-2">
                                            <img src="{{ asset(Session::get('picprofile'))}}" alt="photo de profile"
                                                onerror="this.onerror=null;this.src='htdtps://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
                                        </span>
                                        <!-- <span class="d-none d-md-block">
                                            <span class="d-block fw-500">{{ Auth::user()->name}}</span>
                                            <span class=" d-block small opacity-60">admin</span>
                                        </span> -->
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                                    <a href="{{('profile')}}" class="dropdown-item">
                                        <i class="las la-user-circle"></i>
                                        <span>__("Profile")</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="las la-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div><!-- .aiz-topbar-item -->
                    </div>
                </div>
            </div><!-- .aiz-topbar -->
            @include('layouts.modal')
            @yield('content')
            @include('sweetalert::alert')
            <div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
                <p class="mb-0">&copy;@php
                    echo Date('Y');
                    @endphp {{ Config('app.name')}}</p>
            </div>
        </div><!-- .aiz-content-wrapper -->

    </div><!-- .aiz-main-wrapper -->
    <button id="commande-btn" type="btn" hidden data-target="#commande-modal" data-toggle="modal"></button>
    <button id="infosprod" type="btn" hidden data-target="#produitInfo-modal" data-toggle="modal"></button>
    <button id="editprod" type="btn" hidden data-target="#editproduit" data-toggle="modal"></button>

    <script src="{{asset('assets/js/vendors.js')}}"></script>
    <script src="{{asset('assets/js/aiz-core.js')}}"></script>
    <script type="text/javascript">
        AIZ.plugins.chart('#pie-1', {
            type: 'doughnut',
            data: {
                labels: [
                    'produits publie par l admin',
                    'produits publie par le vendeur',
                    'produits de Africa Brand'
                ],
                datasets: [{
                    data: [
                        148,
                        98,
                        50
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }]
            },
            options: {
                cutoutPercentage: 70,
                legend: {
                    labels: {
                        fontFamily: 'Poppins',
                        boxWidth: 10,
                        usePointStyle: true
                    },
                    onClick: function() {
                        return '';
                    },
                    position: 'bottom'
                }
            }
        });
        AIZ.plugins.chart('#pie-2', {
            type: 'doughnut',
            data: {
                labels: [
                    'Total de commandes     ',
                    'Commandes approuves',
                    'Commandes en attentes'
                ],
                datasets: [{
                    data: [
                        "{{ $data['totalVentes'] ?? '0'}}",
                        "{{ $data['ventes'] ?? '0'}}",
                        "{{ $data['attentes'] ?? '0'}}"
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff",
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }]
            },
            options: {
                cutoutPercentage: 70,
                legend: {
                    labels: {
                        fontFamily: 'Montserrat',
                        boxWidth: 10,
                        usePointStyle: true
                    },
                    onClick: function() {
                        return '';
                    },
                    position: 'bottom'
                }
            }
        });
        dataCategorie = <?php

                        use function GuzzleHttp\json_encode;

                        echo json_encode($dataCategorie ?? 0); ?>;
        let dataCategorieBuy = <?php

                                echo json_encode($dataCategorieBuy ?? 0); ?>;
        let dataCategorieBuyData = <?php

                                    echo json_encode($dataCategorieBuyData ?? 0); ?>;
        AIZ.plugins.chart('#graph-1', {
            type: 'bar',
            data: {
                labels: dataCategorieBuy,
                datasets: [{
                    label: 'Nombre d\'articles publies',
                    data: dataCategorieBuyData,
                    backgroundColor: [
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                        'rgba(55, 125, 255, 0.4)',
                    ],
                    borderColor: [
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                        'rgba(55, 125, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: '#f2f3f8',
                            zeroLineColor: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10,
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontFamily: 'Poppins',
                        boxWidth: 10,
                        usePointStyle: true
                    },
                    onClick: function() {
                        return '';
                    },
                }
            }
        });
        // dataCategorie = ['Chemise', 'Fruits'];
        let dataCategorieData = <?php echo json_encode($dataCategorieData  ?? 0); ?>;
        AIZ.plugins.chart('#graph-2', {
            type: 'bar',
            data: {
                labels: dataCategorie,
                datasets: [{
                    label: 'Nombre d\'articles non publies',
                    data: dataCategorieData,
                    backgroundColor: [
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                        'rgba(253, 57, 149, 0.4)',
                    ],
                    borderColor: [
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                        'rgba(253, 57, 149, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: '#f2f3f8',
                            zeroLineColor: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10,
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#f2f3f8'
                        },
                        ticks: {
                            fontColor: "#8b8b8b",
                            fontFamily: 'Poppins',
                            fontSize: 10
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontFamily: 'Poppins',
                        boxWidth: 10,
                        usePointStyle: true
                    },
                    onClick: function() {
                        return '';
                    },
                }
            }
        });
    </script>
    <!-- <script src="{{ asset('assets/js/aiz-core.js')}}"></script> -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->
    <script src="{{asset('assets/selected2/dist/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function($) {
            function clickme(el) {
                alert(el);
            }
            var success = "{{ Session('alert-session') ?? 'false' }}";
            switch (success) {
                case "produit-save":
                    AIZ.plugins.notify('success', "Le produit a ete ajoute avec success");
                    break;
                case "produit-delete":
                    AIZ.plugins.notify('success', "Le produit a ete supprime avec success");
                    break;
                case "produit-update":
                    AIZ.plugins.notify('success', "Le produit a ete mis a jour avec success");
                    break;
                case "categorie-save":
                    AIZ.plugins.notify('success', "La categorie a ete ajoutee avec success");
                    break;
                case "categorie-update":
                    AIZ.plugins.notify('success', "La categorie a ete mis a jour avec success");
                    break;
                case "categorie-delete":
                    AIZ.plugins.notify('success', "La categorie a ete supprime avec success");
                    break;
                case "error":
                    AIZ.plugins.notify('danger', "Ooups!, Echec de la requette!!!");
                    break;
                case "error-produit":
                    AIZ.plugins.notify('danger', "Ooups!, La quantite du stock est insufissant!");
                    break;
                case "commande-valide":
                    AIZ.plugins.notify('success', "La commande a ete valide!!!");
                    break;
                case "promotion-save":
                    AIZ.plugins.notify('success', "La promotion du produit a ete active avec success!!!");
                    break;


            }
            success = "{{ Session::put('alert-session', '')}}";
            $('.deadline').click(function() {
                $('#dealineProdId').val($(this).attr('data-id'));
                $('#prix_deadline').val($(this).attr('data-value') + " USD");
            });
            $('.decision-modal').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let urls = "{{ route('commade.show')}}";
                $.ajax({
                    type: "POST",
                    url: urls,
                    data: {
                        id: $(this).attr('data-id')
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res.count);
                        console.log(res.commandes.prix);
                        $('#commande-btn').trigger('click');
                        $("#name-client").text(res.commandes.username);
                        $("#commande-id").text(res.commandes.commande_id);
                        $('#qtestock').text((res.commandes.commande_qte) + " /" + (res.commandes.produit_qte));
                        $('#montant-total').text(res.commandes.total + " USD");
                        $('#accept-commande').attr("href", "commande-accept/" + res.commandes.commandeId);
                        $('#annuler-commande').attr("href", "commande-annuler/" + res.commandes.commandeId);
                        $('#delete-commande').attr("href", "commande-delete/" + res.commandes.commandeId);
                    }
                });
            });
            $('.modifCat').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $urls = "{{ route('categories.update.call')}}";
                // ajax
                $.ajax({
                    type: "POST",
                    url: $urls,
                    data: {
                        id: $(this).attr('data-id')
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res.name);
                        // $('#jan_plan').val(res.jan);
                        $('#catModal').trigger('click');
                        $('#nameCat').val(res.name);
                        $('#idCat').val(res.categorie_id);
                    }
                });
            });
            $('.visible-categorie').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var el = $(this);
                $urls = "{{ route('categories.visible')}}";
                // ajax
                $.ajax({
                    type: "POST",
                    url: $urls,
                    data: {
                        id: $(this).attr('data-id')
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res.id);
                        // console.log($(el).attr('class'));
                        $(el).find('i').toggleClass("la-eye-slash la-eye");
                        $(el).parentsUntil('.grand-parent').toggleClass('border-light border-success');
                        if (res.visible == "1") AIZ.plugins.notify('light', "Cette categorie est maintenant visible!!!");
                        else AIZ.plugins.notify('warning', "Oups! Cette categorie n'est maintenant visible!!!");
                    }
                });
            });
            $('.infocategorie').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $urls = "{{ route('categories.details')}}";
                // ajax
                $.ajax({
                    type: "POST",
                    url: $urls,
                    data: {
                        id: $(this).attr('data-id')
                    },
                    dataType: 'json',
                    success: function(res) {
                        // $('#jan_plan').val(res.jan);
                        $('#infosCat').trigger('click');
                        $('#info-modal-content').html(`
                        <div class="c-preloader text-center">
                        <div class="col-12 card-user">
                        <div class="content pt-3">
                            <div class="author">
                                <style>
                                    .avatar:hover {
                                        transform: scale(1.2);
                                        transition: transform 1s 0s ease;
                                    }
                                </style>
                                <a href="{{ asset(Session('picprofile'))}}">
                                    <img id="img" class="border-gray img-fit mt-5" src="" alt="Profile" />
                                    <h4 class="title text-center">
                                    <span id="titre"></span>
                                    <span id="infosite"></span><br>
                                        <br><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                    </h4>
                                </a>
                            </div>
                            <div class="row">
                              <div class="col-md-6">  __("Nombre de produits:")<br> <span id="infoprod"></span><br></div>
                              <div class="col-md-6">  __("Monopole:") <br><span id="infomono"></span><br></div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center py-3">
                            {{__("Produit details ")}} {{Config("app.name")}}
                        </div>
                    </div>
                        </div>
                        `);

                        $('#titre').text(res.name);
                        $('#infoprod').text(res.nombre_prod);
                        $('#infomono').text('{{Config("app.name")}}');
                        if (res.images == null) var img = "{{ asset('assets/img/default.png')}}";
                        else var img = "storage/" + res.images;
                        if (res.nombre_prod == null) $('#infoprod').remove();
                        $('#img').attr('src', img);
                        console.log(res.name);
                    }
                });
            });
            $('.infoproduit').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $urls = "{{ route('produit.details.info')}}";
                // ajax
                $.ajax({
                    type: "POST",
                    url: $urls,
                    data: {
                        id: $(this).attr('data-id')
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res.data);
                        // $('#jan_plan').val(res.jan);
                        $('#infosprod').trigger('click');
                        $('#infoprod-modal-content').html(`
                        <div class="c-preloader text-center">
                        <div class="col-12 card-user">
                        <div class="content pt-3">
                            <div class="author">
                                <style>
                                    .avatar:hover {
                                        transform: scale(1.2);
                                        transition: transform 1s 0s ease;
                                    }
                                </style>
                                <a href="{{ asset(Session('picprofile'))}}">
                                    <img id="img" class="border-gray img-fit mt-5" src="" alt="Profile" />
                                    <h4 class="title text-center">
                                    <span id="titre"></span>
                                    <span id="infosite"></span><br>
                                        <br><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                    </h4>
                                </a>
                            </div>
                            <div class="row">
                              <div class="col-md-6">  __("Qte de produits:")<br> <span id="infoprod"></span><br></div>
                              <div class="col-md-6">  __("Monopole:") <br><span id="infomono"></span><br></div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center py-3">
                            {{__("Produit details ")}} {{Config("app.name")}}
                        </div>
                    </div>
                        </div>
                        `);

                        $('#titre').text(res.name);
                        $('#infoprod').text(res.qte);
                        $('#infomono').text('{{Config("app.name")}}');
                        if (res.images == null) var img = "{{ asset('assets/img/default.png')}}";
                        else var img = "storage/" + res.images;
                        if (res.qte == null) $('#infoprod').remove();
                        $('#img').attr('src', img);
                        console.log(res.name);
                    }
                });
            });
            $('.modifproduit').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $urls = "{{ route('produit.details.info')}}";
                // ajax
                $.ajax({
                    type: "POST",
                    url: $urls,
                    data: {
                        id: $(this).attr('data-id')
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res.data);
                        // $('#jan_plan').val(res.jan);
                        $('#editprod').trigger('click');
                        $('#idProd').val(res.produit_id);
                        $('#nameProd').val(res.name);
                        $('#qteProd').val(res.qte);
                        $('#prixProd').val(res.prix);
                        $('#descriptionProd').html(res.description);
                        console.log(res.name);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $('.selectcategorie').select2({
            placeholder: 'Seclectionner une categorie',
            tags: true,
            ajax: {
                url: '/produitCategorie',
                dataType: 'json',
                delay: 100,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>

</body>

</html>
