<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function games() {
        return $this->belongsTo('App\Games', 'id', 'game_id');
    }

    public function msgs() {
        return $this->hasMany('App\PublicMsg', 'post_id', 'id');
    }
}
