@extends('layouts.main')
@section('content')
<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center "><i class="fal fa-file-spreadsheet text-secondary  pr-2"></i><span
                class="text-secondary ">Produits</span> </h5>
    </div>

</div>
<div class="row m-0 w-100 mt-4">

    <div class="col-12 col-sm-12 col-md-12 col-lg-6 px-2 mb-3">
        <div class="border">
            <div class="bg-primary p-2">
                <h6 class="text-white">Créer un nouveau produit:</h6>
            </div>
            <div class="p-2">
                <form action=" {{route('produits-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Quantité <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="quantite" required>
                                @if($errors->get('quantite'))
                                @foreach($errors->get('quantite') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Action <span class="text-danger">*</span></label>
                                <select name="action_id" id="" class="form-control" required>
                                    @foreach($act as $do)
                                    <option value="{{ $do->id}}">{{ $do->nom_act}}</option>
                                    @endforeach
                                </select>
                                @if($errors->get('action_id'))
                                @foreach($errors->get('action_id') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 w-100">
                        <div class="col-md-4 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Prix <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="prix" required>
                                @if($errors->get('prix'))
                                @foreach($errors->get('prix') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Date de début <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="date_debut" required>
                                @if($errors->get('date_debut'))
                                @foreach($errors->get('date_debut') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">date de fin <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="date_fin" required>
                                @if($errors->get('date_fin'))
                                @foreach($errors->get('date_fin') as
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
        <div class="border p-2"style="overflow:hidden">
            <div class="mb-2">
            <span class="text-secondary font-weight-bold ">Liste des produits </span>
            </div>
            
            <div class="table-overflow">
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                        <tr>
                            <td>#</td>
                            <td>Quantité</td>
                            <td>Action</td>
                            <td>Date de début </td>
                            <td>Date de fin</td>
                            <td>Prix</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prod as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->quantite}}</td>
                            <td>{{$p->action->nom_act}}</td>
                            <td>{{$p->date_debut}}</td>
                            <td>{{$p->date_fin}}</td>
                            <td>{{$p->prix}}</td>

                            <td>
                                <form action="{{route('produits-delete',$p->id)}} "
                                    onsubmit="return confirm('Voulez vous vraiment supprimer ce produit ?');"
                                    method="post">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                    <a href="{{route('produits-edit',$p->id)}} "
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