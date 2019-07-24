@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Redaguojame vartotoja: {{ $user->name }}
        </h1>

        <form method="post" action="{{ route('users.update', [$user->id]) }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            {{ method_field('put') }}

            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <input accept="image/*" type="file" name="avatar" class="form-control" />
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>

    @endsection