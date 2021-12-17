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
                <h6 class="text-white">Modifier cette action</h6>
            </div>
            <div class="p-2">
                @if($acti)
                <form action=" {{route('Action-update',$acti->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row m-0 w-100">
                        <div class="col-12 col-sm-6 ">
                            <div class="form-group">
                                <label>Action <span class="text-danger">*</span> :</label>
                                <input class="form-control" type="text" name="nom_act" value="{{$acti->nom_act}}"
                                    required>
                                @if($errors->get('nom_act'))
                                @foreach($errors->get('nom_act') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <div class="form-group">
                                <label>Domaine <span class="text-danger">*</span> :</label>
                                <select name="domaine_id" class="form-control" required>
                                    @foreach($d as $do)
                                    <option value="{{ $do->id}}">{{ $do->nom_domaine}}</option>
                                    @endforeach
                                </select>
                                @if($errors->get('domaine_id'))
                                @foreach($errors->get('domaine_id') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 w-100">
                        <div class="col-12 col-sm-6 ">
                            <div class="form-group">
                                <label>Date de début<span class="text-danger">*</span> :</label>
                                <input class="form-control" type="date" name="date_debut" value="{{$acti->date_debut}}"
                                    required>
                                @if($errors->get('date_debut'))
                                @foreach($errors->get('date_debut') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 ">
                            <div class="form-group">
                                <label>Date de fin <span class="text-danger">*</span> :</label>
                                <input class="form-control" type="date" name="date_fin" value="{{$acti->date_fin}}"
                                    required>
                                @if($errors->get('date_fin'))
                                @foreach($errors->get('date_fin') as
                                $message)
                                <label style="color:red">{{ $message }}</label>
                                @endforeach @endif
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 w-100">
                        <div class="col-12  ">
                            <div class="form-group">
                                <button class="btn btn-success">Valider</button>
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