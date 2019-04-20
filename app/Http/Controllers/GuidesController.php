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
}
