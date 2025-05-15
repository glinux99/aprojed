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
                <li><a href="index-2.html">
                    {{__("Acceuil")}}</a></li>
                <li>
                    {{__("activité")}}
                </li>
            </ul>
            <h1>
                {{__("activité")}}
            </h1>
        </div>
    </section>
    <!--End Page Title-->
    @if ($news->count())
    <!--Blog Page Section-->
    <section class="">
        <div class="sidebar-page-container">
            <div class="auto-container">
                @if ($news->count())
                <div class="">
                    <!--Content Side-->
                    <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <!--Blog Single-->
                        <div class="blog-single">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{ asset('storage/'.$currentNews->images)}}" class="d-block">
                                        <img class="img-fit " src="{{ asset('storage/'.$currentNews->images)}}"
                                            height="400" data-src="{{ asset('storage/'.$currentNews->images)}}" alt=""
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';">
                                    </a>
                                </div>
                                <div class="lower-content">
                                    <h3>{{ $currentNews->title}}</h3>
                                    <div class="title">{{ $currentNews->categorie}}</div>
                                    <div class="post-date">
                                        <p> {{__("Publié")}}

                                             {{\Carbon\Carbon::parse($currentNews->updated_at)->locale('fr_FR')->isoFormat('LLLL')}}
                                        </p>
                                    </div>
                                    <div class="text">
                                        <p class="fw-600 fs-20 p-0 m-0 text-muted">
                                            {!! $currentNews->description!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group-title">
                            <h2>
                                {{__("A propos de l'auteur")}}
                            </h2>
                        </div>

                        <!--Author Box-->
                        <div class="author-box">
                            <div class="author-comment">
                                <div class="inner">
                                    <div class="image">
                                        <img src="{{ $currentNews->user->i }}"
                                            onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                            alt="" />
                                    </div>
                                    <h3> {{ $currentNews->user->name }} </h3>
                                    <div class="text">
                                        {{ $currentNews->user->description }}
                                    </div>
                                    <ul class="social-icon-three">
                                        <li>
                                            <a href="#"><span class="fa fa-facebook"></span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="fa fa-twitter"></span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="fa fa-google-plus"></span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="fa fa-youtube"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--Comments Area-->
                        {{-- <div class="comments-area">
                            <div class="group-title">
                                <h2>Read Comments</h2>
                                <div class="separator"></div>
                            </div>
                            <!--Comment Box-->
                            <div class="comment-box">
                                <div class="comment">
                                    <div class="author-thumb">
                                        <img src="images/resource/author-18.jpg" alt="" />
                                    </div>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            Steven Rich – Sep 17, 2016:
                                        </div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star light"></span>
                                        </div>
                                        <div class="text">
                                            How all this mistaken idea of denouncing pleasure and
                                            praising pain was born and I will give you a complete
                                            account of the system, and expound the actual
                                            teachings.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Comment Box-->
                            <div class="comment-box reply-comment">
                                <div class="comment">
                                    <div class="author-thumb">
                                        <img src="images/resource/author-19.jpg" alt="" />
                                    </div>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            William Cobus – Aug 21, 2016:
                                        </div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                        </div>
                                        <div class="text">
                                            There anyone who loves or pursues or desires to obtain
                                            pain itself, because it is pain sed, because
                                            occasionally circumstances occur some great pleasure.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <div class="comment-form">
                            <div class="group-title">
                                <h2>Add Your Comments</h2>
                                <div class="separator"></div>
                            </div>
                            <div class="rating-box">
                                <div class="text">Your Rating:</div>
                                <div class="rating">
                                    <a href="#"><span class="fa fa-star"></span></a>
                                </div>
                                <div class="rating">
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </a>
                                </div>
                                <div class="rating">
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </a>
                                </div>
                                <div class="rating">
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </a>
                                </div>
                                <div class="rating">
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </a>
                                </div>
                            </div>
                            <form method="post" action="https://www.ugpeotechnique.com/contact.html">
                                <div class="row clearfix">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label>First Name*</label>
                                        <input type="text" name="username" placeholder="" required />
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                        <label>Last Name*</label>
                                        <input type="text" name="username" placeholder="" required />
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Email*</label>
                                        <input type="email" name="email" placeholder="" required />
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <label>Your Comments*</label>
                                        <textarea name="message" placeholder=""></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">
                                            Submit Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>


                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar default-sidebar with-border">
                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="#">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="recherche..."
                                        required />
                                    <button type="submit">
                                        <span class="icon fa fa-search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{--
                        <!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title style-two">
                                <h2>Publications recentes</h2>
                            </div>
                            <ul class="blog-cat-two">

                                @foreach ($news as $actualite )
                                <li>
                                    <div class="media text-inherit">
                                        <a href="{{ route('news.show',[$actualite->actualite_id])}}">
                                            <div class="media-body">
                                                <p class="mb-1 text-truncate-2">
                                                    {{$actualite->title}}
                                                </p>
                                                <small class="text-muted">
                                                    {{$actualite->created_at}}
                                                </small>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div> --}}

                        {{--
                        <!--Recent Comments-->
                        <div class="sidebar-widget recent-comments">
                            <div class="sidebar-title">
                                <h2>Recent Comments</h2>
                            </div>

                            <div class="comment-block">
                                <div class="inner">
                                    <div class="date">August 17, 2017</div>
                                    <div class="content">
                                        <div class="image">
                                            <img src="images/resource/author-15.jpg" alt="" />
                                        </div>
                                        <h3><a href="#">Mark Mitchael</a></h3>
                                        <div class="text">It is long established fact</div>
                                        <a href="#" class="reply-btn"><span class="fa fa-mail-forward"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-block">
                                <div class="inner">
                                    <div class="date">July 08, 2017</div>
                                    <div class="content">
                                        <div class="image">
                                            <img src="images/resource/author-16.jpg" alt="" />
                                        </div>
                                        <h3><a href="#">Steve Bowerman</a></h3>
                                        <div class="text">When looking at its layout</div>
                                        <a href="#" class="reply-btn"><span class="fa fa-mail-forward"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title style-two">
                                <h2>Publications recentes</h2>
                            </div>
                            @foreach ($news as $key=>$actualite)
                            <article class="post">
                                <figure class="post-thumb">
                                    <img src="{{ asset('storage/'.$news[$key]->images)}} "
                                        onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                        class="img-fit h-70px" alt="" /><a class="overlay"
                                        href="{{ route('news.show',[$actualite->actualite_id])}}"></a>
                                </figure>
                                <div class="text">
                                    <a href="{{ route('news.show',[$actualite->actualite_id])}}">
                                        <p class="mb-1 text-truncate-2">
                                            {{$actualite->title}}
                                        </p>
                                    </a>
                                </div>
                                <div class="post-info">{{$actualite->created_at}}</div>
                            </article>
                            @endforeach

                        </div>

                        <!-- Popular Tags -->
                        <div class="sidebar-widget popular-tags">
                            <div class="sidebar-title style-two">
                                <h2>Tags</h2>
                            </div>
                            <a href="#">Ecologie</a>
                            <a href="#">Securite</a>
                            <a href="#">Femme</a>
                            <a href="#">Sociale</a>
                            <a href="#">Ong</a>

                        </div>
                    </aside>
                </div>
            </div>
            @endif


        </div>
        </div>

    </section>
    <!--End Blog Section Four-->
    @else
    <div class="d-flex justify-content-center">
        __("Aucune  activité à afficher")
    </div>
    @endif
</section>

@endsection
