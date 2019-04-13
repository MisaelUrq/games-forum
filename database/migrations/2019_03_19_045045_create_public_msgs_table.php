<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicMsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_msgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->mediumText('content');
            $table->integer('sender_id');
            $table->integer('post_id');
            $table->char('type');
            $table->integer('receiver_id');
            $table->integer('likes');
            $table->date('post_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('public_msgs');
    }
}
