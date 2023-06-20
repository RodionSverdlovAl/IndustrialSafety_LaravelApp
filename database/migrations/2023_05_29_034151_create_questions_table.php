<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id'); // к какому тесту он отностится
            $table->string('title'); // сам вопрос
            $table->text('variants')->json(); // текст с вариантами ответов
            $table->string('answer'); // правильный ответ
            $table->timestamps();

            $table->index('test_id', 'question_test_idx');
            $table->foreign('test_id', 'question_test_fk')
                ->on('tests')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
