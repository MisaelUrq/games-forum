<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function games() {
        return $this->belongsTo('App\Game', 'game_id', 'id');
    }

    public function msgs() {
        return $this->hasMany('App\PublicMsg', 'post_id', 'id');
    }
}
