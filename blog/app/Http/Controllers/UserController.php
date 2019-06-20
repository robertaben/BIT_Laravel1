<?php

namespace App\Http\Controllers;

use App\ToDoItem;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        $usersCount = User::count(); // grazina visu useriu kieki
        return view('users.index', ['users'=> $users], ['usersCount' => $usersCount]);
    }

    public function show($id) {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    public function edit($id) {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $_POST['name'];
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('users.index');
    }

    public function create() {
        return view('users.create');
    }

    public function store( Request $request ) {

        $user = new User();
        if ( isset( $request->name ) ) {
            $user->name= $request->input( 'name' );
        } else {
            return redirect()->route( 'users.create' );
        }

        $user->email= $request->email;
        $user->password= Hash::make( $request->input( 'password' ) );
        $user->save();

        $request->session()->flash('message', 'User was created successfuly!');

        return redirect()->route( 'users.index' );
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('message', 'User was succesfully deleted');
    }

    public function showTask($userId, $taskId) {
        $user = User::find($userId);
        $task = ToDoItem::find($taskId);

        return view('users.task', ['user'=> $user, 'task' => $task]);
    }
}
