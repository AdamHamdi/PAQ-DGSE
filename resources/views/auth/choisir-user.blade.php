@extends('layouts.app')

@section('content')

<div class="  mt-5">
    <div class="row m-0 w-100">
        <div class=" col-xl-8 col-lg-10 col-md-10 col-sm-12 mx-auto">
            <div class="card border-0">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12  col-sm-12  d-md-block p-5">
                        <img src="{{ asset('images/auth-login.jpg')}}" alt="" class="img-fluid img-login border-1 ">
                    </div>
                    <div class="col-lg-6 col-md-12  col-sm-12">
                        <div class="d-flex justify-content-around">
                            <h2 class="text-purple">PAQ-DGSE</h2>
                        </div>
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Choisir un compte !</h4>
                            <div class="row m-0 w-100">
                                <div class="col-12 p-0">
                                    <div class=" shadow bg-white  responsable">
                                        <a class="d-flex align-items-center " href="{{ route('register-domaine') }}">
                                            <div class="d-flex align-items-center p-3">
                                                <span class="icon ">
                                                    <i class="fal fa-user-plus font-weight-bold"></i>
                                                </span>
                                                <div class="pl-3 ">
                                                    <h5>Responsable de domaine</h5>
                                                    <p class="text-secondary">Pour les responsables de domaines</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 w-100 mt-2">
                                <div class="col-12 p-0 ">
                                    <div class=" shadow bg-white  responsable">
                                        <a class="d-flex align-items-center" href="{{ route('register-action') }}">
                                            <div class="d-flex align-items-center p-3">
                                                <span class="icon ">
                                                    <i class="fal fa-user-plus font-weight-bold"></i>
                                                </span>
                                                <div class="pl-3 ">
                                                    <h5>Responsable d'action</h5>
                                                    <p class="text-secondary">Pour les responsables d'actions</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection