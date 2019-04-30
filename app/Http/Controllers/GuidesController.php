<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Guides;

class GuidesController extends Controller
{
    public function create(Request $request) {
        $game = Game::find($request->input('game_id'));
        if (isset($game) && $game->id > 0) {
            return view('guides.create', compact('game'));
        } else {
            return redirect('home');
        }
    }

    public function show(Request $request) {
        $game = Game::find($request->input('game_id'));
        $guide = Guides::find($request->input('guide_id'));
        if (isset($game) && $game->id > 0 && isset($guide) && $guide->id > 0) {
            return view('guides.show', compact('game', 'guide'));
        } else {
            return redirect('home');
        }
    }

    public function destroy($guide_id) {
        Guides::find($guide_id)->delete();
        return redirect(url()->previous());
    }

    public function edit($id)
    {
        $guide = Guides::find($id);
        $game = Game::find($guide->game_id);
        return view('guides.create', compact('game', 'guide'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'guide-title' => 'required',
            'guide-description' => 'required',
            'guide-contents' => 'required',
            'game_id' => 'required'
        ]);

        $guide = Guides::find($id);
        $guide->title = $request->input('guide-title');
        $guide->description = $request->input('guide-description');
        $guide->contents = $request->input('guide-contents');
        $guide->game_id = $request->input('game_id');
        $guide->user_id = \Auth::user()->id;
        $guide->post_date = date('y-m-d');
        $guide->likes = 0;
        $guide->save();
        return redirect(url('/games/'.$guide->game_id));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'guide-title' => 'required',
            'guide-description' => 'required',
            'guide-contents' => 'required',
            'game_id' => 'required'
        ]);

        $guide = new Guides;
        $guide->title = $request->input('guide-title');
        $guide->description = $request->input('guide-description');
        $guide->contents = $request->input('guide-contents');
        $guide->game_id = $request->input('game_id');
        $guide->user_id = \Auth::user()->id;
        $guide->post_date = date('y-m-d');
        $guide->likes = 0;
        $guide->save();
        return redirect(url('/games/'.$guide->game_id));
    }
}
