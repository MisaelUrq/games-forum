<?php

use Illuminate\Database\Seeder;

use App\User;
use App\WebAdmin;

class WebAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('web_admins')->delete();

        $user = User::where('name', 'root')->first();
        WebAdmin::create([
            'user_id' => $user->id
        ]);
    }
}
