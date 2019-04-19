<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebAdmin extends Model
{
    protected $table = "web_admins";

    public function users() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
