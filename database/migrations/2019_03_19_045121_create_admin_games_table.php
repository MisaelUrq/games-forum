<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminGamesTable extends Migration
{
    public function up()
    {
        Schema::create('admins_games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('game_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins_games');
    }
}
