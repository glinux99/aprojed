@extends('layouts.app_site')
@section('content')
  <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/img/carousel-1.jpg') }}" alt="Image du carrousel">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-5 text-white mb-3 animated slideInDown">ACTIONS ET PROJETS POUR UN DÉVELOPPEMENT DURABLE</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Ensemble, construisons un avenir meilleur pour la R.D. Congo. APROJED s'engage dans des projets concrets pour un développement qui respecte l'environnement et valorise les communautés locales.</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="/about">
                                        En Savoir Plus
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Image du carrousel">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-5 text-white mb-3 animated slideInDown">Notre main tendue pour un avenir durable</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">De l'éducation à l'accès à l'eau potable, chaque action compte. Rejoignez-nous pour faire une différence durable dans la vie de milliers de personnes.</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="/about">
                                        En Savoir Plus
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;"> {{-- <img class="position-absolute w-100 h-100 pt-5 pe-5" src="img/about-1.jpg" alt="" style="object-fit: cover;"> --}}
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="{{ asset('assets/img/about-1.jpg') }}" alt="À propos de nous" style="object-fit: cover;">
                        <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="{{ asset('assets/img/about-2.jpg') }}" alt="À propos de nous" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        {{-- <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">À Propos de Nous</div> --}}
                        <h1 class="display-6 mb-5">Nous aidons les populations de la R.D. Congo à construire un avenir durable</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2">Notre conviction est que le développement ne peut être durable que s'il est porté par les communautés elles-mêmes. Nous sommes là pour les accompagner.</p>
                            <span class="text-primary">L'équipe APROJED, Fondateurs</span>
                        </div>
                        <p class="mb-5">APROJED R.D.Congo est une organisation non gouvernementale dédiée à la mise en œuvre de projets de développement durable. Notre approche est holistique, intégrant l'éducation, la santé, l'accès à l'eau potable et le développement économique pour créer un impact positif et durable au sein des communautés congolaises.</p>
                        <a class="btn btn-primary py-2 px-3 me-3" href="/about">
                            En Savoir Plus
                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                        <a class="btn btn-outline-primary py-2 px-3" href="/contact">
                            Contactez-nous
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Causes Start -->
    <div class="container-xxl bg-light my-5 py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Nos Causes Principales</div>
                <h1 class="display-6 mb-5">Chaque Communauté Mérite une Chance de Prospérer</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Éducation</small>
                            </div>
                            <h5 class="mb-3">Éducation pour tous en R.D. Congo</h5>
                            <p>L'accès à une éducation de qualité est la clé de l'avenir. Nous construisons des écoles et fournissons le matériel nécessaire pour offrir aux enfants un meilleur départ dans la vie.</p>
                            <div class="causes-progress bg-light p-3 pt-2">
                                <div class="d-flex justify-content-between">
                                    {{-- <p class="text-dark">10,000 <small class="text-body">Atteind</small></p>
                                    <p class="text-dark">9,542 <small class="text-body">Reste</small></p> --}}
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                        <span>90%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{ asset('assets/img/courses-1.jpg') }}" alt="Image de la cause">
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
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Sécurité alimentaire</small>
                            </div>
                            <h5 class="mb-3">Garantir l'accès à une bonne alimentations</h5>
                            <p>L'eau, c'est la vie. Nos projets de forage et de purification de l'eau permettent de lutter contre les maladies et d'améliorer la santé des communautés.</p>
                            <div class="causes-progress bg-light p-3 pt-2">
                                <div class="d-flex justify-content-between">
                                    {{-- <p class="text-dark">10,000 <small class="text-body">Atteind</small></p>
                                    <p class="text-dark">9,542 <small class="text-body">Reste</small></p> --}}
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        <span>80%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{ asset('assets/img/courses-2.jpg') }}" alt="Image de la cause">
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
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                <small>Développement Économique</small>
                            </div>
                            <h5 class="mb-3">Soutenir l'entrepreneuriat local</h5>
                            <p>Nous soutenons les initiatives locales et l'agriculture durable pour renforcer l'autonomie économique et la sécurité alimentaire des familles.</p>
                            <div class="causes-progress bg-light p-3 pt-2">
                                <div class="d-flex justify-content-between">
                                    {{-- <p class="text-dark">10,000 <small class="text-body">Atteind</small></p>
                                    <p class="text-dark">9,542 <small class="text-body">Reste</small></p> --}}
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                        <span>40%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{ asset('assets/img/courses-3.jpg') }}" alt="Image de la cause">
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
            </div>
        </div>
    </div>
    <!-- Causes End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Ce que nous faisons</div>
                <h1 class="display-6 mb-5">Découvrez nos actions et impliquez-vous</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="{{ asset('assets/img/icon-1.png') }}" alt="Icône du service">
                        <h4 class="mb-3">Éducation et Formation</h4>
                        <p class="mb-4">Nous croyons en l'éducation comme pilier du développement. Nos programmes visent à améliorer l'accès et la qualité de l'enseignement pour les enfants et les adultes.</p>
                        <a class="btn btn-outline-primary px-3" href="">
                            En Savoir Plus
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="{{ asset('assets/img/icon-2.png') }}" alt="Icône du service">
                        <h4 class="mb-3">Santé et Hygiène</h4>
                        <p class="mb-4">Un accès aux soins de base et à l'eau potable est un droit fondamental. Nous mettons en place des infrastructures pour améliorer la santé et le bien-être des populations.</p>
                        <a class="btn btn-outline-primary px-3" href="">
                            En Savoir Plus
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="{{ asset('assets/img/icon-3.png') }}" alt="Icône du service">
                        <h4 class="mb-3">Agriculture et Environnement</h4>
                        <p class="mb-4">Nous promouvons des pratiques agricoles durables et des projets de reboisement pour préserver l'environnement et assurer la sécurité alimentaire.</p>
                        <a class="btn btn-outline-primary px-3" href="">
                            En Savoir Plus
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Donate Start -->
    <div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="{{ asset('assets/img/carousel-2.jpg') }}">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Faites un Don</div>
                    <h1 class="display-6 text-white mb-5">Merci pour les résultats obtenus grâce à vous</h1>
                    <p class="text-white-50 mb-0">Votre soutien est essentiel pour la continuité de nos actions. Chaque don, petit ou grand, contribue directement à l'amélioration des conditions de vie en R.D. Congo.</p>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-white p-5">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" id="name" placeholder="Votre Nom">
                                        <label for="name">Votre Nom</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light border-0" id="email" placeholder="Votre Email">
                                        <label for="email">Votre Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group d-flex justify-content-around">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
                                        <label class="btn btn-light py-3" for="btnradio1">$10</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                        <label class="btn btn-light py-3" for="btnradio2">$20</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                        <label class="btn btn-light py-3" for="btnradio3">$30</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-5" style="height: 60px;">
                                        Faire un Don
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->


    {{-- <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Notre Équipe</div>
                <h1 class="display-6 mb-5">Rencontrez ceux qui œuvrent sur le terrain</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/team-1.jpg') }}" alt="Membre de l'équipe">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Nom Complet</h5>
                            <p class="text-primary">Poste</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/team-2.jpg') }}" alt="Membre de l'équipe">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Nom Complet</h5>
                            <p class="text-primary">Poste</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/team-3.jpg') }}" alt="Membre de l'équipe">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Nom Complet</h5>
                            <p class="text-primary">Poste</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/team-4.jpg') }}" alt="Membre de l'équipe">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Nom Complet</h5>
                            <p class="text-primary">Poste</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Témoignages</div>
                <h1 class="display-6 mb-5">La confiance de nos partenaires et bénéficiaires</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('assets/img/testimonial-1.jpg') }}" alt="Témoignage" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Grâce à APROJED, notre village a maintenant accès à l'eau potable. Cela a changé nos vies. Les enfants ne tombent plus malades aussi souvent et nous avons plus de temps pour cultiver nos champs."</p>
                        <h5 class="mb-1">Nom du bénéficiaire</h5>
                        <span class="fst-italic">Village de...</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('assets/img/testimonial-2.jpg') }}" alt="Témoignage" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Le soutien d'APROJED à notre coopérative agricole nous a permis d'augmenter nos rendements et de mieux vendre nos produits. C'est une véritable bouffée d'oxygène pour nos familles."</p>
                        <h5 class="mb-1">Nom du partenaire</h5>
                        <span class="fst-italic">Coopérative agricole</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('assets/img/testimonial-3.jpg') }}" alt="Témoignage" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"L'école construite par APROJED est une bénédiction. Mes enfants peuvent enfin apprendre à lire et à écrire dans de bonnes conditions. Je suis pleine de gratitude."</p>
                        <h5 class="mb-1">Nom du bénéficiaire</h5>
                        <span class="fst-italic">Mère de famille</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End --> --}}

@endsection
