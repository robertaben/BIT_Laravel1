<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoItem extends Model
{
    protected $table = "todo";

    public function user() {

        return $this->hasOne('App\User', 'id','user_id');
    }
}
