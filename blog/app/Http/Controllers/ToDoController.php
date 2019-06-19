<?php

namespace App\Http\Controllers;

use App\ToDoItem;
use App\User;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = "DESC";
        if ( $request->has( 'order' ) ) {
            $order = $request->input( 'order' );
        }

        $todoItems = ToDoItem::orderBy( 'created_at', $order )
            ->get();

        $users = User::all();


        if ( $order == 'ASC' ) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }


        return view( 'todo.index', [
            "todoItems" => $todoItems,
            "order" => $order,
            "users" => $users
        ] );

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
        $todoItem = new todoItem();
        $todoItem->title = $request->input('title');
        $todoItem->user_id = $request->input( 'user_id' );
        $todoItem->save();

        $request->session()->flash('message', 'Task was created successfuly!');

        return redirect()->route('todo.index');
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
        $todoItem = ToDoItem::find($id);
        if ($todoItem->status == 1) {
            $todoItem->delete();
        }

        return redirect()->route('todo.index');
    }

    public function markAsCompleted($id)

    {
        $todoItem = ToDoItem::find($id);
        $todoItem->status = 1;
        $todoItem->save();

        return redirect()->route('todo.index');
    }

    public function indexCompleted( Request $request ) {
        $order = "DESC";
        if ( $request->has( 'order' ) ) {
            $order = $request->input( 'order' );
        }

        $todoItems = ToDoItem::where('status', 1)
            ->orderBy( 'created_at', $order )
            ->get();


        $users = User::all();

        if ( $order == 'ASC' ) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }


        return view( 'todo.index', [
            "todoItems" => $todoItems,
            "order" => $order,
            "users" => $users
        ] );
    }

    public function indexActive(Request $request) {
        $order = "DESC";
        if ( $request->has( 'order' ) ) {
            $order = $request->input( 'order' );
        }

        $todoItems = ToDoItem::where('status', 0)
            ->orderBy( 'created_at', $order )
            ->get();


        $users = User::all();

        if ( $order == 'ASC' ) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }


        return view( 'todo.index', [
            "todoItems" => $todoItems,
            "order" => $order,
            "users" => $users
        ] );

    }

    public function deleteAll() {
        ToDoItem::truncate();
        return redirect()->route('todo.index');

    }

    public function markAsUncompleted($id) {
        $todoItem = ToDoItem::find($id);
        $todoItem->status = 0;
        $todoItem->save();

        return redirect()->route('todo.index');
    }
}
