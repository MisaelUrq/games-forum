<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\SoftDeletes;

use App\WebAdmin;
use App\AdminGame;

class User extends Authenticatable
{
    use Notifiable;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'age', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function is_current_user_webadmin()
    {
        $current_user = \Auth::user();
        if ($current_user !== null) {
            $admin = WebAdmin::where('user_id', $current_user->id)->first();
            if (isset($admin) && $admin->id > 0) {
                return true;
            }
        }
        return false;
    }

    public static function make_gameadmin($user_id, $game_id) {
        AdminGame::create([
            'user_id' => $user_id,
            'game_id' => $game_id
        ]);
    }

    public static function make_webadmin($user_id) {
        WebAdmin::create([
            'user_id' => $user_id
        ]);
    }

    public static function is_current_user_webadmin_or_gameadmin($game_id)
    {
        $current_user = \Auth::user();
        if ($current_user !== null) {
            $admin = AdminGame::where('user_id', $current_user->id)->first();
            if (isset($admin) && $admin->id > 0 && $admin->game_id == $game_id) {
                return true;
            } else {
                return User::is_current_user_webadmin();
            }
        }
        return false;
    }

    public function posts() {
        return $this->hasMany('App\Blog', 'user_id', 'id');
    }

    public function guides() {
        return $this->hasMany('App\Guides', 'user_id', 'id');
    }

    public function reviews() {
        return $this->hasMany('App\Review', 'user_id', 'id');
    }

    public function games_admin() {
        return $this->hasMany('App\AdminGame', 'user_id', 'id');
    }

    public function web_admin() {
        return $this->hasOne('App\WebAdmin', 'user_id', 'id');
    }

    public function private_messages_send() {
        return $this->hasMany('App\PrivateMsg', 'sender_id', 'id');
    }

    public function private_messages_received() {
        return $this->hasMany('App\PrivateMsg', 'receiver_id', 'id');
    }


}
