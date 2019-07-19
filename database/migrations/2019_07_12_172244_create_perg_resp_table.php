<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePergRespTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perg_resp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('perg_id')->unsigned();
            $table->bigInteger('resp_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('perg_resp', function($table) {
            $table->foreign('perg_id')->references('id')->on('perguntas');
            $table->foreign('resp_id')->references('id')->on('respostas');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perg_resp');
    }
}
