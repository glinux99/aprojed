@extends('layouts.app_site')

@section('title', 'APROJED | ' . $activity->title)
@section('description', Str::limit(strip_tags($activity->content), 155))
@section('og_type', 'article')
@if($activity->cover_photo_path)
@section('og_image', asset('storage/' . $activity->cover_photo_path))
@endif

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-6 text-white animated slideInDown mb-4">{{ $activity->title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('activities') }}">Activités</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Détail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Activity Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8 wow fadeInUp " data-wow-delay="0.1s">
                     <div class="position-relative mt-auto " >
                    <!-- Activity Image -->

                     @if($activity->cover_photo_path)
                                        <img class="img-fluid rounded mb-4" src="{{ asset('storage/' . $activity->cover_photo_path) }}" alt="Image de l'activité : {{ $activity->title }}" style="object-fit: cover;">
                                    @else
                                        <div style="min-height: 400px;" class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                            <i class="fa fa-image fa-3x text-muted"></i>
                                        </div>
                                    @endif
                    <!-- Activity Content -->
                    <div class="mb-4">
                        <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                            <small>{{ $activity->category->name }}</small>
                        </div>
                        <h1 class="display-6 mb-3">{{ $activity->title }}</h1>

                        <div class="article-content">
                            {!! $activity->content !!}
                        </div>

                    </div>

                    <!-- Documents -->
                    @if($activity->documents()->count()>0)
                        <div class="mt-5 p-4 bg-light rounded">
                            <h3 class="mb-4">Documents joints</h3>
                            <ul class="list-group list-group-flush">
                                @foreach($activity->documents()->get() as $document)

                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                                        <div>
                                            <i class="fa fa-paperclip text-primary me-2"></i>
                                            {{ $document->original_name }}
                                        </div>
                                        <a href="{{ asset('storage/' . $document->path) }}" class="btn btn-sm btn-outline-primary" download>
                                            Télécharger
                                            <i class="fa fa-download ms-1"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                     <div class="d-flex align-items-center justify-content-between text-muted my-4">
                            <small class="d-flex align-items-center me-3">
                                @if(isset($activity->user) && $activity->user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $activity->user->profile_photo_path) }}" class="rounded-circle me-2" alt="{{ $activity->user->name }}" style="width: 30px; height: 30px; object-fit: cover;">
                                @else
                                    <i class="fa fa-user text-primary me-2"></i>
                                @endif
                                <span>{{ $activity->user->name ?? 'Auteur inconnu' }}</span>
                            </small>
                            <small><i class="fa fa-calendar-alt text-primary me-2"></i>{{ $activity->created_at->translatedFormat('d F Y') }}</small>
                        </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Search Form -->
                    <div class="mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Rechercher...">
                            <button class="btn btn-primary px-4"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="wow fadeInUp mt-5" data-wow-delay="0.3s">
                        <h3 class="mb-4">Autres Activités</h3>
                        @foreach(App\Models\Article::where('publicate', 1)->where('id', '!=', $activity->id)->latest()->take(5)->get() as $recentActivity)
                            <div class="d-flex mb-3">
                                @if($recentActivity->cover_photo_path)
                                    <img src="{{ asset('storage/' . $recentActivity->cover_photo_path) }}" class="img-fluid flex-shrink-0" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;" alt="{{ $recentActivity->title }}">
                                @else
                                    <div class="bg-light d-flex justify-content-center align-items-center flex-shrink-0" style="width: 80px; height: 80px; border-radius: 5px;">
                                        <i class="fa fa-image fa-2x text-muted"></i>
                                    </div>
                                @endif
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{ route('activities.show', $recentActivity) }}" class="text-dark">{{ Str::limit($recentActivity->title, 40) }}</a></h6>
                                    <small class="text-muted"><i class="fa fa-calendar-alt text-primary me-1"></i>{{ $recentActivity->created_at->translatedFormat('d M Y') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Activity Detail End -->
@endsection
