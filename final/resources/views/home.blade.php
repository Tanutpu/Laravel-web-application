@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg">
                <div class="card-body text-center">
                    <h1>Project My Favorite Basketball Player</h1>
                    <div class="p-2">
                    <img src="https://artwallpaper.co/wp-content/uploads/2021/11/Nba-Basketball-Wallpaper-34.jpg" class="img-fluid" alt="...">               
                    </div>
                    <br>
                    <div class="card-body text-center d-grid gap-2 col-6 mx-auto ">
                    <a href="athletes.index" type="button" class="btn btn-dark btn-lg"> Start</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection