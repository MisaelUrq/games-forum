<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function game() {
        return $this->belongsTo('App\Games', 'id', 'game_id');
    }
}
