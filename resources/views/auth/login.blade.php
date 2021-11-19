@extends('layouts.app')

@section('content')
<div class=" login mt-5">
    <div class="row m-0 w-100">
        <div class="col-lg-8 col-md-12 col-sm-12 mx-auto">
        <div class="card  border-0 ">
            <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 d-md-block p-5">
                    <img src="{{ asset('images/auth-login.jpg')}}" alt="" class="img-fluid img-login " >
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="d-flex justify-content-around">
                            <h2 class="text-purple">PAQ-DGSE</h2>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf
                            <img src="../assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                            <h4 class="mb-3 f-w-400">Connectez-vous à votre compte</h4>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group text-left mt-2">
                                <div class="checkbox checkbox-primary d-inline">
                                    <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                    <label for="checkbox-fill-a1" class="cr"> Enregistrer les informations d'identification</label>
                                </div>
                            </div>
                            <button class="btn btn-primary text-white mb-4" 
                            type="submit" >Login</button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                            @endif
                            <p class="mb-0 text-muted">Vous n'avez pas de compte ? <a href="{{ route('select-user') }}"
                                    class="f-w-400">Inscrivez-vous</a></p>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        </div>
    </div>
</div>
@endsection