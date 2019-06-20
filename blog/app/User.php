<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function todoItems() {
        return $this->hasMany('App\ToDoItem', 'user_id','id');
    }

    public function comments() {
        return$this->hasMany('App\Comment', 'user_id', 'id');
    }

    public function todoItemsUndone() {
        return ToDoItem::where('user_id', $this->id)->where('status', 0);
    }

    public function todoItemsDone() {
        return ToDoItem::where('user_id', $this->id)->where('status', 1)->get();
    }
}
