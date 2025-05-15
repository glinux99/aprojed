@extends('layouts.page')
@section('titre')
__("Blog")
@endsection
@section('content')
<section class="">
    <!--Page Title-->
    <section class="page-title" style="background-image:url(assets/ui/images/background/6.jpg)">
        <div class="auto-container">
            <ul class="page-breadcrumb">
                <li><a href="/">Acceuil</a></li>
                <li>{{__("Apropos")}}</li>
            </ul>
            <h1>{{__("A propos")}}</h1>
        </div>
    </section>
    <!--Company Section-->
    <section class="company-section ">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Column-->
                <div class="content-column col-md-8 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="sec-title pb-0 mb-6">
                            <h2>
                                {{__("Présentation de l'Association")}}
                            </h2>
                            <div class="separator centered"></div>
                        </div>

                        <div class="text text-justify">
                            {{__("Les conflits armés et les catastrophes naturelles continuent à provoquer des mouvements de population importants dans le monde et des incidents de protection. Dans certains pays subsahariens, l’accès aux services de base de qualité reste très limité. Les politiques publiques de développement et de protection sociale à l’attention des plus vulnérables sont insuffisantes et de profondes inégalités demeurent à travers ces pays.
Cette recrudescence des conflits se caractérise par les impacts suivants : l’insécurité alimentaire aiguë, la malnutrition aiguë, les épidémies et les problématiques de protection humaine et environnementale, le manque des infrastructures sociales de base et de relèvement économique.
La République Démocratique du Congo fait partie des pays les plus touchés et dont les conséquences accentuent la nécessité des interventions diversifiées.
Vu ce qui précède, la stratégie des réponses multisectorielles de renforcement de résilience systémique permettra de sauver des vies des personnes affectées en couvrant leurs besoins et en même temps en orientant ces réponses vers des mécanismes du développement durable.
Ainsi conscients de cette problématique, sommes convenus qu’une action concertée de notre part est susceptible d’agir positivement sur cette réalité déplorable devra être mise en place afin de participer à la recherche de satisfaction des besoins de ces populations en difficulté, ainsi qu’à la défense de leur droits violés.
L’an mille neuf cent quatre-vingt-treize, le 15ème jour du mois de janvier, il est créée Goma une association apolitique et sans but lucratif conformément à la loi régissant les asbl en République Démocratique du Congo, à caractère laïc dénommé « Actions et Projets pour un Développement Durable » APROJED en sigle.
Le Siège social de APROJED est établit sur l’Avenue Julien Paluku,  n°9, Quartier Murara, Commune de Karisimbi, Ville de Goma dans la Province du Nord-Kivu en République Démocratique du Congo.
")}}
                        </div>
                        <div class="signature"><img src="images/resource/signature.png" alt="" /></div>
                    </div>
                </div>

                <!--Image Column-->
                <div class="image-column col-md-4 col-sm-12 col-xs-12 d-none d-lg-block">
                    <div class="inner-column">
                        <div class="image">
                            <img src="assets/ui/images/mainSlider/slide5.jpg" alt="" />
                        </div>
                        <div class="carousel-box">
                            <div class="single-item-carousel owl-carousel owl-box">

                                <div class="testimonial-block-six">
                                    <div class="inner">
                                        <div class="quote-icon">
                                            <span class="icon flaticon-left-quote-sketch"></span>
                                        </div>
                                        <div class="text">{{__("La main qui donne est plus heureuse que la main qui reçoit.
                                            Apprenos à ouvrir nos coeur et aidons les autres tout en protégeant notre
                                            mère nature ")}}</div>
                                        <div class="author-box">
                                            <div class="">
                                                <div class="image"><img src="{{ asset('assets/ui/images/logo_bgw.png')}}"
                                                        alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Company Section-->

    <!--Highlights Section-->
    <section class="highlights-section">
        <div class="image-layer" style="background-image:url(images/background/10.jpg)"></div>
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Column-->
                <div class="content-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2> {{ __("Nos règles d'or")}} </h2>
                            <div class="separator centered"></div>
                        </div>

                        <div class="row clearfix">

                            <!--Hightlight Block-->
                            <div class="hightlight-block col-md-6 col-sm-6 col-xs-12">
                                <div class="hightlight-inner">
                                    <div class="icon-box">
                                        <span class="icon flaticon-target"></span>
                                    </div>
                                    <h3>
                                        {{__("Assurer la sécurité alimentaire")}}
                                    </h3>
                                    {{--  <a href="#" class="overlay-link">{{__("Assurer la sécurité alimentaire")}}</a>  --}}
                                    <p class="px-2">
                                        {{__("améliorer la nutrition et promouvoir une agriculture durable.")}} </p>
                                </div>
                            </div>

                            <!--Hightlight Block-->
                            <div class="hightlight-block col-md-6 col-sm-6 col-xs-12">
                                <div class="hightlight-inner">
                                    <div class="icon-box">
                                        <span class="icon flaticon-graph"></span>
                                    </div>
                                    <h3>
                                        {{__("La santé des populations")}}
                                    </h3>
                                    {{--  <a href="#" class="overlay-link">{{__("La santé des populations")}}</a>  --}}
                                    <p class="px-2">
                                        {{__("Engager une synergie de l’amélioration de la santé des populations en répondant à leurs besoins préventifs et curatifs.")}}
                                    </p>
                                </div>
                            </div>

                            <!--Hightlight Block-->
                            <div class="hightlight-block col-md-6 col-sm-6 col-xs-12">
                                <div class="hightlight-inner">
                                    <div class="icon-box">
                                        <span class="icon flaticon-quality"></span>
                                    </div>
                                    <h3>
                                        {{__("Educations")}}
                                    </h3>
                                    {{--  <a href="#" class="overlay-link">{{__("Educations")}}</a>  --}}
                                    <p class="px-2">
                                        {{__("Veiller à ce que les filles et garçons aient accès à l’éducation et promouvoir des possibilités d’apprentissage de qualité des jeunes dans des conditions équitables. ")}}
                                    </p>
                                </div>
                            </div>

                            <!--Hightlight Block-->
                            <div class="hightlight-block col-md-6 col-sm-6 col-xs-12">
                                <div class="hightlight-inner">
                                    <div class="icon-box">
                                        <span class="icon flaticon-idea"></span>
                                    </div>
                                    <h3>
                                        {{__("Abus")}}
                                    </h3>
                                    {{--  <a href="#" class="overlay-link">{{__("Abus")}}</a>  --}}
                                    <p class="px-2">
                                        {{__("Prévenir l'exploitation des enfants et les abus sexuels en leur fournissant une aide pour surmonter, le cas échéant, les traumatismes subis (dénonciation, prise en charge psychologique, ...) ;")}}</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!--Services Column-->
                <div class="services-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="upper-box">
                            <div class="icon flaticon-target"></div>
                            <h2>
                                {{__("Notre Mission")}}
                            </h2>
                        </div>
                        <div class="text">

                            {{__(" Notre mission est de lutter activement contre l'exploitation et les abus sexuels dont les enfants sont victimes, en mettant en œuvre des stratégies de prévention efficaces et en offrant un accompagnement holistique aux survivants. Nous nous engageons à fournir aux enfants et à leurs familles le soutien nécessaire pour dénoncer ces crimes en toute sécurité et à faciliter une prise en charge psychologique spécialisée et adaptée, afin de les aider à surmonter les traumatismes subis et à reconstruire leur vie avec dignité et résilience. Notre objectif est d'assurer la protection, le bien-être et la restauration des droits fondamentaux de chaque enfant.")}}
                        </div>
                        <a href="/" class="services">
                            {{__("En savoir plus")}} <span
                                class="icon flaticon-arrow-pointing-to-right"></span></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Highlights Section-->

    <!--History Section-->
    <section class="history-section">
        <div class="auto-container">
            <div class="sec-title centered mb-5">
                <h2>
                    {{__("NOS VALEURS FONDAMENTALES ")}}
                </h2>
                <div class="separator"></div>
            </div>

            <div class="history-carousel">
                <div class="carousel-outer">
                    <div class="thumbs-outer">
                        <ul class="thumbs-carousel owl-carousel owl-theme">
                            <li>{{__("Service")}}</li>
                            <li>{{__("Confiance")}} </li>
                            <li>{{__("Intégrité")}}</li>
                            <li>{{__("Valoriser les gens")}}</li>

                            <li>
                                {{__("Relation")}}
                            </li>
                            <li>
                                {{__("Excellence")}}
                            </li>

                        </ul>
                    </div>
                    <div class="content-carousel owl-carousel owl-theme">

                        <div class="content-slide">
                            <div class="content-inner">
                                <h3>Service</h3>

                                <div class="text">
                                    {{__("Pour ameliorer les conditions de vie de populations, nous devons etre
                                    avec un
                                    haut niveau de professionnalisme et d'amour pour autrui. ")}}
                                </div>
                            </div>
                        </div>
                        <div class="content-slide">
                            <div class="content-inner">
                                <h3>Confiance </h3>

                                <div class="text">
                                    {{__("Nous croyons que la confiance et le respect sont essentiels dans ce
                                    que nous faisons")}}
                                </div>
                            </div>
                        </div>
                        <div class="content-slide">
                            <div class="content-inner">
                                <h3>Integrity</h3>

                                <div class="text">
                                    {{__("Nous nous engageons à un haut niveau d'intégrité.")}}
                                </div>
                            </div>
                        </div>
                        <div class="content-slide">
                            <div class="content-inner">
                                <h3>Valoriser les gens</h3>

                                <div class="text">
                                    {{__(" Nous apprécions chaque personne que nous aidons et encourageons leur
                                    développement")}}
                                </div>
                            </div>
                        </div>
                        <div class="content-slide">
                            <div class="content-inner">
                                <h3>
                                    {{__("Relation")}}
                                </h3>

                                <div class="text">
                                    {{__("Nous croyons aux bonnes relations et à l'équité dans toutes nos aides
                                    que nous faisons")}}
                                </div>
                            </div>
                        </div>
                        <div class="content-slide">
                            <div class="content-inner">
                                <h3>
                                    {{__("Excellence")}} </h3>

                                <div class="text">
                                    {{__("Nous nous efforçons d'exceller toujours.")}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!--End History Section-->

    <!--Achived Section-->
    <section class="achived-section" style="background-image:url(images/background/11.jpg)">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Title Column-->
                <div class="title-column col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <h2>
                                {{__("Ce que nous avons réalisé")}}
                            </h2>
                            <div class="separator"></div>
                        </div>
                        {{--  <div class="title">La force et la croissance ne viennent que grâce à un effort continu.</div>  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">1</li>
                                    <li><a href="#">{{__("Du janvier 2023 en nos jours")}} </a></li>
                                </ul>
                                <div class="text">
                                    {{__("Projet de campagne de rattrapage d’enregistrement de 230 000 enfants à l’état civil (UN ETAT CIVIL POUR LES ENFANTS DU NORD KIVU) avec appuis de AFD et AMADE. Dans la province du Nord Kivu Goma, Nyiragongo Lubero et Beni territoire ;")}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">2</li>
                                    <li><a href="#">
                                        {{__("Du janvier 2009 à nos jours  ")}}</a></li>
                                </ul>
                                <div class="text">{{__("Projet de réinsertion socioéconomique des enfants sorti dans les forces et groupes armes avec appuis de SOS Enfants France")}}</div>
                            </div>
                            <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">3</li>
                                    <li><a href="#">
                                        {{__("Du janvier 2024 à nos jours")}} </a></li>
                                </ul>
                                <div class="text">
                                   {{__(" Projet d’auto prise en charge des jeunes à travers les métiers dans le territoire de Nyiragongo. Construction d’une minoterie / formation des jeunes, avec appuis de SOS Enfants France.")}}
                                </div>
                                <div class="text">{{__("Projet de lutte contre le VBG vers entreprenariat (formation professionnelle des filles mères et autres filles vulnérable) avec appuis de LVDE La voix de l’enfant France ;")}}</div>
                            </div>
                            <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">4</li>
                                    <li><a href="#">
                                        {{__("Avril 2024 à nos jours")}}  </a></li>
                                </ul>
                                <div class="text">
                                    {{__("Projet Ecole au centre de la communauté vulnérable. Construction de quatre écoles dans le territoire de Nyiragongo avec appuis de SOS Enfants France et la Fondation Orange")}}</div>
                            </div>
                             <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">5</li>
                                    <li><a href="#">{{__("Avril 2024 à Aout 2024 ")}} </a></li>
                                </ul>
                                <div class="text">
                                    {{__("construction de deux écoles modernes dans le territoire de Nyiragongo")}}</div>
                            </div>
                             <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">6</li>
                                    <li><a href="#">{{__("Avril 2024 à nos jours ")}} </a></li>
                                </ul>
                                <div class="text">
                                    {{__("Projet Ecole au centre de la communauté vulnérable. Construction de quatre écoles dans le territoire de Nyiragongo avec appuis de SOS Enfants France et la Fondation Orange")}}</div>
                            </div>
                             <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">7</li>
                                    <li><a href="#">{{__("Avril 2024 à nos jours ")}} </a></li>
                                </ul>
                                <div class="text">
                                    {{__("Projet Ecole au centre de la communauté vulnérable. Construction de quatre écoles dans le territoire de Nyiragongo avec appuis de SOS Enfants France et la Fondation Orange")}}</div>
                            </div>
                             <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">8</li>
                                    <li><a href="#">{{__("2014 à nos jours  ")}} </a></li>
                                </ul>
                                <div class="text">
                                   {{__("Regroupement de plus de 1200 familles dans la thématique des mutuelles des solidarités (MUSO) et Millionnaire;
9.	De 2016 à nos jours : Projet d’appui en élevage et agriculture rotatives dans le quartier Mugunga ;")}}
</div>
                            </div>
                             <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">9</li>
                                    <li><a href="#">2023 à nos jours   </a></li>
                                </ul>
                                <div class="text">
                                    {{__("Projet d’urgence d’encadrement et scolarisation des enfants déplaces des guerres dans la ville de Goma et Territoire de Nyiragongo ;")}}</div>
                            </div>
                             <div class="col-md-6">
                                <ul class="achived-list">
                                    <li class="icon flaticon-time-1"></li>
                                    <li class="number">10</li>
                                    <li><a href="#">2020 à nos jours    </a></li>
                                </ul>
                                <div class="text">
                                   {{__("culture et production de l’artemisia (plante médicinale).")}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Graph Column-->


            </div>
        </div>
    </section>
    <!--End Achived Section-->
    <div class="col-10">

    </div>
    <!--Team Section-->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <h2>
                    {{__("Derrière notre succès")}}
                </h2>
                <div class="separator"></div>
            </div>
            <div class="row clearfix ">

                @foreach ($users as $user)
                <div class="team-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        @if($user->images)
                              <div class="image">
                            <img class="img-fit h-200px"
                                src="{{ $user->images->images ? asset('storage/'. $user->images->images) : asset('assets/img/default.png')}}"
                                alt="{{ $user->images->images ? asset('storage/'. $user->images->images) : ''}}"
                                class="" />
                            <div class="overlay-box">
                                <ul class="social-icon-two">
                                    <li><a href="{{ '//https://wa.me/'.$user->numero}}"><span
                                                class="fa fa-whatsapp"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="lower-content">
                            <h3><a href="/">{{ $user->name}}</a></h3>
                            <a href="/">
                                <div class="designation">{{ $user->poste}}</div>
                            </a>
                            {{-- <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta ea
                                placeat
                                inventore sed, maiores eius a non doloribus ut. Reprehenderit tempora adipisci unde
                                fugiat sunt culpa, amet itaque ipsa nostrum.</div> --}}
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--End Team Section-->

    <!--Call To Action Section-->
    <section class="call-to-action-section" style="background-image:url(assets/ui/images/background/5.jpg)">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <h2>{{__("Faisons de notre mieux pour aider la population en répondant à leurs besoins préventifs et curatifs.")}}
                    </h2>
                </div>
                <div class="link-column col-md-3 col-sm-12 col-xs-12">
                    <a class="apointment" href="/contact">
                        {{__("Participer maintenant")}} <span
                            class="icon flaticon-arrow-pointing-to-right"></span></a>
                </div>
            </div>
        </div>
    </section>

</section>

@endsection
