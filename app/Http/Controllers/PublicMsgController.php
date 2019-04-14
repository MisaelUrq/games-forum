<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PublicMsg;
use App\Blog;

class PublicMsgController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $user = \Auth::user();
        // TODO(Misael): Make a response to other messages.
        $msg = new PublicMsg;
        $msg->content = $request->input('content');
        $msg->key = $user->name . '_' . time();
        $msg->sender_id = $user->id;
        $msg->post_id = $request->input('post_id');;
        $msg->receiver_id = $request->input('post_id');
        $msg->likes = 0;
        $msg->type = 'P';
        $msg->post_date = date('y-m-d');
        $msg->save();

        return redirect('games/' . Blog::where('id', $msg->post_id)->first()->game_id . '/' . $msg->post_id);
    }
}
