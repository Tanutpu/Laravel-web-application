@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('athletes.index') }}"> Back</a>
            </div>
            <br>
            <div class="text-center">
                <h1>Your Favorite Player</h1>
            </div>

        </div>
    </div>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-6">
                <!--รูป-->
                <img src="{{url('storage/img/'.$athlete['image']) }}" width="200px" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col">
                <div class="card-body">
                    <h1 class="card-title">Name : {{ $athlete->name }}</h1>
                    <h1 class="card-text">Position : {{ $athlete->position }}</h1>
                    <h1 class="card-text">Club :  {{ $athlete->club }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection