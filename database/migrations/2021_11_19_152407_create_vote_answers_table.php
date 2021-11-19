<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoteAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vote_option_id');
            // $table->unsignedBigInteger('user_id');
            $table->string('email')->unique();
            $table->string('answer');
            $table->timestamps();
            $table->foreign('vote_option_id')->references('id')->on('vote_options')->onDelete('CASCADE');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_answers');
    }
}
