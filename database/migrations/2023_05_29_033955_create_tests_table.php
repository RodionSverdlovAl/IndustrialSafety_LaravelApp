<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // название теста
            $table->unsignedBigInteger('owner_id');
            $table->text('user_ids')->json(); // подписанные пользователи
            $table->unsignedBigInteger('period'); // период теста
            $table->timestamps();

            $table->index('owner_id', 'test_owner_idx');
            $table->foreign('owner_id', 'test_owner_fk')
                ->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
