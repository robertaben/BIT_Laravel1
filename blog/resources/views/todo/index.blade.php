@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ToDo list</h1>

        <form action="{{ route('todo.deleteAll') }}" method="post">
            @csrf
            {{ method_field('delete') }}
            <input type="submit" value="Delete ALL tasks" class="btn btn-danger text-white mb-3">
        </form>

        <a href="{{ route('todo.index') }}">
            View all
        </a>
        <a href="{{ route('todo.indexActive') }}">
            View active
        </a>
        <a href="{{ route('todo.indexCompleted') }}">
            View completed
        </a>
        @include('todo.components.create')

        <table class="table table-striped" >
            <thead>
            <tr>
                <th>Task title</th>
                <th>Task user</th>
                <th>
                    <a href="?order={{ $order }}">
                        Task date
                    </a>
                </th>
                <th>Complete</th>
                <th>Delete</th>
            </tr>
            </thead>

            @foreach($todoItems as $item)
                <tr>
                    <td>
                        @if($item->status == 1)
                            <div style="text-decoration: line-through">
                                <a href="{{ route('todo.show', [$item->id]) }}">
                                    {{ $item->title }}
                                </a>

                            </div>
                        @else
                            <a href="{{ route('todo.show', [$item->id]) }}">
                                {{ $item->title }}
                            </a>
                        @endif
                    </td>
                    <td>
                        @isset( $item->user)
                            <a href="{{ route('users.show', [$item->user->id]) }}">
                                {{ $item->user->name }}
                            </a>
                        @endisset

                    </td>
                    <td>
                        {{ $item->created_at }}
                    </td>
                    <td>
                        @if($item->status == 0)
                        <form action="{{ route('todo.complete', [$item->id]) }}" method="post">
                            @csrf
                            <input type="submit" value="Complete" class="btn btn-success">
                        </form>
                            @else
                            <form action="{{ route('todo.uncomplete', [$item->id]) }}" method="post">
                            @csrf
                            <input type="submit" value="Uncomplete" class="btn btn-secondary">
                        </form>
                            @endif
                    </td>
                    <td>
                        @if($item->status == 1)
                        <form action="{{ route('todo.destroy', [$item->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="X" class="btn btn-danger">
                        </form>
                            @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @endsection