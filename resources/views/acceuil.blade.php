@extends('layouts.page')
@section('titre')
__("Acceuil ")
@endsection
@section('content')
<!--Main Slider-->
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_three_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_three" data-version="5.4.1">
            <ul>
                <li data-description="Slide Description" data-easein="default" data-easeout="default"
                    data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1=""
                    data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                    data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                    data-slotamount="default" data-thumb="images/main-slider/image-10.jpg" data-title="Slide Title"
                    data-transition="parallaxvertical">
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                        data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                        src="{{ asset('assets/ui/images/mainSlider/slide1.jpg')}}" />

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['650','700','650','450']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['-40','-80','-90','-80']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                        style="z-index: 7; white-space: nowrap">
                        <h2 class="style-two text-warning">
                            {{__("Education et formation")}} <br />

                        </h2>
                    </div>

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['650','700','650','450']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['90','50','40','40']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                        style="z-index: 7; white-space: nowrap">
                        <div class="text style-three text-white">
                           {{__("Identifier, soutenir et")}}  <br />
                            {{__("éduquer les enfants vulnérables.")}}
                        </div>
                    </div>

                    <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['560','700','700','450']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['180','130','130','140']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <div class="btns-box">
                            <a href="#" class="theme-btn btn-style-two">{{__("En savoir plus")}}</a><a
                                href="/" class="theme-btn btn-style-three">{{__("Contactez-nous")}}</a>
                        </div>
                    </div>
                </li>

                <li data-description="Slide Description" data-easein="default" data-easeout="default"
                    data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1=""
                    data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                    data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                    data-slotamount="default" data-thumb="images/main-slider/image-11.jpg" data-title="Slide Title"
                    data-transition="parallaxvertical">
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                        data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                        src="{{ asset('assets/ui/images/mainSlider/slide2.jpg')}}" />

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['550','700','650','460']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['-40','-80','-90','-80']" data-x="['right','right','right','right']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                        style="z-index: 7; white-space: nowrap">
                        <h2 class="alternate">
                           {{__("Information et sensibilisation")}}
                        </h2>
                    </div>

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['550','700','650','460']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['90','50','40','40']" data-x="['right','right','right','right']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                        style="z-index: 7; white-space: nowrap">
                        <div class="text alternate">
                           {{__("Vulgariser l’auto-développement auprès de couches sociales")}} <br />
                          {{__(" Sensibiliser la population pour la prise en charge des personnes les plus vulnérables")}}
                            .
                        </div>
                    </div>

                    <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['550','700','650','460']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['180','130','130','140']" data-x="['right','right','right','right']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                        style="z-index: 7; white-space: nowrap">
                        <div class="btns-box">
                            <a href="#" class="theme-btn btn-style-two">{{ __("En savoir plus")}}</a><a href="/"
                                class="theme-btn btn-style-three">{{ __("Contactez-nous")}}</a>
                        </div>
                    </div>
                </li>

                <li data-description="Slide Description" data-easein="default" data-easeout="default"
                    data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1=""
                    data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                    data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                    data-slotamount="default" data-thumb="images/main-slider/image-12.jpg" data-title="Slide Title"
                    data-transition="parallaxvertical">
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                        data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                        src="{{ asset('assets/ui/images/mainSlider/slide3.jpg')}}" />

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['620','700','650','460']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['-40','-80','-90','-80']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                        style="z-index: 7; white-space: nowrap">
                        <h2 class="style-two text-primary" style="color: rgb(255, 60, 0)!important">
                           {{ __("Réduction de l'extreme pauvrété et de la faim")}}
                        </h2>
                    </div>

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['650','700','650','460']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['90','50','40','40']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                        style="z-index: 7; white-space: nowrap">
                        <div class="text style-three text-white">
                          {{ __("  Veiller à ce que les filles et garçons aient accès à l’éducation et promouvoir des possibilités d’apprentissage de qualité des jeunes dans des conditions équitables.")}}
                        </div>
                    </div>

                    <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['560','700','700','550']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['180','130','130','140']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <div class="btns-box">
                            <a href="#" class="theme-btn btn-style-two">{{ __("En savoir plus")}}</a><a href="contact.html"
                                class="theme-btn btn-style-three">{{ __("Contactez-nous")}}</a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</section>
<!--End Main Slider-->
<!--Services Section-->
<section class="services-section" style="background-image:url(assets/ui/images/background/1.jpg)">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row-local clearfix">
                <!--Services Block-->
                <div class="services-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('assets/ui/images/mainSlider/slide8.jpg')}}" altt="" />
                        </div>
                        <div class="lower-content">
                            <div class="icon-box">
                                <span class="icon flaticon-education"></span>
                            </div>
                            <h3>{{ __("Conditions de vie améliorées")}}</h3>
                        </div>
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="text">
                                   {{ __(" Nous pouvons faire un front commun pour aider les poupulations")}}
                                </div>
                                <a href="/" class="know-more">{{__("Participer")}}
                                    <span class="icon flaticon-right-arrow-1"></span></a>
                                <div class="overlay-lower-inner">
                                    {{-- <div class="overlay-icon flaticon-alarm-clock"></div> --}}
                                    <h4>
                                        <a href="about.html">{{__("Amelioration des conditions de vie")}}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('assets/ui/images/aprojed/566A2198.jpg')}}" altt="" />
                        </div>
                        <div class="lower-content">
                            <div class="icon-box">
                                <span class="icon flaticon-education"></span>
                            </div>
                            <h3>{{ __("Encadrement de la jeunesse")}}</h3>
                        </div>
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="text">
                                    {{__("Tout les enfants ont droit l'éducation et à une vie meilleure.")}}
                                </div>
                                <a href="/" class="know-more">{{__("Participer")}}
                                    <span class="icon flaticon-right-arrow-1"></span></a>
                                <div class="overlay-lower-inner">
                                    {{-- <div class="overlay-icon flaticon-education"></div> --}}
                                    <h4>
                                        <a href="/">{{__("Encadrement de la jeunesse")}}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('assets/ui/images/aprojed/566A9559.jpg')}}" altt="" />
                        </div>
                        <div class="lower-content">
                            <div class="icon-box">
                                <span class="icon flaticon-time"></span>
                            </div>
                            <h3>{{__("Promouvoir l'égalité")}}</h3>
                        </div>
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="text">
                                   {{__(" Promouvoir l'égalité et la promation de femme peut aider au développement
                                    d'une communauté")}}
                                </div>
                                <a href="/" class="know-more">{{__("Participer")}}
                                    <span class="icon flaticon-right-arrow-1"></span></a>
                                <div class="overlay-lower-inner">
                                    {{-- <div class="overlay-icon flaticon-time"></div> --}}
                                    <h4>
                                        <a href="/">{{__("Promouvoir l'égalité")}}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block col-md-3 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('assets/ui/images/aprojed/566A9335.jpg')}}" altt="" />
                        </div>
                        <div class="lower-content">
                            <div class="icon-box">
                                <span class="icon flaticon-engineer"></span>
                            </div>
                            <h3>
                                {{__("Développement durable")}}
                            </h3>
                        </div>
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="text">
                                    {{__("Inciter la population de se developper toutes seules en leurs offrant des opportunités")}}
                                </div>
                                <a href="/" class="know-more">{{__("Participer")}}
                                    <span class="icon flaticon-right-arrow-1"></span></a>
                                <div class="overlay-lower-inner">
                                    {{-- <div class="overlay-icon flaticon-engineer"></div> --}}
                                    <h4>
                                        <a href="/">{{__("Développement durable des villages")}}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services Section-->
<!--Start Choose area-->
<section class="choose-area" style="background-image: url(assets/ui/images/mainSlider/slide5.jpg);">
    <div class="container">
        <div class="choose-title">
            <h1>{{__("Nos objectifs")}}</h1>
            <p>
                {{__("Actions et projets pour un développement durable")}}
            </p>
        </div>
        <div class="row">
            <!--Start Single Choose Item-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-choose-item text-center wow fadeInUp bg2" data-wow-delay="0ms"
                    data-wow-duration="1200ms">
                    <div class="iocn-holder">
                        <img src="{{ asset('assets/ui/images/icon/choose-1.png')}}" altt="Icon" />
                    </div>
                    <div class="text-holder">
                        <h3>{{__("Développement durable")}}</h3>
                        <p>
                            {{__("Inciter la population des villages riverains de parc à faire régulièrement recours
                            aux énergies renouvelables, promouvoir une croissance économique soutenue, partagée
                            et durable")}}
                        </p>
                    </div>
                </div>
            </div>
            <!--End Single Choose Item-->
            <!--Start Single Choose Item-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-choose-item bg1 text-center wow fadeInDown" data-wow-delay="200ms"
                    data-wow-duration="1200ms" style="box-shadow: 0 5px 4px #BCE600A8;margin-top: -30px;">
                    <div class="iocn-holder">
                        <img src="{{ asset('assets/ui/images/icon/choose-2.png')}}" altt="Icon" />
                    </div>
                    <div class="text-holder">
                        <h3>
                            {{__("Faim et pauvrété")}}
                        </h3>
                        <p>
                            {{__("Réduction de l'extreme pauvréte et de la faim dans les villages environnants.")}}
                        </p>
                    </div>
                </div>
            </div>
            <!--End Single Choose Item-->
            <!--Start Single Choose Item-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="single-choose-item bg2 text-center wow fadeInUp" data-wow-delay="400ms"
                    data-wow-duration="1200ms">
                    <div class="iocn-holder">
                        <img src="{{ asset('assets/ui/images/icon/choose-3.png')}}" altt="Icon" />
                    </div>
                    <div class="text-holder">
                        <h3>
                            {{__("Education")}}
                        </h3>
                        <p>
                           {{__(" Encadrement(Education et formation ) de la jeunesse
                            pour qu'ils puissent avoir des compétences de vie courante ainsi lutter contre
                            l'insécurité")}}
                        </p>
                    </div>
                </div>
            </div>
            <!--End Single Choose Item-->
        </div>
    </div>
</section>
<!--End Choose area-->

<!--Call To Action Section Two-->
<section class="call-to-action-section-two" style="background-image: url(images/background/6.jpg)">
    <div class="auto-container">
        <h2>
           {{__(" Une association impliquée dans le développement, l'éducation et la formation des populations")}}
            .
        </h2>
        <div class="text">
            {{__("Nous sommes une association intégrée composée d'un groupe de volontaires agiles et expérimentés
            qualifiés dans différents domaines de travail pour former les jeunes, la promotion de l'égalité et
            lutter contre sécurité des populations.")}}
        </div>
        <a href="#" class="theme-btn btn-style-one">{{__("Rencontrez notre équipe d'experts")}}
            <span class="icon flaticon-arrow-pointing-to-right"></span></a>
    </div>
</section>


<!--Quote Section-->
<section class="quote-section" style="background-image: url(assets/ui/images/background/7.jpg)">
    <div class="auto-container">
        <div class="quote-box">
            <div class="inner-box">
                <div class="sec-title light">
                    <h2>
                        {{__("Envoyez nous un message")}}
                    </h2>
                    <div class="separator centered"></div>
                </div>

                <!-- Quote Form -->
                <div class="quote-form">
                    <!--Shipping Form-->
                    <form method="post" action="/">
                        <div class="row clearfix">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <select class="custom-select-box">
                                    <option>
                                        {{__("Selectionner le type de message")}}
                                    </option>
                                    <option>
                                        {{__("Services One")}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="text" placeholder="Telephone" required />
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="text" placeholder="Adresse email" required />
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form">
                                   {{__(" Envoyer maintenant")}}
                                    <span class="icon flaticon-arrow-pointing-to-right"></span>
                                </button>
                                <div class="text">
                                    {{__("Nous sommes disponibles 24/7.")}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Quote Section-->

<!--Appointment Form-->
<div class="modal fade" id="schedule-box" tabindex="-1" role="dialog">
    <div class="modal-dialog popup-container container" role="document">
        <div class="modal-content">

            <div class="">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times text-white"></i>
                </button>

                <div class="modal-body">
                    <p class="mt-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">{{__('Description d\'une categorie')}}</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                    placeholder="{{__('Description d\'une categorie')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">{{__('Image Descriptive')}}</label>
                                <input type="file" class="form-control" name="images" required>
                            </div>
                        </div>
                    </div>
                    </p>
                    <button type="button" class="btn btn-link mt-2" data-dismiss="modal">{{__("Annuler")}}</button>
                    <button type="submit" class="btn btn-primary mt-2 comfirm-link">{{__("Sauvegarder")}}</button>
                </div>
            </div>
        </div>
    </div>
    <a href="/" class="backhome">{{__("Retourner sur la page d'acceuil")}}
        <span class="icon flaticon-arrow-pointing-to-right"></span></a>
</div>
<!-- End of #schedule-box -->


@if($news->count())
<!--News Section Three-->
<section class="news-section-three">
    <div class="auto-container">
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <h2>
                        {{__("Dérnières nouvelles de nos activités")}}
                    </h2>
                    <div class="separator"></div>
                </div>
                <div class="pull-right">
                    <a href="/actualite" class="theme-btn btn-style-one">
                    {{__("Plus d' activité")}}</a>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            @for($i = 0; $i < $news->count(); $i++)
                <div class="news-block-two col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{ route('news.show',[$news[$i]->actualite_id])}}">
                                {{-- {{ asset('storage/'.$news[0]->images)}} --}}
                                <img src="{{ asset('storage/'.$news[$i]->images)}}"
                                    data-src="{{ asset('storage/'.$news[$i]->images)}}"
                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                    class="img-fit h-200px" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <h3><a href="/">{{ $news[$i]->title}}</a></h3>
                            <div class="title">{{ $news[$i]->categorie}}</div>
                            <div class="post-date">
                                  <p> {{__("Publié")}} {{\Carbon\Carbon::parse($news[$i]->updated_at)->locale('fr_FR')->isoFormat('LLLL')}}</p>
                            </div>

                            {{-- <p class="fw-600 fs-13 text-truncate-2 h-25px p-0 m-0 text-muted">
                            <div class="text-truncate-2 h-70px">
                                {!! $news[0]->description!!}

                            </div>
                            </p> --}}


                            <div class="text">
                                <div class="text-truncate-2 h-60px">
                                    {!! $news[0]->description !!}

                                </div>
                            </div>
                            <a href="{{ route('news.show',[$news[0]->actualite_id])}}" class="read-more">
                                {{__("En savoir plus")}} <span class="icon flaticon-arrow-pointing-to-right"></span></a>
                        </div>
                    </div>
                </div>
                @endfor
        </div>
    </div>
</section>
<!--End News Section Three-->

@endif
<!--Clients Section Two-->
<section class="clients-section-two">
    <div class="auto-container">
        <h2>
           {{__(" Nous travaillons avec nos partenaires pour fournir à la perfection nos projets,")}}
            <span class="theme_color">
                {{__("rejoignez notre partenariat")}}
            </span>
        </h2>
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel-two owl-carousel owl-theme">
                <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/logo-sosenfants.gif')}}" class="h-200px" alt="" /></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/caritas.png')}}" class="h-200px" alt="" /></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/caritas2.png')}}" class="h-200px" alt="" /></a>
                    </figure>
                </li>
                {{--  <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/13.png')}}" alt="" /></a>
                    </figure>
                </li>  --}}
                {{--  <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/14.png')}}" alt="" /></a>
                    </figure>
                </li>  --}}
                {{--  <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/10.png')}}" alt="" /></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/11.png')}}" alt="" /></a>
                    </figure>
                </li>  --}}
                {{--  <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/12.png')}}" alt="" /></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/13.png')}}" alt="" /></a>
                    </figure>
                </li>  --}}
                {{--  <li class="slide-item">
                    <figure class="image-box">
                        <a href="#"><img src="{{ asset('assets/ui/images/clients/14.png')}}" alt="" /></a>
                    </figure>
                </li>  --}}
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section Two-->

<!--Appointment Form-->
<div class="modal fade" id="schedule-box" tabindex="-1" role="dialog">
    <div class="modal-dialog popup-container container" role="document">
        <div class="modal-content">
            <div class="appoinment_form_wrapper clear_fix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                <div class="get-quote-form" style="background-image: url(images/background/13.jpg)">
                    <div class="inner-box">
                        <!--Sec Title-->
                        <div class="sec-title">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h2>Get a Quote</h2>
                                    <div class="separator centered"></div>
                                </div>
                                <div class="pull-left">
                                    <div class="text">
                                        Get a free quote for your industrial or engineering
                                        business solutions, We are here 24/7.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quote Form / Style Two-->
                        <div class="quote-form style-two">
                            <!--Shipping Form-->
                            <form method="post" action="https://www.ugpeotechnique.com/contact.html">
                                <div class="row clearfix">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="text" placeholder="Your Name" required />
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="text" placeholder="Company Name" required />
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="text" placeholder="Phone" required />
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <select class="custom-select-box">
                                            <option>Select Needed Service</option>
                                            <option>Services One</option>
                                            <option>Services Two</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Your Message..."></textarea>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">
                                            Send Now
                                            <span class="icon flaticon-arrow-pointing-to-right"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index-2.html" class="backhome">{{__("Retourner sur la page d'acceuil")}}
        <span class="icon flaticon-arrow-pointing-to-right"></span></a>
</div>
<!-- End of #schedule-box -->
@endsection
