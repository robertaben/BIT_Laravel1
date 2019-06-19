@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <h1>
                    Vartotojas: {{ $user->name }}
                </h1>

                <ul>
                    <li>ID {{ $user->id }}</li>
                    <li>Email: {{ $user->email }}</li>
                    <li>Registracijos data: {{ $user->created_at }}</li>
                </ul>
            </div>

            <div class="col-md-4">
                <h3>Vartotojo nustatymai</h3>
                <a class="btn btn-info text-white mb-3" href="{{ route('users.edit', [$user->id]) }}">
                    Redaguoti vartotoja
                </a>
                <form action="{{ route('users.delete', [$user->id]) }}" method="post">
                    @csrf
                    {{ method_field('delete') }}
                    <input type="submit" value="Išstrinti vartotoja" class="btn btn-danger text-white mb-3">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>User tasks: {{ count($user->toDoItems) }}</h3>
                <ul>
                    @foreach($user->todoItems as $item)
                        <li>
                            {{ $item->title }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection