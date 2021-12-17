@extends('layouts.main')
@section('content')

<div class="row m-0 w-100 mt-4">
    @if(Route::is('actions') )
    <div class="col-12 col-sm-12 col-md-12 px-2 border">
        <div class="d-flex justify-content-between align-items-center p-2">
            <span class="text-secondary font-weight-bold">Liste des actions:</span>
            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                <i class="fal fa-plus text-white"></i> Action</a>
        </div>

        <table class="table  table-bordered ">
            <thead class="bg-success text-white">
                <tr>
                    <td>A</td>
                    <td>Date de début</td>
                    <td>Date de fin</td>
                    <td>Domaine</td>
                    <td>Responsable</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($a as $ac)
                <tr>
                    <td> {{$ac->nom_act}}</td>
                    <td>{{$ac->date_debut}}</td>
                    <td>{{$ac->date_fin}}</td>
                    <td>{{$ac->domaine->nom_domaine}}</td>
                    <td>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</td>
                    <td>
                        <form action="{{route('Action-delete',$ac->id)}}"
                            onsubmit="return confirm('Voulez vous vraiment supprimer cette action ?');" method="post">

                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <a href="{{route('Action-detail',$ac->id)}}" class="btn btn-sm bg-info text-white"><i
                                    class="fal fa-info-circle m-0 "></i>
                            </a>
                            <a href="{{route('Action-edit',$ac->id)}}" class="btn btn-sm bg-warning text-white"><i
                                    class="fal fa-edit m-0 "></i> </a>
                            <button class="btn btn-sm bg-danger text-white">
                                <i class="fal fa-trash-alt m-0"></i>
                            </button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($a)
        <div class="float-right mr-4">{{ $a->links() }}</div>
        @endif

    </div>
    @endif
    @if(Route::is('Action-detail') )
    <div class="col-12 col-sm-12 col-md-3 px-2">
        <div class="card">

            @if($action)
            <div class="px-3  py-2 bg-primary">
                <h6 class="text-white text-capitalize">{{$action->nom_act}}</h6>
            </div>
            <div class="p-2">

                <table class="table table-bordered">
                    <tr>
                        <td style="width:50%">
                            <span class="d-flex align-items-center"><i
                                    class="fad fa-home-alt text-danger mr-2"></i><span class="text-secondary">Domaine
                                    :</span> </span>
                        </td>
                        <td style="width:50%"><span class="text-secondary">{{$action->domaine->nom_domaine}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:50%">
                            <span class="d-flex align-items-center "><i
                                    class="fad fa-calendar-alt text-primary mr-2"></i><span class="text-secondary">Date
                                    de début </span></span>
                        </td>
                        <td style="width:50%"><span class="text-secondary">{{$action->date_debut}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:50%">
                            <span class="d-flex align-items-center "><i
                                    class="fad fa-calendar-alt text-danger mr-2"></i><span class="text-secondary">Date
                                    de fin </span></span>
                        </td>
                        <td style="width:50%"><span class="text-secondary">{{$action->date_fin}}</span></td>
                    </tr>
                    <tr>
                        <td style="width:50%">
                            <span class="d-flex align-items-center "><i
                                    class="fad fa-sack-dollar text-warning mr-2"></i><span class="text-secondary">Budget
                                </span></span>
                        </td>
                        <td style="width:50%"><span class="text-secondary">{{$action->budget->budget_total}} TND</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%">
                            <span class="d-flex align-items-center "><i
                                    class="fad fa-user-cog text-success mr-2"></i><span
                                    class="text-secondary">Responsable </span></span>
                        </td>
                        <td style="width:50%"><span class="text-secondary">{{ Auth::user()->nom }}
                                {{ Auth::user()->prenom }}</span></td>
                    </tr>
                </table>

            </div>
            @endif
            <div class="px-2 ">
                <a href="{{ URL::previous() }} " class="btn btn-outline-secondary">Retour</a>
            </div>
        </div>
    </div>
    @endif
</div>
@if(Route::is('actions') )
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row m-0 w-100">
                <div class="col-12 p-0">
                    <div class="">
                        <div class="  bg-primary p-2 d-flex justify-content-between align-items-center">
                            <h6 class="text-white">Créer une nouvelle action:</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                        <div class="p-2">
                            <form action=" {{route('actions-store')}}" method="post">
                                @csrf
                                <div class="row m-0 w-100">
                                    <div class="col-12 col-sm-6 ">
                                        <div class="form-group">
                                            <label>Action <span class="text-danger">*</span> :</label>
                                            <input class="form-control" type="text" name="nom_act" required>
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
                                            <select name="domaine_id" id="" class="form-control" required>
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
                                            <input class="form-control" type="date" name="date_debut" required>
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
                                    <div class="col-12  ">
                                        <div class="form-group">
                                            <button class="btn btn-success">Valider</button>
                                            <button class="btn btn-secondary" type="reset"
                                                data-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- @if(Route::is('Action-edit') )
<div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row m-0 w-100">
                <div class="col-12 p-0">
                    <div class="">
                        <div class="  bg-warning p-2">
                            <h6 class="text-white">Modifier cette action</h6>
                        </div>
                        <div class="p-2">
                            <form action=" " method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row m-0 w-100">
                                    <div class="col-12 col-sm-6 ">
                                        <div class="form-group">
                                            <label>Action <span class="text-danger">*</span> :</label>
                                            <input class="form-control" type="text" name="nom_act" required>
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
                                            <select name="domaine_id" id="" class="form-control" required>
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
                                            <input class="form-control" type="date" name="date_debut" required>
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
                                    <div class="col-12  ">
                                        <div class="form-group">
                                            <button class="btn btn-success">Valider</button>
                                            <button class="btn btn-secondary" type="reset"
                                                data-dismiss="modal">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif -->

@endsection