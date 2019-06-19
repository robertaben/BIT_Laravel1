@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Kuriame nauja vartotoja
        </h1>

        <form method="post" action="{{ route('users.store') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>

            <input type="submit" class="btn btn-primary">
        </form>
    </div>

@endsection