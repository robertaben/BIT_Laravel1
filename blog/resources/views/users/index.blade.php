@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Users ( {{ $usersCount }} )</h1>

            </div>

            <div class="col-md-4">
                @guest
                    {{-- Tu esi svecias tau nerodomas sukurimo mygtukas --}}
                @else
                    <a href="{{ route('users.create') }}" class="btn btn-success">
                        Create user
                    </a>
                @endguest

            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Tasks Count</th>
                <th>Delete</th>
            </tr>
            </thead>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="/user/{{ $user->id }}">
                            {{ $user->email }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('users.show', [$user->id]) }}">
                            {{ $user->name }}
                        </a>
                    </td>

                    <td>
                        {{ $user->todoItemsUndone()->count() }}
                    </td>

                    <td>
                        <form method="post" action="{{ route('users.delete', [$user->id]) }}">
                            @csrf
                            {{ method_field('delete') }}
                            <input type="submit" value="X" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection