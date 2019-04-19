<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    // use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
