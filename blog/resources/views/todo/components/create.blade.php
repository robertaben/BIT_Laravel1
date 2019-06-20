@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <form method="post" action="{{ route('todo.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" required name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                           placeholder="Enter task title">
                    @error('title')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                    <option value="">Pasirinkte vartotoja</option>
                    @foreach($users as $user)
                        @if($user->id == old('user_id'))
                            <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="col-md-3">
                <input type="submit" value="Add task" class="btn-success btn btn-block">
            </div>
        </div>

    </form>
</div>