@extends('layouts.main')

@section('content')
@if(Session::has('danger'))
        <div class="alert alert-danger">
            {{ Session::get('danger') }} @php Session::forget('danger'); @endphp
        </div>
        @endif @if(Session::has('warning'))
        <div class="alert alert-warning">
            {{ Session::get('warning') }} @php Session::forget('warning'); @endphp
        </div>
        @endif @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }} @php Session::forget('success'); @endphp
        </div>
        @endif
        hello

@endsection
