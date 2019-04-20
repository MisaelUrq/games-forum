<?php

use Illuminate\Database\Seeder;
use App\Guides;
use App\Game;
use App\User;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guides')->delete();

        Guides::create([
            'title' => 'The ultimate Test guide!',
            'description' => 'Just a test guide for Test',
            'contents' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse imperdiet luctus leo vitae interdum. Suspendisse potenti. Duis semper, justo at pretium elementum, nisi diam accumsan nunc, vel varius augue justo a eros. Duis sollicitudin tellus sed nibh vehicula dignissim. Pellentesque aliquet dolor nec est ultricies, vitae placerat justo convallis. Vivamus enim augue, vestibulum eget euismod quis, faucibus ut nisi. Curabitur nec pulvinar turpis. Donec eget ligula facilisis mi dictum posuere nec et tellus. Quisque ultricies dolor enim, sit amet dictum eros elementum sit amet. Aliquam sed tincidunt metus. Vivamus malesuada interdum erat, id auctor diam pharetra id.',
            'game_id' => Game::where('name', 'test')->first()->id,
            'user_id' => User::where('name', 'normal user')->first()->id,
            'post_date' => date('y-m-d'),
            'likes' => 0
        ]);
    }
}
