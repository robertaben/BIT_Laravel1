@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ToDo list</h1>
        <ul class="list-group d-flex flex-row mb-3">
            <li class="list-group-item list-group-item-action list-group-item-secondary"><a href="{{ route('todo.index') }}">ALL</a></li>
            <li class="list-group-item list-group-item-action list-group-item-secondary"><a href="{{ route('todo.active') }}">Active</a></li>
            <li class="list-group-item list-group-item-action list-group-item-secondary active"><a href="{{ route('todo.completed') }}">Completed</a></li>
        </ul>
        @include('todo.components.create')

        <table class="table table-striped" >
            <thead>
            <tr>
                <th>Task title</th>
                <th>Complete</th>
                <th>Delete</th>
            </tr>
            </thead>

            @foreach($todoItems as $item)
                <tr>
                    <td>
                        @if( $item->status == 1)
                            <div style="text-decoration: line-through">
                                {{ $item->title}}
                            </div>
                        @else {{ $item->title }}
                            @endif
                    </td>
                    <td>
                        @if($item->status == 0)
                        <form action="{{ route('todo.complete', [$item->id]) }}" method="post">
                            @csrf
                            <input type="submit" value="Compele" class="btn btn-success">
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