 <!-- Footer Start -->
  <div class="container py-4">
    <hr>
            <div class="text-center">
                <h5 class="text-lightd mb-4">Nos Partenaires</h5>
                <div class="d-flex justify-content-center align-items-center flex-wrap bg-white p-3 rounded">
                    @if(isset($partners) && $partners->count() > 0)
                        @foreach($partners as $partner)
                            <a href="{{ $partner->url ?? '#' }}" target="_blank" rel="noopener noreferrer" class="mx-3 my-2" title="{{ $partner->name }}"><img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" style="height: 80px; max-width: 170px; object-fit: contain;"></a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
 <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">APRO<span class="text-white">JED</span></h1>
                    <p>APROJED R.D.Congo est une organisation non gouvernementale dédiée à la mise en œuvre de projets de développement durable en République Démocratique du Congo.</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href="{{ $siteSettings->twitter_url ?? 'Goma'}}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square me-1" href="{{ $siteSettings->facebook_url ?? 'Goma'}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href="{{ $siteSettings->youtube_url ?? 'Goma'}}"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square me-0" href="{{ $siteSettings->linkedin_url ?? 'Goma'}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Adresse</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>{{ $siteSettings->address ?? 'Goma'}}</p>
                    <p><i class="fa fa-phone-alt me-3"></i>{{ $siteSettings->phone_number ?? '+243970912428'}}</p>
                    <p><i class="fa fa-envelope me-3"></i>{{ $siteSettings->email ?? 'info@aprojed.com'}}</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Lien rapide</h5>
                    <a class="btn btn-link" href="/">Accueil</a>
                    <a class="btn btn-link" href="/about">A propos</a>
                    <a class="btn btn-link" href="/activities">Activités</a>
                    <a class="btn btn-link" href="/contact">contact</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Laisse nous vous envoyer nos dernières nouvelles</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Votre Email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy;2025 <a href="/login">
                            Aprojed</a> All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="/">Linux99</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
