<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('survey_question_id');
            $table->unsignedBigInteger('survey_answer_id');
            $table->timestamps();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('CASCADE');
            $table->foreign('survey_question_id')->references('id')->on('survey_questions')->onDelete('CASCADE');
            $table->foreign('survey_answer_id')->references('id')->on('survey_answers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_responses');
    }
}
