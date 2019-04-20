<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function guides() {
        return $this->hasMany('App\Guides', 'game_id', 'id');
    }

    public function posts() {
        return $this->hasMany('App\Blog', 'game_id', 'id');
    }
}
