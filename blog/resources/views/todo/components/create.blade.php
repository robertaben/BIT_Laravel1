<div class="form-group">
    <form method="post" action="{{ route('todo.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" required name="title" class="form-control" value=""
                           placeholder="Enter task title">
                </div>
            </div>

            <div class="col-md-3">
                <select class="form-control" name="user_id" required>
                    <option value="">Pasirinkte vartotoja</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="submit" value="Add task" class="btn-success btn btn-block">
            </div>
        </div>

    </form>
</div>