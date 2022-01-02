@extends('layouts.main')
@section('content')
<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center "><i class="fal fa-columns text-secondary  pr-2"></i><span
                class="text-secondary ">Domaines</span> </h5>
    </div>

</div>
<div class="row m-0 w-100 mt-4">

    <div class="col-12 col-sm-12 col-md-12 col-lg-6 px-2 mb-3">
        <div class="border">
            <div class="bg-primary p-2">
                <h6 class="text-white">Créer un nouveau domaine:</h6>
            </div>
            <div class="p-2">
                <form action=" {{route('domaines-store')}}" method="post" >
                    @csrf
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Nom de domaine  <span class="text-danger"> *</span>:</label>
                                <input class="form-control" type="text" name="nom_domaine" required>
                                @if($errors->get('nom_domaine'))
                                @foreach($errors->get('nom_domaine') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Budget <span class="text-danger"> *</span>:</label>
                                <input class="form-control" type="number" name="budget_domaine" required>
                              
                                @if($errors->get('budget_domaine'))
                                @foreach($errors->get('budget_domaine') as
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

    <div class="col-12 col-sm-12 col-md-12 col-lg-6  px-2 ">
        <div class="border p-2">
            <div class="mb-2">
            <span class="text-secondary font-weight-bold ">Liste des produits </span>
            </div>
            
            <div class="table-overflow">
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                        <tr>
                            <td>#</td>
                            <td>Nom de domaine</td>
                            <td>Budget</td>
                           
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dom as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->nom_domaine}}</td>
                            <td>{{$p->budget_domaine}} TND</td>
                           

                            <td>
                                <form action="{{route('domaines-delete',$p->id)}} "
                                    onsubmit="return confirm('Voulez vous vraiment supprimer ce domaine ?');"
                                    method="post">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                    <a href="{{route('domaines-edit',$p->id)}} "
                                        class="btn btn-sm bg-warning text-white"><i class="fal fa-edit m-0"></i>
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

@endsection