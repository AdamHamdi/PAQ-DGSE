@extends('layouts.app')

@section('content')

<div class=" login mt-5">
    <div class="row m-0 w-100">
        <div class=" col-xl-8 col-lg-12 col-sm-12  mx-auto">
            <div class="card border-0">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12  col-sm-12  d-md-block p-5">
                        <img src="{{ asset('images/auth-login.jpg')}}" alt="" class="img-fluid img-login ">
                    </div>
                    <div class="col-lg-6 col-md-12  col-sm-12  p-0">
                    
                        <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <h5 class="text-purple">PAQ-DGSE</h5>
                        </div>
                            <form method="POST" action="{{ route('ResActionStore') }}" enctype="multipart/form-data">
                                @csrf
                                <h4 class="mb-3 f-w-400">Créer votre compte responsable action</h4>
                                <input type="hidden" name="role" value="responsable action">
                                <div class="row m-0 w-100">
                                    <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-user"></i></span>
                                            </div>
                                            <input id="nom" type="text"
                                                class="form-control @error('nom') is-invalid @enderror"
                                                placeholder="Saisir votre nom " autocomplete="nom" autofocus
                                                name="nom" value="{{ old('nom') }}" required autocomplete="nom"
                                                autofocus>
                                            @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-user"></i></span>
                                            </div>
                                            <input id="prenom" type="prenom"
                                                class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                                value="{{ old('prenom') }}" required autocomplete="prenom"
                                                placeholder="Saisir votre prenom">
                                            @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0 w-100">
                                <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                            </div>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Saisir votre adresse email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-phone"></i></span>
                                            </div>
                                            <input id="tel" type="text"
                                                class="form-control @error('tel') is-invalid @enderror"
                                                placeholder="Saisir votre  téléphone" autocomplete="tel" autofocus
                                                name="tel" value="{{ old('tel') }}" required autocomplete="tel"
                                                autofocus>
                                            @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0 w-100">
                                <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-map-pin"></i></span>
                                            </div>
                                            <input id="adresse" type="adresse"
                                                class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                                                value="{{ old('adresse') }}" required autocomplete="adresse"
                                                placeholder="Saisir votre adresse ">
                                            @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-image"></i></span>
                                            </div>
                                            <input id="photo" type="file"
                                                class="form-control @error('photo') is-invalid @enderror"
                                                placeholder="Saisir votre photo" autocomplete="photo" autofocus
                                                name="photo" value="{{ old('photo') }}" required autocomplete="photo"
                                                autofocus>
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row m-0 w-100">
                                    <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                            </div>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Saisir un mot de passe" required
                                                autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 px-1">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                            </div>
                                            <input id="password-confirm" type="password" class="form-control"
                                                placeholder="Confirmer le mot de passe" name="password_confirmation"
                                                required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 pl-1">
                                    <div class="col-md-6 pl-3">
                                        <button type="submit" class="btn btn-primary">
                                            S'inscrire
                                        </button>
                                    </div>
                                </div>
                            </form>
                            Vous avez déjà un compte?<a href="{{route('login')}}" class="btn-link"> Connexion</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection