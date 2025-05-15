@extends('layouts.page')
@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center my-5">
        <div class="col-md-5">
            <div class="card pt-2 px-5 form-contact shadow rounded-custom">

                <a href="/" class="mb-4 d-block d-flex justify-content-center">
                    <img src="{{ asset('assets/img/logo.png')}}" alt="logo" class="m-0 p-0 img-fluid rounded-custom shadow logo-white" style="width: 5rem;">
                </a>
                <h3 class="text-center text-primary">{{__('Creer un compte')}}</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name" class="mb-1">{{__('Noms') }}<span class="text-danger">*</span></label>
                            <div class="mb-3 pinput_container">
                                <input id="name" type="text" class="form-control m-0 p-0 @error('name') is-invalid @enderror" name="name" autofocus>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label for="email" class="mb-1">{{__('Email')}} <span class="text-danger">*</span></label>
                            <div class="pinput_container mb-3">
                                <input id="email" type="email" class="form-control  m-0 p-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="email" class="mb-1">
                                __('Numero Tel') <span class="text-danger">*</span></label>
                            <div class="pinput_container mb-3">
                                <input type="number" class="form-control m-0 p-0" name="numero" placeholder="" required="" autofocus="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="password" class="mb-1">
                                __('Mot de passe') <span class="text-danger">*</span></label>
                            <div class="pinput_container mb-3">
                                <div class="form-group">
                                    <input type="password" id="password-field2" name="password" class="form-control form-control-submit" placeholder="*****************" required>
                                    <div data-name="#password-field2" class="la la-fw la-eye field-icon toggle-password" style="float: right;
    margin-left: -25px;
    margin-top: -28px;
    position: relative;
    z-index: 2;
    right: 18px;
    cursor: pointer;"></div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="password" class="mb-1">
                                __('Confirmez le mot de passe') <span class="text-danger">*</span></label>
                            <div class="pinput_container mb-3">
                                <div class="form-group">
                                    <input id="password-field3" type="password" name="password_confirmation" class="form-control form-control-submit" placeholder="*****************" required>
                                    <div data-name="#password-field3" class="la la-fw la-eye field-icon toggle-password" style="float: right;
    margin-left: -25px;
    margin-top: -28px;
    position: relative;
    z-index: 2;
    right: 18px;
    cursor: pointer;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row d-flex">
                                <div class="col-1 align-self-center form-check my-0 py-1">
                                    <input class="form-check-input m-0 p-0" type="checkbox" name="notificable" id="remember">
                                </div>
                                <div class="col-10 align-self-center">
                                    <label class="form-check-label m-0 p-0 text-primary" for="remember">
                                        __('Acceptez de recevoir les notifications et les bonus lie a votre compte')
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary my-5 rounded">{{__('S\'incrire')}}</button>
                        </div>
                    </div>
                    <div class="action-btns">
                        <a href="" class="btn rounded bg-primary shadow-sm mt-4 d-block d-flex align-items-center text-decoration-none justify-content-center">
                            <img src="{{ asset('assets/img/google-icon.svg')}}" alt="google" class="mr-3">
                            <span>{{__('S\'inscrire avec Google')}}</span>
                        </a>
                    </div>
                    <p class="text-center text-muted mt-4 mb-0 fw-medium font-monospace mb-3">{{__("Vous avez déjà un compte?")}}
                        <a href="{{ route('login')}}" class="text-decoration-none">{{__('Se connecter')}}</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
