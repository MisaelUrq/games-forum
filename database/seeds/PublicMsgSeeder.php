<?php

use Illuminate\Database\Seeder;
use App\Blog;
use App\User;
use App\Game;
use App\PublicMsg;

class PublicMsgSeeder extends Seeder
{
    public function run()
    {
        DB::table('public_msgs')->delete();

        $first_test = Blog::where('title', 'Will it be better that the original?')->first();
        PublicMsg::create([
            'content' => 'this is the first test message.',
            'key' => 'test1',
            'sender_id' => User::where('name', 'game admin')->first()->id,
            'post_id' => $first_test->id,
            'receiver_id' => $first_test->id,
            'likes' => 200,
            'type' => 'P',
            'post_date' => '2020-12-12'
        ]);

        $second_test = Blog::where('title', 'Will it be better that the original?')->first();
        PublicMsg::create([
            'content' => 'this is the second test message.',
            'key' => 'test2',
            'sender_id' => User::where('name', 'normal user')->first()->id,
            'receiver_id' => $second_test->id,
            'post_id' => $second_test->id,
            'likes' => 100,
            'type' => 'P',
            'post_date' => '2020-12-12'
        ]);

        PublicMsg::create([
            'content' => 'this is the first response message. To the second message',
            'key' => 'respone1',
            'sender_id' => User::where('name', 'normal user')->first()->id,
            'receiver_id' => PublicMsg::where('key', 'test2')->first()->id,
            'post_id' => $second_test->id,
            'likes' => 300,
            'type' => 'M',
            'post_date' => '2020-12-12'
        ]);
    }
}
