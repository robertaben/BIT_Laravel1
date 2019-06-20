<?php

namespace App\Http\Controllers;

use App\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->comment_text = $request->input('comment_text');
        $comment->todo_id = $request->input('todo_id');

        // Gauname prisijungusio vartotojo id

        $comment->user_id = Auth::user()->id;

        $comment->save();

        session()->flash('message', 'Comment was added');
        session()->flash('message-class', 'alert-success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if($comment->user_id == Auth::user()->id) {
            $comment->delete();
            session()->flash( 'message', 'Comment was deleted successfully!' );
            session()->flash( 'message-class', 'alert-danger' );
        } else {
            session()->flash( 'message', 'You are not allowed to do this' );
            session()->flash( 'message-class', 'alert-danger' );
        }
        return redirect()->back();
    }
}
