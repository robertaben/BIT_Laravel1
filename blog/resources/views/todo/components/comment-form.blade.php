<form method="post" action="{{ route('comment.store') }}">
    @csrf
    <div class="form-group">
        <textarea name="comment_text" class="form-control"></textarea>
    </div>

    <input type="hidden" name="todo_id" value="{{ $item->id }}">

    <input type="submit" value="Comment" class="btn btn-success">
</form>