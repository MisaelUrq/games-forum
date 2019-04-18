<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Blog;

class BlogsController extends Controller
{
    public function create(Request $request)
    {
        $game = Game::find($request->input('game_id'));
        if (isset($game) && $game->id > 0) {
            return view('blog.create', compact('game'));
        } else {
            return redirect('home');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'game_id' => 'required',
            'post_title'=> 'required',
            'post_description' => 'required',
        ]);

        $post = new Blog;
        $post->title = $request->input('post_title');
        $post->game_id = $request->input('game_id');
        $post->user_id = \Auth::user()->id;
        $post->description = $request->input('post_description');
        $post->post_date = date('y-m-d');
        $post->save();

        return redirect('games/'.$post->game_id.'/'.$post->id);
    }

    public function destroy($id)
    {
        //
    }
}
