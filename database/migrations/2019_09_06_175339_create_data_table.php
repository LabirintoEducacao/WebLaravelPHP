<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('data', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('user_id');
          $table->integer('maze_id');
          $table->integer('question_id')->nullable();
          $table->integer('answer_id')->nullable();
          $table->integer('wrong_count')->nullable();
          $table->integer('correct_count')->nullable();
          $table->boolean('correct')->nullable();
          $table->integer('elapsed_time');
          $table->integer('answers_read_count')->nullable();
          $table->time('async_timestamp')->nullable();
          $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
