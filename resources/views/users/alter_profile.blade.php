@extends( (Auth::user()->hasRole('client')) ? 'layouts.page' : 'layouts.app')
@section('content')
<section class="main-content col-md-12 col-centered mx-auto">
    <div class="aiz-main-content">
        <div class="px-15px px-lg-25px">

            <div class="aiz-titlebar text-left mt-2 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="h3">{{__("Configuration mon profile")}}</h1>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{route('profile')}}" class="btn btn-circle btn-info">
                            <span>{{__("Mon profile")}}</span>
                        </a>
                    </div>
                </div>
            </div>

            <form action="{{ route('update.profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row gutters-5">
                        <div class="card col-md-12">
                            <div class="card-header row gutters-5">
                                <div class="col text-center text-md-left">
                                    <h5 class="mb-md-0 h6">{{__("Modifier mon profile")}}</h5>
                                </div>
                                <div class="float-right d-flex">
                                    <p class="mr-2 align-self-center">{{__("Recevoir les notifications")}}</p>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" name="notificable" @if (Auth::user()->notificable) checked @endif value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Nom')}}</label>
                                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" value="{{ Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Adresse E-mail')}}</label>
                                            <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" value="{{ Auth::user()->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Numero Tel')}}</label>
                                            <input type="numero" class="form-control" name="numero" id="" aria-describedby="helpId" value="{{ Auth::user()->numero}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">{{__('Image')}}</label>
                                            <input type="file" class="form-control" name="images" id="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__("A propos de moi")}}</label>
                                            <div class="col-md-12">
                                                <textarea class="aiz-text-editor" name="description">{{ Auth::user()->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="Second group">
                                <button type="submit" name="button" value="publish" class="btn btn-success action-btn">__("Enregistrer")</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- .aiz-main-content -->
</section>
@endsection
