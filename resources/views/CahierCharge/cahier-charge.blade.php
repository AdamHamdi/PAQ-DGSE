@extends('layouts.main')
@section('content')
<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center "><i class="fal fa-books text-secondary  pr-2"></i><span
                class="text-secondary ">Cahiers de charges</span> </h5>
    </div>

</div>

<div class="row m-0 w-100 mt-4">

    <div class="col-12 col-sm-12 col-md-12 col-lg-6 px-2 mb-3">
        <div class="border">
            <div class="bg-primary p-2">
                <h6 class="text-white">Créer une nouvelle cahier de charge:</h6>
            </div>
            <div class="p-2">
                <form action=" {{route('cahier-charge-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Cahier de charge</label>
                                <input class="form-control" type="text" name="nom"required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Pièce jointe</label>
                                <input class="form-control" type="file" name="fichier" required>
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

    <div class="col-12 col-sm-12 col-md-12 col-lg-6  px-2 ">
        <div class="border p-2">
            <span class="text-secondary font-weight-bold">Liste des cahiers de charge </span>


            <div class="table-overflow">
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                        <tr>
                            <td>#</td>
                            <td>Pièce jointe</td>
                            <td>Date de creation</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cahier as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td><a href="{{  URL::to('cahier_charges/fichiers/'.$c->fichier)}}">Cliquer ici</a> </td>
                            <td>{{$c->created_at}}</td>

                            <td>
                                <form action="{{route('cahier-charge-delete',$c->id)}} "
                                    onsubmit="return confirm('Voulez vous vraiment supprimer cette action ?');"
                                    method="post">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                   
                                    <a href="{{route('cahier-charge-edit',$c->id)}} " class="btn btn-sm bg-warning text-white"><i class="fal fa-edit m-0"></i>
                                    </a>
                                    <button class="btn btn-sm bg-danger text-white">
                                        <i class="fal fa-trash-alt m-0"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@if(Route::is('cahier-charge-detail') )
<div class="col-12 col-sm-12 col-md-3 px-2">
    <div class="card" style="width: fit-content"></div>
</div>
@endif
</div>
@endsection