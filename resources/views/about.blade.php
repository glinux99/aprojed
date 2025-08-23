@extends('layouts.app_site')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">À Propos de Nous</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">À Propos</li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Mission et Vision</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Mission and Vision Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Notre Raison d'Être</div>
                <h1 class="display-6 mb-5">Mission et Vision de l’organisation APROJED</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h3 class="mb-3">Mission</h3>
                        <p class="mb-4">Promouvoir le développement durable et la résilience des communautés vulnérables à travers des interventions multisectorielles intégrant la sécurité alimentaire, la santé, l’éducation, la protection, l’autonomisation des femmes et des jeunes, la justice sociale et la préservation de l’environnement.</p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="h-100">
                        <h3 class="mb-3">Vision</h3>
                        <p class="mb-4">Voir naître une société équitable, résiliente et durable où chaque individu, en particulier les plus vulnérables, vit dans la dignité, accède à ses droits fondamentaux et participe activement à un développement harmonieux, juste et respectueux de l’environnement.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mission and Vision End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="{{ asset('assets/img/about-1.jpg') }}" alt="Image sur notre mission" style="object-fit: cover;">
                        <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="{{ asset('assets/img/about-2.jpg') }}" alt="Image sur notre vision" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">À Propos de Nous</div>
                        <h1 class="display-6 mb-5">Notre Engagement pour un Avenir Durable en R.D. Congo</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <h4 class="text-primary">Notre Mission</h4>
                            <p class="text-dark mb-2">Mettre en œuvre des projets concrets et participatifs pour améliorer durablement les conditions de vie des communautés congolaises, en agissant sur les piliers essentiels que sont l'éducation, la santé, l'économie et l'environnement.</p>
                        </div>
                         <div class="bg-light border-bottom border-5 border-secondary rounded p-4 mb-4">
                            <h4 class="text-primary">Notre Vision</h4>
                            <p class="text-dark mb-2">Nous aspirons à une République Démocratique du Congo où chaque communauté est autonome, résiliente et prospère. Une nation où le développement économique se conjugue avec la justice sociale et la préservation de l'environnement pour les générations futures.</p>
                        </div>
                        <a class="btn btn-primary py-2 px-3 me-3" href="">
                            Faire un don
                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Objectives Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Nos Objectifs</div>
                <h1 class="display-6 mb-5">Nos Piliers d'Action pour le Développement Durable</h1>
            </div>

            @php
                $objectives = [
                    ['title' => 'Sécurité alimentaire et Agriculture durable', 'text' => 'Assurer la sécurité alimentaire, améliorer la nutrition et promouvoir une agriculture durable.', 'img' => 'objectif-a.jpg', 'alt' => 'Agriculture durable'],
                    ['title' => 'Amélioration de la santé', 'text' => 'Engager une synergie de l’amélioration de la santé des populations en répondant à leurs besoins préventifs et curatifs.', 'img' => 'objectif-b.jpg', 'alt' => 'Santé des populations'],
                    ['title' => 'Éducation de qualité', 'text' => 'Veiller à ce que les filles et garçons aient accès à l’éducation et promouvoir des possibilités d’apprentissage de qualité des jeunes dans des conditions équitables.', 'img' => 'objectif-c.jpg', 'alt' => 'Éducation de qualité'],
                    ['title' => 'Protection de l\'enfance', 'text' => 'Prévenir l\'exploitation des enfants et les abus sexuels en leur fournissant une aide pour surmonter, le cas échéant, les traumatismes subis.', 'img' => 'objectif-d.jpg', 'alt' => 'Protection de l\'enfance'],
                    ['title' => 'Autonomisation des femmes et des filles', 'text' => 'Rendre les femmes et les filles plus autonomes pour parvenir à l’égalité des sexes.', 'img' => 'objectif-e.jpg', 'alt' => 'Autonomisation des femmes'],
                    ['title' => 'Accès à l\'eau et Assainissement', 'text' => 'Garantir l’accès à l’eau et l’assainissement au sein des communautés vulnérables.', 'img' => 'objectif-f.jpg', 'alt' => 'Accès à l\'eau'],
                    ['title' => 'Croissance économique et Travail décent', 'text' => 'Promouvoir une croissance économique soutenue, partagée et durable, le plein-emploi productif et un travail décent pour tous.', 'img' => 'objectif-h.jpg', 'alt' => 'Travail décent'],
                    ['title' => 'Développement local et Entrepreneuriat', 'text' => 'Soutenir les actions de développement local et favoriser l’entrepreneuriat qui respectent l’environnement et permettre l’accès de tous aux nouvelles technologies.', 'img' => 'objectif-j.jpg', 'alt' => 'Développement local'],
                    ['title' => 'Consommation et Production durables', 'text' => 'Instaurer des modes de consommation et de production durables : éviter le gaspillage, diminuer les déchets et les biens de consommation en les réduisant, les réutilisant et les recyclant.', 'img' => 'objectif-i.jpg', 'alt' => 'Production durable'],
                    ['title' => 'Préservation de la biodiversité', 'text' => 'Conserver et exploiter la faune et la flore de manière durable en préservant et en restaurant les écosystèmes terrestres.', 'img' => 'objectif-l.jpg', 'alt' => 'Biodiversité'],
                ];
            @endphp

            @foreach($objectives as $index => $objective)
            <div class="row g-5 mb-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp @if($index % 2 != 0) order-lg-2 @endif" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ asset('assets/img/' . $objective['img']) }}" alt="{{ $objective['alt'] }}">
                </div>
                <div class="col-lg-6 wow fadeInUp @if($index % 2 != 0) order-lg-1 @endif" data-wow-delay="0.3s">
                    <h4 class="mb-3"> {{ $objective['title'] }}</h4>
                    <p class="mb-4">{{ $objective['text'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Objectives End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Notre Équipe</div>
                <h1 class="display-6 mb-5">Rencontrez ceux qui œuvrent sur le terrain</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @if(isset($teamMembers) && $teamMembers->count() > 0)
                    @foreach($teamMembers as $index => $member)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                            <div class="team-item position-relative rounded overflow-hidden h-100">
                                <div class="overflow-hidden">

                                    @if($member->profile_photo_path)
                                        <img class="img-fluid" style="height: 300px; width: 100%; object-fit: cover;" src="{{ asset('storage/' . $member->profile_photo_path) }}" alt="Photo de {{ $member->name }}">
                                    @else
                                        <div class="img-fluid d-flex align-items-center justify-content-center bg-light" style="height: 300px; width: 100%;">
                                            <i class="fa fa-user fa-3x text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="team-text bg-light text-center p-4">
                                    <h5>{{ $member->name }}</h5>
                                    <p class="text-primary">{{ $member->role }}</p>
                                    <div class="team-social text-center">
                                        <a class="btn btn-square" href="{{ $siteSettings->facebook_url ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square" href="{{ $siteSettings->twitter_url ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square" href="{{ $siteSettings->instagram_url ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Aucun membre de l'équipe à afficher pour le moment.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
