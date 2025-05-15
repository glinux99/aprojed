@extends('layouts.page')
@section('titre')
__("Activité du groupe")
@endsection
@section('content')
<section class="">
    <!--Page Title-->
    <section class="page-title" style="background-image:url(assets/ui/images/background/6.jpg)">
        <div class="auto-container">
            <ul class="page-breadcrumb">
                <li><a href="/">{{__("Acceuil")}}</a></li>
                <li>
                    {{__("activité")}}
                </li>
            </ul>
            <h1>{{ $news->count()}} {{ $news->count() ? __("activité"): __("activités")}}</h1>
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
                    <!--News Block Two-->
                    <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="blog-classic m-0 p-0 row clearfix col-12">
                            @for($i = 0; $i < $news->count(); $i++)
                                <div class="news-block-two col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="{{ route('news.show',[$news[$i]->actualite_id])}}">
                                                {{-- {{ asset('storage/'.$news[0]->images)}} --}}
                                                <img src="{{ asset('storage/'.$news[$i]->images)}}"
                                                    data-src="{{ asset('storage/'.$news[$i]->images)}}"
                                                    onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/placeholder.jpg';"
                                                    class="img-fit h-200px " alt="" /></a>
                                        </div>
                                         <div class="lower-content">
                                    <h3>{{ $news[$i]->title}}</h3>
                                    <div class="title">{{ $news[$i]->categorie}}</div>
                                    <div class="post-date">
                                        <p>Publie  {{\Carbon\Carbon::parse($news[$i]->updated_at)->locale('fr_FR')->isoFormat('LLLL')}}</p>
                                    </div>
                                    <div class="text h-100px text-truncate-2">
                                        <p class="text-muted ">
                                            {!! $news[$i]->description!!}
                                        </p>
                                    </div>
                                     <a href="{{ route('news.show',[$news[0]->actualite_id])}}"
                                                class="read-more">
                                                {{__("En
                                                savoir plus")}} <span
                                                    class="icon flaticon-arrow-pointing-to-right"></span></a>
                                </div>

                                    </div>
                                </div>
                                @endfor
                                <!--Styled Pagination-->
                                <div class="col-12">
                                    <ul class="styled-pagination text-right">
                                        <li class="prev">
                                            <a href="#"><span class="fa fa-angle-left"></span></a>
                                        </li>
                                        <li><a href="#" class="active">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li class="next">
                                            <a href="#"><span class="fa fa-angle-right"></span></a>
                                        </li>
                                    </ul>
                                </div>
                                <!--End Styled Pagination-->
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
                                occ
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
                                @foreach ($news as $key =>$actualite)
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
        {{-- __("Aucune actualite a affiche") --}}
    </div>
    @endif
</section>

@endsection
