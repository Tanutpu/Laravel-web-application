@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Favorite Basketball Player</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('athletes.create') }}"> Create Your Favorite Player</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Position</th>
            <th>Club</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($athletes as $athlete)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="{{url('storage/img/'.$athlete['image']) }}" width="100px"></td>
            <td>{{ $athlete->name }}</td>
            <td>{{ $athlete->position }}</td>
            <td>{{ $athlete->club }}</td>
            <td>
                <form action="{{ route('athletes.destroy',$athlete->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('athletes.show',$athlete->id) }}">Show</a>

                    <a class="btn btn-warning" href="{{ route('athletes.edit',$athlete->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>

    {!! $athletes->links() !!}
</div>

@endsection