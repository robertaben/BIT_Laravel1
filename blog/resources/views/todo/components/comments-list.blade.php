@if($item->comments->count() > 0)
    <h3>Comments: </h3>
    @foreach($item->comments as $comment)
        <div class="comment mt-3">
            Comment by:
            <a href="{{ route('users.show', [$comment->user->id]) }}">
                {{ $comment->user->name }}
            </a>

            <div>
                {{ $comment->comment_text }}
            </div>
            @if($comment->user_id == Auth::user()->id)
                <div>
                    <form action="{{ route('comment.destroy', [$comment->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete comment">
                    </form>
                </div>
            @endif
        </div>
    @endforeach
@endif