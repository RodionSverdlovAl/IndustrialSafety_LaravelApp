<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mark');
            $table->timestamps();

            $table->index('test_id', 'assessment_test_idx');
            $table->foreign('test_id', 'assessment_test_fk')
                ->on('tests')->references('id');

            $table->index('user_id', 'assessment_user_idx');
            $table->foreign('user_id', 'assessment_user_fk')
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
        Schema::dropIfExists('assessments');
    }
}
