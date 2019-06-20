<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function todoItem() {
        return $this->hasOne('App\TodoItem', 'id', 'todo_id');
    }
}
