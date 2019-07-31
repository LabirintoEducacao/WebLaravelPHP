<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefRespTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_resp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ref_id')->unsigned()->nullable();
            $table->bigInteger('resp_id')->unsigned()->nullable();
            $table->timestamps();
        });
        
        Schema::table('ref_resp', function($table) {
            $table->foreign('ref_id')->references('id')->on('reforcos')->onDelete('cascade');
            $table->foreign('resp_id')->references('id')->on('respostas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_resp');
    }
}
