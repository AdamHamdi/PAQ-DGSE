@extends('layouts.main')
@section('content')
<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center "><i class="fal fa-file-spreadsheet text-secondary  pr-2"></i><span
                class="text-secondary ">Domaines</span> </h5>
    </div>

</div>
<div class="row m-0 w-100 mt-4">
@if($dom)
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mx-auto p-0 mb-3 shadow">
        <div class="border">
            <div class="bg-warning p-2">
                <h6 class="text-white">Modifier le domaine :</h6>
            </div>
            <div class="p-2">
                <form action=" {{route('domaines-update',$dom->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row m-0 w-100">
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Nom de domaine : <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nom_domaine" value="{{$dom->nom_domaine}}" required>
                                @if($errors->get('nom_domaine'))
                                @foreach($errors->get('nom_domaine') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12 px-2">
                            <div class="form-group">
                                <label for="my-input">Budget : <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="budget_domaine" value="{{$dom->budget_domaine}}" required>
                                
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

   @endif
</div>

@endsection