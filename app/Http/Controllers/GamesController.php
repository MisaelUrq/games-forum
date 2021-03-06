<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use App\Blog;
use App\PublicMsg;

class GamesController extends Controller
{
    private function get_platforms_from_request(Request $request) {
        $platforms = ['platform_test4', 'platform_testone'];
        $game_platforms = '';
        $at_least_one_platform = false;

        foreach ($platforms as $platform) {
            if (isset($request[$platform])) {
                $at_least_one_platform = true;
                $game_platforms = $game_platforms . $platform . '/';
            }
        }

        if ($at_least_one_platform) {
            return $game_platforms;
        } else {
            return null;
        }
    }

    public function index()
    {
        $games = Game::orderBy('name', 'asc')->get();
        $is_user_admin = User::is_current_user_webadmin();
        return view('games.index', compact('games', 'is_user_admin'));
    }

    public function create()
    {
        $is_user_admin = User::is_current_user_webadmin();
        return view('games.create', compact('is_user_admin'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'director' => 'required',
            'developer'=> 'required',
            'publisher' => 'required',
            'release_date' => 'required',
            'game_img' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $game_platforms = $this->get_platforms_from_request($request);
        if (isset($game_platforms)) {
            $game = new Game;
            $game->name = $request->input('title');
            $game->developer = $request->input('developer');
            $game->director = $request->input('director');
            $game->publisher = $request->input('publisher');
            $game->launch_date = $request->input('release_date');
            $game->image = explode('games_covers', $request->file('game_img')->storePublicly('public/games_covers'))[1];
            $game->platforms = $game_platforms;
            $game->ranking = 0;
            $game->save();

            return redirect('games');
        } else {
            return redirect('games/create', compact('request'));
        }
    }

    public function show($id)
    {
        $game = Game::with(['guides', 'posts', 'reviews'])->where('games.id', $id)->get()->first();
        if (isset($game) && $game->id) {
            return view('games.show', compact('game'));
        } else {
            return redirect('games');
        }
    }

    public function edit($id)
    {
        $game = Game::find($id);
        $is_user_admin = User::is_current_user_webadmin();
        return view('games.create', compact('game', 'is_user_admin'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'director' => 'required',
            'developer'=> 'required',
            'publisher' => 'required',
            'release_date' => 'required'
        ]);

        $game_platforms = $this->get_platforms_from_request($request);

        if (isset($game_platforms)) {
            $game = Game::find($id);

            $game->name = $request->input('title');
            $game->developer = $request->input('developer');
            $game->director = $request->input('director');
            $game->publisher = $request->input('publisher');
            $game->launch_date = $request->input('release_date');
            if ($request->hasFile('game_img')) {
                if (strcmp('no image', $game->image) != 0) {
                    Storage::delete('storage/games_covers/'.$game->image);
                }
                $game->image = explode('games_covers', $request->file('game_img')->storePublicly('public/games_covers'))[1];
            }
            $game->platforms = $game_platforms;
            $game->ranking = 0;
            $game->save();

            return redirect('games');
        } else {
            return redirect('games/create', compact('request'));
        }
    }
    public function destroy($id)
    {
        $game =  Game::find($id);
        if (strcmp('no image', $game->image) != 0) {
            Storage::delete('storage/games_covers/'.$game->image);
        }
        $game->delete();
        return redirect('games');
    }

    public function post($game_id, $post_id) {
        $post = Blog::find($post_id);
        $game = Game::find($game_id);
        $msgs = $post->msgs()->get();
        $is_user_admin = User::is_current_user_webadmin_or_gameadmin($game_id);

        if ($game !== null && $post !== null) {
            return view('blog.show', compact('game', 'post', 'msgs', 'is_user_admin'));
        }
        else {
            return redirect('games');
        }
    }
}
