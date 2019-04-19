<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(\Auth::user()->id);
        $posts = $user->posts()->get();
        $guides = $user->guides()->get();
        $admin_of_games = $user->games_admin()->get();
        $reviews = $user->reviews()->get();
        return view('home', compact('posts', 'guides', 'reviews', 'admin_of_games'));
    }
}
