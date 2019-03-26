<?php

use Illuminate\Database\Seeder;
use App\Game;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->delete();

        Game::create([
            'name' => 'test',
            'developer' => 'testing',
            'director' => 'tester',
            'publisher' => 'testers unided',
            'launch_date' => '2019-12-12',
            'image' => 'no image',
            'ranking' => 1,
            'platforms' => 'TEST4/TEST ONE',
        ]);

        Game::create([
            'name' => 'test 2. The return of the tests!!',
            'developer' => 'testing',
            'director' => 'tester',
            'publisher' => 'testers unided',
            'launch_date' => '2021-12-12',
            'image' => 'no image',
            'ranking' => 1,
            'platforms' => 'TEST5/TEST SUPER ONE',
        ]);
    }
}
