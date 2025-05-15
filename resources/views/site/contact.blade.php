@extends('layouts.page')
@section('titre')
__("Blog")
@endsection
@section('content')
<section class="">
    <section>
        <!--Location Section-->
        <section class="page-title" style="background:url(assets/ui/images/background/bg-1.jpg);background-position: center bottom;">
            <div class="auto-container">
                <ul class="page-breadcrumb">
                    <li><a href="">
                    {{__("Acceuil")}}
                    </a></li>
                    <li>
                        {{__("Contact")}}
                    </li>
                </ul>
                <div class="sec-title centered light">
                    <h2>
                        {{__("Visitez notre local")}}
                    </h2>
                    <div class="separator"></div>
                </div>

                <!--Map Outer-->
                <div class="map-outer">
                    <!--Map Canvas-->
                    <p class="text-center text-white"> {{ Session('config')->adresse ?? 'Goma, Centre
                        ville'}}</p>
                </div>

            </div>
        </section>
        <!--End Page Title-->

        <section class="contact-section">
            <div class="auto-container">

                <!--Title Box-->
                <div class="sec-title">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h2>{{__("contact rapide")}}</h2>
                            <div class="separator"></div>
                        </div>
                        <div class="text">
                            {{__("Vous avez des questions? N'hésitez pas à nous contacter, notre équipe technique est
                            disponible 24h/24 et 7j/7")}}
                        </div>
                    </div>
                </div>

                <div class="inner-container">
                    <div class="clearfix">

                        <!--Info Column-->
                        <div class="info-column col-md-4 col-sm-12 col-xs-12">
                            <div class="inner-column">
                                <div class="upper-box">
                                    <ul class="list-style-three">
                                        <li><span class="icon flaticon-technology-2"></span><strong>
                                            {{__("Appelez-nous:")}}
                                            </strong>{{ Session('config')->numeropv ??
                                            '+243970912428'}}</li>
                                        <li><span class="icon flaticon-envelope-1"></span><strong>
                                            {{__("Envoyez-nous un
                                                e-mail:")}}
                                            </strong><a class="text-grey"
                                                href="mailto:{{ Session('config')->email ?? 'genesiskikimba@gmail.com'}}"
                                                class="text-white">{{ Session('config')->email ??
                                                'genesiskikimba@gmail.com'}}</a></li>
                                        <li><span class="icon flaticon-time-1"></span><strong>
                                            {{__("Heures de travail:")}}
                                            </strong>
                                        {{__("Lundi - Vendredi : 8h00 à 16h00")}}
                                    </li>
                                    </ul>
                                </div>
                                <div class="lower-box">

                                    <div class="lower-inner">
                                        @if($user->images)
                                        <div class="image">
                                            <img class="img-fit h-200px"
                                                src="{{ $user->images->images ? asset('storage/'. $user->images->images) : asset('assets/img/default.png')}}"
                                                alt="{{ $user->images->images ? asset('storage/'. $user->images->images) : ''}}"
                                                class="" />
                                        </div>
                                        <h3>{{ $user->name}}</h3>
                                        <div class="designation">{{ $user->poste}}</div>
                                        <div class="emailed">{{ $user->email}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Form Column-->
                        <div class="form-column col-md-8 col-sm-12 col-xs-12">
                            <div class="inner-column">

                                <!-- Contact Form -->
                                <div class="contact-form">
                                    <!--Default Form-->
                                    <form method="post" action="#" id="contact-form">
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="text" name="username" placeholder="{{__('votre nom')}}" required>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="email" name="email" placeholder="E-Mail" required>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="text" name="phone" placeholder="{{__('Telephone')}}" required>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="text" name="subject" placeholder="{{__('Entreprise')}}" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                <textarea name="message" placeholder="{{__('Votre message')}}"></textarea>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                <button class="theme-btn submit-btn" type="submit"
                                                    name="submit-form">
                                                    {{__("Soumettre")}}
                                                    <span
                                                        class="icon flaticon-right-arrow-1"></span></button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                                <!--End Contact Form -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>
</section>

@endsection
