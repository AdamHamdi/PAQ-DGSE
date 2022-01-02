@extends('layouts.main')
@section('content')
<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center "><i class="fal fa-file-spreadsheet text-secondary  pr-2"></i><span
                class="text-secondary ">Produits</span> </h5>
    </div>

</div>
<div class="row m-0 w-100 mt-4">
@if($prod)
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mx-auto p-0 mb-3 shadow">
        <div class="border">
            <div class="bg-warning p-2">
                <h6 class="text-white">Modifier le produit :</h6>
            </div>
            <div class="p-2">
                <form action=" {{route('produits-update',$prod->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Quantité <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="quantite" value="{{$prod->quantite}}" required>
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
                                @if($act)
                                <select name="action_id" id="" class="form-control"  required>
                                    @foreach($act as $do)
                                    <option value="{{ $do->id}}">{{ $do->nom_act}}</option>
                                    @endforeach
                                </select>
                                @endif
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
                                <input class="form-control" type="number" name="prix" value="{{$prod->prix}}" required>
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
                                <input class="form-control" type="date" name="date_debut" value="{{$prod->date_debut}}"required>
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
                                <input class="form-control" type="date" name="date_fin" value="{{$prod->date_fin}}" required>
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

   @endif
</div>

@endsection