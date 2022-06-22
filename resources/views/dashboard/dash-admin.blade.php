@extends('layouts.main')

@section('content')
<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center text-underline">
        <span class="pcoded-micon"><i class="fal fa-home pr-2"></i></span>
            <span
                class="text-secondary ">Dashboard Admin</span> </h5>
    </div>

</div>
 
<h3> Liste des domaines</h3>
<div class="row m-0 w-100">
    
    @foreach($domaine as $d)
    @php

if ($d->nom_domaine === 'Gestion et governance') {
   $color = "#5da9ff";
}elseif ($d->nom_domaine === 'Formation et employabilité') {
   $color = "#fc8d79";
}elseif ($d->nom_domaine === 'Recherche et innovation') {
   $color = "#64d3cc";
}elseif ($d->nom_domaine === 'Vie universitaire') {
   $color = "#c75ec7";
}else{
    $color = "#76e5aa";
   }

@endphp
    <div class=" col-xl-3 col-lg-4 col-sm-6 col-12 px-1">
        <div class="card p-3 shadow" style="background-color:{{$color}}">
            <div class="d-flex align-items-center justify-content-between mb-3 w-100">
                <h6 class="text-white font-weight-bold"> {{$d->nom_domaine}} </h6>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-3 w-100">
                <div class="d-flex align-items-center flex-column">
                    <small class="text-white ">Budget</small>
                    <h6 class="text-white font-weight-bold">{{$d->budget_domaine}} dt</h6>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <small class="text-white ">Budget Résolu</small>
                    <h6 class="text-white font-weight-bold">1000 dt</h6>
                </div>
            </div>
           
            <div class="d-flex align-items-center justify-content-between  w-100">
                <div class="d-flex align-items-center text-center flex-column">
                    <small class="text-white ">N=° Action(s)</small>

                    <h4 class="text-white font-weight-bold">@if($action){{($action->count())}} @endif </h4>
                </div>
                <div class="d-flex align-items-center flex-column text-center ">
                    <small class="text-white ">Action(s) en cours</small>
                    <h4 class="text-white font-weight-bold">
                 
                    </h4>
                </div>
                <div class="d-flex align-items-center flex-column text-center ">
                    <small class="text-white ">Action(s) en terminée(s)</small>
                    <h4 class="text-white font-weight-bold"> 
                    {{ \App\Action::all()->where('status','termine')->where('domaines.id', '=' ,'actions.domaine_id')->count() }}
                    
                </h4>
                </div>
            </div>
           
            
        </div>
    </div>
    @endforeach 
</div>
 
<h3> Liste des actions</h3>
<div class="row m-0 m-100">
    @foreach ($action as $a )  
    
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-1"> 
        <div class="card shadow bg-info">
                <div class="card-statistic-3 p-3">
                   
                    <div class="mb-4 d-flex align-items-center justify-content-between   px-2 ">
                        <h5 class="card-title mb-0 text-white font-weight-bold text-capitalize">{{$a->nom_act}}</h5>
                        <h5 class="card-title mb-0 text-white font-weight-bold">{{$a->budget}}</h5>
                    </div>
                    <div class="row align-items-center justify-content-between mb-2 px-3 d-flex">
                        <div class=" ">
                            <small class="d-flex align-items-center mb-0">
                            {{$a->date_debut}}
                            </small>
                        </div>
                        <div class="  text-right">
                        <small class="d-flex align-items-center mb-0">
                        {{$a->date_fin}}
                            </small>
                        </div>
                    </div> 
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" data-width="{{$a->date_fin}}" 
                        aria-valuenow="25" aria-valuemin="{{$a->date_fin}}" aria-valuemax="{{$a->date_fin}}" 
                        style="width:{{ (((round(strtotime(Carbon::now()) - time()) / 86400)  - (round(strtotime($a->date_debut) - time()) / 86400)) *100 ) 
                     /  (((round(strtotime($a->date_fin) - time()) / 86400) - (round(strtotime($a->date_debut) - time()) / 86400)) ) }}%;"></div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                <small class="text-white px-3 py-1 text-capitalize">  
                {{ $a->nom}} {{ $a->prenom}} 
            </small>
            <small class="text-white px-3 py-1 text-capitalize">
            <mark>{{ $a->nom_domaine}} </mark> 
            </small>
            </div>
            </div>
    </div>
    
   @endforeach
  
</div>

@endsection