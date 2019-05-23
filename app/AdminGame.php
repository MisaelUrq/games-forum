<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGame extends Model
{
    protected $table = "admins_games";
    protected $fillable = [
        'user_id', 'game_id'
    ];

    public static function is_user_admin_of_this_game($user_id, $game_id) {
        return AdminGame::where([['user_id', '=', $user_id],
                                 ['game_id', '=', $game_id]])->first();
    }

    public function users() {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
