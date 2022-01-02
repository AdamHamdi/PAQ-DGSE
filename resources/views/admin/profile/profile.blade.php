@extends('layouts.main')

@section('content')

<div class="row w-100 m-0 ">
    <div class="col-12 p-0">
        <div class="back-gray">

        </div>
    </div>

</div>
<div class="row w-100 m-0 ">
    <div class="col-12 col-md-9 mx-auto p-0">
        <div class=" border profil-card shadow">
            <div class="p-3 card-body">
                <div class="profile-avatar ">
                    <img src="{{ URL::to('images/photos/'.Auth::User()->photo) }}" class=" shadow" alt="">
                </div>
                <h4 class="d-flex justify-content-center text-capitalize font-weight-bold text-secondary">
                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                </h4>
                <small class=" d-flex justify-content-center text-secondary text-uppercase">
                    {{ Auth::user()->role }}
                </small>
                <div class="row m-0 w-100 mt-5">
                    <div class="col-md-4 col-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fal fa-envelope text-info fa-2x"></i>
                            <small class=" ml-2 text-secondary ">
                                {{ Auth::user()->email }}
                            </small>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fal fa-map-marker-alt text-success fa-2x"></i>
                            <small class=" ml-2 text-secondary ">
                                {{ Auth::user()->adresse }}
                            </small>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fal fa-phone-alt text-info fa-2x"></i>
                            <small class=" ml-2 text-secondary ">
                                +216 {{ Auth::user()->tel }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row m-0 w-100 mt-5">
                    <div class=" col-md-4 col-12">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target=".bd-example-modal-lg"> <i class="fal fa-edit"></i> Modifier votre
                                profil</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="border">
                <div class="p-2 bg-warning d-flex justify-content-between align-items-center">
                    <span class="text-white">Modifier votre profil</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="p-2">
                <form action=" {{route('update-profil',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="role"  value="{{Auth::user()->role}}">
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Nom  : <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nom" value="{{ Auth::user()->nom }}" required>
                                @if($errors->get('nom'))
                                @foreach($errors->get('nom') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Prenom : <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="prenom" value="{{ Auth::user()->prenom }}" required>
                                
                                @if($errors->get('prenom'))
                                @foreach($errors->get('prenom') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">E
                                    mail  : <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" required>
                                @if($errors->get('email'))
                                @foreach($errors->get('email') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Téléphone : <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="tel" value="{{ Auth::user()->tel }}" required>
                                
                                @if($errors->get('tel'))
                                @foreach($errors->get('tel') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Adresse  : <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="adresse" value="{{ Auth::user()->adresse }}" required>
                                @if($errors->get('adresse'))
                                @foreach($errors->get('adresse') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Photo de profil : <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="photo"  required>
                                
                                @if($errors->get('photo'))
                                @foreach($errors->get('photo') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Mot de passe  : <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password"  required>
                                @if($errors->get('password'))
                                @foreach($errors->get('password') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Confirmer le nouveau mot de passe : <span class="text-danger">*</span></label>
                                <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation"
                                                required autocomplete="new-password">
                                
                                @if($errors->get('fichier'))
                                @foreach($errors->get('fichier') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                 
                    <div class="row m-0 w-100">
                        <div class="col-12 px-2">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Valider</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection