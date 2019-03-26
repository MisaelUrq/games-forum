<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Game;
use App\AdminGame;

class GamesAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminGame::create([
            'user_id' => User::where('name', 'game admin')->first()->id,
            'game_id' => Game::where('name', 'test')->first()->id
        ]);
    }
}
