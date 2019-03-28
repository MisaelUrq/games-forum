<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\WebAdmin;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::All();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_user = \Auth::user();
        $is_admin = null;

        if ($current_user !== null) {
            $is_admin = WebAdmin::where('user_id', $current_user->id)->first();

        }
        return view('games.create', compact('is_admin'));
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
            return redirect('games/create');
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
        return 'Show games not implemented';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'Edit games not implemented';
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
        return 'Update games not implemented';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'Destroy games not implemented';
    }
}
