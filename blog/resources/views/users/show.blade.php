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
                <div class="avatar">
                    <img src="{{ Storage::url($user->avatar) }}" alt="avatar" style="width: 100%">
                </div>
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
                <h3>User tasks to be done: {{ $user->todoItemsUndone()->count() }}</h3>
                <ul>
                    @foreach($user->todoItemsUndone()->get() as $item)
                        @if($item->status == 0)
                            <li>
                                {{ $item->title }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="col-md-6">
                <h3>User tasks done:</h3>
                <ul>
                    @foreach($user->todoItemsDone() as $item)
                        @if($item->status == 1)
                            <li>
                                {{ $item->title }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="col-md-6">
                <h3>User comments:</h3>
                <ul>
                    @foreach($user->comments as $comment )
                        <li>
                            Pakomentuota: <a href="{{route('todo.show', [$comment->todo_id])}}">{{ $comment->todoItem->title }} </a>
                            | {{ $comment->created_at->format('j F, Y') }}
                        </li>
                        @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection