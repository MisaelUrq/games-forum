<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(WebAdminSeeder::class);
        $this->call(GamesSeeder::class);
        $this->call(GamesAdminsSeeder::class);
    }
}
