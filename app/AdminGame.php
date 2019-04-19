<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGame extends Model
{
    protected $table = "admins_games";

    public function users() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
