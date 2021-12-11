@extends('layouts.main')

@section('content')

<div class="row w-100 m-0 mt-2">
    <div class="col-12 p-0">
        <h5 class="d-flex align-items-center "><i class="fal fa-calendar-alt text-secondary  pr-2"></i><span
                class="text-secondary ">Rendez-vous</span> </h5>
    </div>

</div>

<div class="row w-100 m-0 mt-4">

    <div class="col-12 col-md-12 col-lg-3 px-2">
       
        <!-- @if(Route::is('rendez-vous') ) -->
        <div class="card shadow">
            <div class="p-2 bg-primary">
                <span class="text-white "> Ajouter un rendez-vous</span>
            </div>
            <div class="card-body">
                <form action="{{route('rendez-vous-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="date">Date de rendez-vous :</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="status" value="affecter" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- @endif -->
    </div>

    <div class="col-12 col-md-12 col-lg-9   px-2">
        <div class="card shadow">
            <div class="p-2 bg-success text-white">
                Liste des rendez-vous
            </div>
            <div class="card-body w-100 ">
                <div class="row m-0 w-100">
                    @foreach($r as $re)
                    <div class="col-12 col-md-4 ">
                        <div class="card shadow">
                            <div class="card-body">
                                <h6>date de rendez-vous :</h6>
                                <span>{{$re->date}}</span>
                            </div>
                            <div class="card-footer  p-2">

                                <form action="{{route('rendez-vous-delete',$re->id)}}"
                                    onsubmit="return confirm('Voulez vous vraiment supprimer ce rendez-vous?');"
                                    method="post">

                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                    <a href="{{ route('rendez-vous-edit',$re->id) }}"
                                        class="btn btn-sm bg-warning text-white"><i class="fal fa-edit m-0 "></i>
                                    </a>
                                    <button class="btn btn-sm bg-danger text-white">
                                        <i class="fal fa-trash-alt m-0"></i></button>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @if($r)
                    <div  class="float-right mr-4">{{ $r->links() }}</div>
                @endif
            </div>
        </div>

    </div>
</div>




@endsection