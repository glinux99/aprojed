@extends('layouts.app_site')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Activités</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Nos activités</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

@php
    use Illuminate\Support\Str;

    $activities = [
        [
            'title' => 'Distribution de kits scolaires à Goma',
            'description' => 'Dans le cadre de notre programme d\'éducation pour tous, nous avons distribué des kits scolaires complets à plus de 500 enfants dans les écoles primaires de Goma pour assurer un meilleur avenir.',
            'image' => 'assets/img/courses-1.jpg', // Using existing images for demo
            'author' => 'Guillain PUNZU',
            'date' => '15 Octobre 2023',
            'category' => 'Éducation'
        ],
        [
            'title' => 'Forage d\'un nouveau puits d\'eau potable',
            'description' => 'La communauté de Sake a désormais accès à une source d\'eau potable saine grâce au nouveau puits foré par nos équipes. Ce projet va réduire les maladies hydriques et améliorer la santé.',
            'image' => 'assets/img/courses-2.jpg', // Using existing images for demo
            'author' => 'Joseph BOSHWENDA',
            'date' => '02 Novembre 2023',
            'category' => 'Santé et Hygiène'
        ],
        [
            'title' => 'Formation en agriculture durable pour les femmes',
            'description' => 'Un atelier de formation sur les techniques d\'agriculture durable a été organisé pour les femmes agricultrices de la région de Masisi, renforçant leur autonomie économique et sécurité alimentaire.',
            'image' => 'assets/img/courses-3.jpg', // Using existing images for demo
            'author' => 'Yannick RUTSUBA',
            'date' => '28 Novembre 2023',
            'category' => 'Développement Économique'
        ],
        [
            'title' => 'Campagne de reboisement dans le parc des Virunga',
            'description' => 'En partenariat avec les communautés locales, nous avons lancé une vaste campagne de reboisement pour restaurer l\'écosystème et lutter contre la déforestation dans cette zone protégée.',
            'image' => 'assets/img/about-1.jpg', // Using existing images for demo
            'author' => 'L\'équipe APROJED',
            'date' => '05 Décembre 2023',
            'category' => 'Environnement'
        ],
    ];

    $categories = ['Éducation', 'Santé et Hygiène', 'Développement Économique', 'Environnement', 'Protection de l\'enfance'];
    $recent_activities = array_slice($activities, 0, 3);
@endphp

<!-- Activities Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Activities list -->
            <div class="col-lg-8">
                <div class="row g-4">
                    @foreach($activities as $index => $activity)
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                            <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                                <div class="text-center p-4 pt-0">
                                    <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                        <small>{{ $activity['category'] }}</small>
                                    </div>
                                    <h5 class="mb-3">{{ $activity['title'] }}</h5>
                                    <p>{{ Str::limit($activity['description'], 120) }}</p>
                                    <div class="d-flex justify-content-center text-muted">
                                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>{{ $activity['author'] }}</small>
                                        <small><i class="fa fa-calendar-alt text-primary me-2"></i>{{ $activity['date'] }}</small>
                                    </div>
                                </div>
                                <div class="position-relative mt-auto">
                                    <img class="img-fluid" src="{{ asset($activity['image']) }}" alt="Image de l'activité : {{ $activity['title'] }}">
                                    <div class="causes-overlay">
                                        <a class="btn btn-outline-primary" href="">
                                            Lire Plus
                                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                                <i class="fa fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Start -->
                <div class="row mt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#">Suivant</a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
                <!-- Pagination End -->
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Categories -->
                <div class="mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-4">Catégories</h3>
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="" class="text-dark">{{ $category }}</a>
                                <span class="badge bg-primary rounded-pill">14</span> <!-- Dummy count -->
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Recent Activities -->
                <div class="wow fadeInUp" data-wow-delay="0.3s">
                    <h3 class="mb-4">Activités Récentes</h3>
                    @foreach($recent_activities as $activity)
                        <div class="d-flex mb-3">
                            <img src="{{ asset($activity['image']) }}" class="img-fluid flex-shrink-0" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                            <div class="ms-3">
                                <h6 class="mb-1"><a href="" class="text-dark">{{ Str::limit($activity['title'], 40) }}</a></h6>
                                <small class="text-muted"><i class="fa fa-calendar-alt text-primary me-1"></i>{{ $activity['date'] }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Activities End -->
@endsection
