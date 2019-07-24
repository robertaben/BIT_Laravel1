<?php

namespace App\Http\Controllers;

use App\ToDoItem;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function update(UserRequest $request, $id) {
        $user = User::find( $id );

        $user->name  = $_POST['name'];
        $user->name  = $request->input( 'name' );
        $user->email = $request->input( 'email' );

        if($request->hasFile('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();

            //Storage::delete($user->avatar);
            $path = $request->file('avatar')->storeAs(
                'public/avatars', $request->user()->id . '.' . $extension
            );
            $user->avatar = $path;
        }

        // issaugome informaciija duombazeje
        $user->save();

        return redirect()->route( 'users.index' );
    }

    public function create() {
        return view('users.create');
    }

    public function store( UserRequest $request ) {

        $user = new User();
        if ( isset( $request->name ) ) {
            $user->name = $request->input( 'name' );
        } else {
            return redirect()->route( 'users.create' );
        }

        $user->email    = $request->email;

        $user->password = Hash::make( $request->input( 'password' ) );

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
