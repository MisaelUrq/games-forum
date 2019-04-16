<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\WebAdmin;
use App\Blog;
use App\PublicMsg;
use App\AdminGame;

class GamesController extends Controller
{
    // TODO(Misael): Maybe this function needs to be on a global controller, or a user controller.
    private function is_current_user_webadmin()
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

    private function is_current_user_webadmin_or_gameadmin($game_id)
    {
        $current_user = \Auth::user();
        if ($current_user !== null) {
            $admin = AdminGame::where('user_id', $current_user->id)->first();
            if (isset($admin) && $admin->id > 0 && $admin->game_id == $game_id) {
                return true;
            } else {
                return $this->is_current_user_webadmin();
            }
        }
        return false;
    }

    private function get_platforms_from_request(Request $request) {
        $platforms = ['platform_test4', 'platform_testone'];
        $game_platforms = '';
        $at_least_one_platform = false;

        $index = 0;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('name', 'asc')->get();
        $is_user_admin = $this->is_current_user_webadmin();
        return view('games.index', compact('games', 'is_user_admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $is_user_admin = $this->is_current_user_webadmin();
        return view('games.create', compact('is_user_admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            $game = new Game;
            $game->name = $request->input('title');
            $game->developer = $request->input('developer');
            $game->director = $request->input('director');
            $game->publisher = $request->input('publisher');
            $game->launch_date = $request->input('release_date');
            $game->image = 'no image';
            $game->platforms = $game_platforms;
            $game->ranking = 0;
            $game->save();

            return redirect('games');
        } else {
            /* TODO(Misael): We should display error messages. */
            return redirect('games/create', compact('request'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
        $posts = Blog::where('game_id', $id)->get();
        return view('games.show', compact('game', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);
        $is_user_admin = $this->is_current_user_webadmin();
        return view('games.create', compact('game', 'is_user_admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            $game->image = 'no image';
            $game->platforms = $game_platforms;
            $game->ranking = 0;
            $game->save();

            return redirect('games');
        } else {
            return redirect('games/create', compact('request'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Game::find($id)->delete();
        return redirect('games');
    }

    public function post($game_id, $post_id) {
        $game = Game::find($game_id);
        $post = Blog::find($post_id);
        $msgs = PublicMsg::where('post_id', $post_id)->get();
        $is_user_admin = $this->is_current_user_webadmin_or_gameadmin($game_id);

        if ($game !== null && $post !== null) {
            return view('blog.show', compact('game', 'post', 'msgs', 'is_user_admin'));
        }
        else {
            return redirect('games');
        }
    }
}
