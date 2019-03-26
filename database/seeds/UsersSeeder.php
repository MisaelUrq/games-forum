<?php

use Illuminate\Database\Seeder;
use App\User;
use App\AdminGame;
use App\WebAdmin;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'root',
            'age' => 0,
            'image' => 'no image',
            'email' => 'root@gameforum.com',
            'password' => Hash::make('root123456'),
        ]);

        User::create([
            'name' => 'game admin',
            'age' => 22,
            'image' => 'no image',
            'email' => 'test@gameadmin.com',
            'password' => Hash::make('789465'),
        ]);

        User::create([
            'name' => 'normal user',
            'age' => 25,
            'image' => 'no image',
            'email' => 'test@test.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
