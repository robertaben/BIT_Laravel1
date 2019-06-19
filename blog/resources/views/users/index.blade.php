@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Users</h1>
        <div class="col-md-4">
            @guest
                @else
            <a class="btn btn-info text-white mb-3" href="{{ route('users.create') }}">
                Sukurti nauja vartotoja
            </a>
                @endif
        </div>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
            </thead>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="/user/{{$user->id}}">{{ $user->email }}</a>
                    </td>
                    <td>
                        <a href="{{route('users.show', [$user->id])}}">{{ $user->name }}</a>
                    </td>
            @endforeach
        </table>
    </div>

@endsection