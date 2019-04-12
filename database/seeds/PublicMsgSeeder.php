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

        // TODO(Misael): Find a better way to tag the public_msgs to
        // find them in a easy way.
        PublicMsg::create([
            'content' => 'this is the first test message.',
            'name' => 'test1',
            'sender_id' => User::where('name', 'game admin')->first()->id,
            'receiver_id' => Blog::where('title', 'Will it be better that the original?')->first()->id,
            'likes' => 0,
            'type' => 'P',
            'post_date' => '2020-12-12'
        ]);

        PublicMsg::create([
            'content' => 'this is the second test message.',
            'name' => 'test2',
            'sender_id' => User::where('name', 'normal user')->first()->id,
            'receiver_id' => Blog::where('title', 'Will it be better that the original?')->first()->id,
            'likes' => 0,
            'type' => 'P',
            'post_date' => '2020-12-12'
        ]);

        PublicMsg::create([
            'content' => 'this is the first response message. To the first message',
            'name' => 'respone1',
            'sender_id' => User::where('name', 'normal user')->first()->id,
            'receiver_id' => PublicMsg::where('name', 'test2');,
            'likes' => 0,
            'type' => 'M',
            'post_date' => '2020-12-12'
        ]);
    }
}
