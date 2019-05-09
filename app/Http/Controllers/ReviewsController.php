<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Review;

class ReviewsController extends Controller
{
    public function create(Request $request) {
        $game = Game::find($request->input('game_id'));
        if (isset($game) && $game->id > 0) {
            return view('reviews.create', compact('game'));
        } else {
            return redirect('home');
        }
    }

    public function show(Request $request) {
        $game = Game::find($request->input('game_id'));
        $review = Review::find($request->input('review_id'));
        if (isset($game) && $game->id > 0 && isset($review) && $review->id > 0) {
            return view('reviews.show', compact('game', 'review'));
        } else {
            return redirect('home');
        }
    }

    public function destroy($review_id) {
        Review::find($review_id)->delete();
        return redirect(url()->previous());
    }

    public function edit($id)
    {
        $review = Review::find($id);
        $game = Game::find($review->game_id);
        return view('reviews.create', compact('game', 'review'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'review-title' => 'required',
            'review-description' => 'required',
            'review-contents' => 'required',
            'game_id' => 'required'
        ]);

        $review = Review::find($id);
        $review->title = $request->input('review-title');
        $review->description = $request->input('review-description');
        $review->contents = $request->input('review-contents');
        $review->game_id = $request->input('game_id');
        $review->user_id = \Auth::user()->id;
        $review->post_date = date('y-m-d');
        $review->save();
        return redirect(url('/games/'.$review->game_id));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'review-title' => 'required',
            'review-description' => 'required',
            'review-contents' => 'required',
            'game_id' => 'required'
        ]);

        $review = new Review;
        $review->title = $request->input('review-title');
        $review->description = $request->input('review-description');
        $review->contents = $request->input('review-contents');
        $review->game_id = $request->input('game_id');
        $review->user_id = \Auth::user()->id;
        $review->post_date = date('y-m-d');
        $review->save();
        return redirect(url('/games/'.$review->game_id));
    }
}
