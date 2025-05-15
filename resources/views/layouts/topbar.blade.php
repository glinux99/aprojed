<!-- Main Header / Header Style Four-->
<header class="main-header">
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-outer clearfix">
                <div class="top-left">
                    <ul class="links clearfix">
                        <li>
                            <a href="tel:{{
                                Session('config')->numeropv ??
                                '+243 970 91 2428'}}"><span class="icon fa fa-phone"></span> {{
                                Session('config')->numeropv ??
                                '+243 970 91 2428'}}</a>
                        </li>
                        <li>
                            <a href="mailto:{{ Session('config')->email ?? 'genesiskikimba@gmail.com'}}"><span
                                    class="icon fa fa-envelope-o"></span>{{ Session('config')->email ??
                                'genesiskikiba@gmail.com'}} </a>
                        </li>
                        <li>
                            <a href="#"><span class="icon flaticon-placeholder-2"></span>{{__("Localisation")}}</a>
                        </li>
                    </ul>
                </div>
                <div class="top-right clearfix">
                    <ul class="clearfix">


                                   <li class="language dropdown">
                            <a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true" href="{{ route('locale.change', 'fr')}}">
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
                                        &nbsp;<span
                                    class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu2">
                                <li><a href="{{ route('locale.change', 'fr')}}">
                              <span class="flag-img"><img
                                        src="{{asset('assets/img/flags/fr.png')}}" alt="" /></span>  {{__("Français")}}
                                </a></li>
                                <li><a href="{{ route('locale.change', 'en')}}">
                                <span class="flag-img"><img
                                        src="{{asset('assets/img/flags/en.png')}}" alt="" /></span>{{__("Anglais")}}
                                </a></li>
                                 <li><a href="{{ route('locale.change', 'sw')}}">
                              <span class="flag-img"><img
                                        src="{{asset('assets/img/flags/cd.png')}}" alt="" /></span>  {{__("Swahili")}}
                                </a></li>

                            </ul>
                        </li>
                    </ul>
                    <ul class="social-icon-one">
                        <li>
                            <a href="{{ '//'.url (Session('config')->facebook ??
                                '//https//www.facebook.com')}}"><span class="fa fa-facebook"></span></a>
                        </li>
                        <li>
                            <a href="{{ '//'.url (Session('config')->twitter ??
                                '//https//www.facebook.com')}}"><span class="fa fa-twitter"></span></a>
                        </li>
                        <li>
                            <a href="{{ '//'.url (Session('config')->instagramme ??
                                '//https//www.instagram.com')}}"><span class="fa fa-instagram"></span></a>
                        </li>
                        <li>
                            <a href="{{ '//'.url (Session('config')->linkdin ??
                                '//https//www.linkdin.com')}}"><span class="fa fa-linkedin"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!-- Main Box -->
    <div class="main-box" style="background-color: #04340b">
        <div class="auto-container">
            <div class="outer-container clearfix">
                <!--Logo Box-->
                <div class="logo-box ">
                    <div class="logo d-flex">
                        <a href="/">
                            <img src="{{ asset('assets/ui/images/logo_bgg.png')}}" alt="" class=" h-60px h-md-60px"
                                height="80" />

                            {{--  <div class="d-none d-lg-inline ">
                                <h2 class="title d-inline text-white"> {{ Config('app.name')}}</h2>
                            </div>  --}}
                        </a>
                    </div>
                </div>

                <!--Nav Outer-->
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="current dropdown">
                                    <a href="/">
                                    {{__("Acceuil") }}</a>

                                </li>
                                <li><a href="{{ route('apropos')}}">
                                {{__("A propos")}}
                                </a></li>
                                {{-- <li>
                                    <a href="#"> {{ __("Missions")}} </a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('news.all')}}">
                                        {{__('Activités')}}

                                    </a>

                                </li>
                                <li><a href="{{ route('contact')}}">
                                {{__("Contact")}}
                                </a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!--Outer Box-->
                    <div class="outer-box">
                        <a href="/contact" class="theme-btn quote-btn" data-target="#schedule-box">
{{__("Faire un don")}}

                            <span class="icon"></span></a>
                    </div>
                </div>
                <!--Nav Outer End-->
            </div>
        </div>
    </div>

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-container clearfix">
                <!--Logo Box-->
                <div class="logo-box pull-left">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('assets/ui/images/logo_bgw.png')}}" class=" h-60px h-md-60px"
                                height="80" /></a>
                    </div>
                </div>

                <!--Nav Outer-->
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li>
                                    <a href="/">
                                        {{__("Acceuil")}}
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('apropos')}}">
                                        {{__("A propos")}}
                                    </a>

                                </li>
                                {{-- <li>
                                    <a href="#">Missions</a>

                                </li> --}}
                                <li>
                                    <a href="{{ route('news.all')}}">
                                        {{__("Actualité")}}
                                    </a>

                                </li>

                                <li>
                                    <a href="{{ route('contact')}}">
                                        {{__("Contact")}}
                                    </a>

                                </li>
                                {{-- <li><a href="contact.html">Contact</a></li> --}}
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                </div>
                <!--Nav Outer End-->
            </div>
        </div>
    </div>
    <!--End Sticky Header-->
</header>
<!--End Main Header -->
