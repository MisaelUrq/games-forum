<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebAdmin extends Model
{
    protected $table = "web_admins";
    protected $fillable = [
        'user_id'
    ];

    public static function is_user_webadmin($user_id) {
        return WebAdmin::where('user_id', $user_id)->first();
    }

    public function users() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
