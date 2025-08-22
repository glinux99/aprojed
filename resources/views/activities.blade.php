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

@endphp

<!-- Activities Start -->
<div class="container-xxl bg-light py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Activities list -->
            <div class="col-lg-8">
                <div class="row g-4">
                    @foreach($activities as $index => $activity)
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                            <div class="causes-item d-flex flex-column bg-white border-top border-5 shadow-lg border-primary rounded-top overflow-hidden h-100">
                                <div class="text-center p-4 pt-0">
                                      <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                        <small>{{ $activity['category']['name'] }}</small>
                                    </div></div>
                                <div class="position-relative mt-auto" style="min-height: 250px;">
                                    @if($activity->cover_photo_path)
                                        <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $activity->cover_photo_path) }}" alt="Image de l'activité : {{ $activity->title }}" style="object-fit: cover;">
                                    @else
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                            <i class="fa fa-image fa-3x text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="causes-overlay">
                                        <a class="btn btn-outline-primary" href="{{ route('activities.show', $activity) }}">
                                            Lire Plus
                                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                                <i class="fa fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center p-4 pt-2">

                                    <h5 class="mb-3">{{ $activity->title }}</h5>
                                    <p>{{ Str::limit(strip_tags($activity->content), 120) }}</p>

                                    @if($activity->documents)
                                        <div class="mt-2 mb-3 text-start">
                                            <h6 class="text-muted small text-uppercase">Documents joints</h6>
                                            <ul class="list-unstyled mb-0">
                                                @foreach($activity->documents->take(2) as $document)
                                                <li>
                                                    <a href="{{ asset('storage/' . $document->path) }}" class="text-sm text-decoration-none" download>
                                                        <i class="fa fa-paperclip text-primary me-1"></i>
                                                        {{ Str::limit($document->original_name, 25) }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="d-flex justify-content-between text-muted">
                                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>{{ $activity->user->name }}</small>
                                        <small><i class="fa fa-calendar-alt text-primary me-2"></i>{{ $activity->created_at->translatedFormat('d M Y') }}</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Start -->
                <div class="row mt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12">
                        {{ $activities->links() }}
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
                            <li class="border-bottom border-5 py-2 bg-white border-primary rounded-bottom overflow-hidden d-flex justify-content-between align-items-center px-0 ">
                                <a href="#" class="text-dark ">{{ $category->name }}</a>
                                <span class="badge bg-primary rounded-pill">{{ $category->articles_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Recent Activities -->
                <div class="wow fadeInUp mt-5" data-wow-delay="0.3s">
                    <h3 class="mb-4">Activités Récentes</h3>
                    @foreach($activities->take(5) as $activity)
                        <div class="d-flex mb-3">
                            @if($activity->cover_photo_path)
                                <img src="{{ asset('storage/' . $activity->cover_photo_path) }}" class="img-fluid flex-shrink-0" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;" alt="{{ $activity->title }}">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center flex-shrink-0" style="width: 80px; height: 80px; border-radius: 5px;">
                                    <i class="fa fa-image fa-2x text-muted"></i>
                                </div>
                            @endif
                            <div class="ms-3">
                                <h6 class="mb-1"><a href="{{ route('activities.show', $activity) }}" class="text-dark">{{ Str::limit($activity->title, 40) }}</a></h6>
                                <small class="text-muted"><i class="fa fa-calendar-alt text-primary me-1"></i>{{ $activity->created_at->translatedFormat('d M Y') }}</small>
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
