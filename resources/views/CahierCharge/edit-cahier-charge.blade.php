required>
@extends('layouts.main')
@section('content')
<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center "><i class="fal fa-list-alt text-secondary  pr-2"></i><span
                class="text-secondary ">Actions </span> </h5>
    </div>
</div>
<div class="row m-0 w-100 mt-4">
    <div class="col-12 col-md-6 mx-auto p-0 ">
  
        <div class="border shadow">
            <div class="  bg-warning p-2">
                <h6 class="text-white">Modifier ce cahier de charge </h6>
            </div>
            <div class="p-2">
            @if($cah)
                <form action="{{route('cahier-charge-update',$cah->id)}} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Cahier de charge </label>
                                <input class="form-control" type="text" name="nom" value="{{ $cah->nom}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Pièce jointe : <a href="{{  URL::to('cahier_charges/fichiers/'.$cah->fichier)}}">Cliquer ici</a></label>
                                <input class="form-control" type="file" name="fichier" value="{{ $cah->fichier}}" required>
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
                @endif

            </div>
        </div>
       
    </div>
</div>
@endsection