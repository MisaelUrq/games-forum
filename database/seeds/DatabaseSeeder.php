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
        $this->call(BlogsSeeder::class);
        $this->call(PublicMsgSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(GuideSeeder::class);
    }
}
