@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $item->title }}</h1>

                {{-- Patikrinu ar item turi userio objekto sarysi--}}
                @isset($item->user)
                    <div>
                        Assigned to: {{ $item->user->name }}
                    </div>
                    <div>
                        User email: {{ $item->user->email }}
                    </div>
                @endisset

                <div class="comments mt-3">

                    @include('todo.components.comments-list')

                    <h3>Add a comment</h3>
                    @include('todo.components.comment-form')
                </div>

            </div>
            <div class="col-md-4">
                <h3>Task actions</h3>
                @if($item->status == 0)
                    <form method="post" action="{{ route('todo.complete', [$item->id]) }}">
                        @csrf
                        <input type="submit" value="Complete" class="btn btn-success">
                    </form>
                @endif

                @if($item->status == 1)
                    <form method="post" action="{{ route('todo.destroy', [$item->id]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection