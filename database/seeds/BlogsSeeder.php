<?php

use Illuminate\Database\Seeder;
use App\Blog;
use App\User;
use App\Game;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->delete();

        Blog::create([
            'user_id' => User::where('name', 'normal user')->first()->id,
            'game_id' =>Game::where('name', 'test')->first()->id,
            'title' => 'How is Test so amazing?',
            'description' => 'This game is sooooo good.',
            'post_date' => '2019-12-12'
        ]);

        Blog::create([
            'user_id' => User::where('name', 'game admin')->first()->id,
            'game_id' => Game::where('name', 'test')->first()->id,
            'title' => 'Test is under testing',
            'description' => 'Buy the game, and now I\'m testing it.',
            'post_date' => '2019-12-12'
        ]);

        Blog::create([
            'user_id' => User::where('name', 'normal user')->first()->id,
            'game_id' => Game::where('name', 'test 2. The return of the tests!!')->first()->id,
            'title' => 'Will it be better that the original?',
            'description' => 'We can hope it is.',
            'post_date' => '2019-12-12'
        ]);
    }
}
