<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMsg extends Model
{
    public function senders() {
        return $this->belongsTo('App\User', 'id', 'sender_id');
    }

    public function receivers() {
        return $this->belongsTo('App\User', 'id', 'receiver_id');
    }

    public static function get_all_messages_from($user_id) {
        return PrivateMsg::where('sender_id', $user_id)->orWhere('receiver_id', $user_id)->get()->orderBy('date', 'asc');
    }
}
