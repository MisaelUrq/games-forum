<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicMsg extends Model
{
    //

    public static function get_receiver_msg_from_response_msg($msg) {
        return PublicMsg::where('id', $msg->receiver_id)->first();
    }

    public static function get_receiver_user_from_response_msg($msg) {
        return User::where('id', PublicMsg::get_receiver_msg_from_response_msg($msg)->sender_id)->first();
    }

    public function post() {
        return $this->belongsTo('App\Blog', 'id', 'post_id');
    }
}
