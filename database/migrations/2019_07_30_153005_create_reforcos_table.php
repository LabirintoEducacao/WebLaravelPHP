<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReforcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reforcos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('perg_id')->unsigned()->nullable();
            $table->string('tipo_perg_ref');
            $table->string('reforco');
            $table->string('ambiente_ref');
            $table->integer('tamanho_ref');
            $table->integer('largura_ref');
            $table->boolean('disp')->nullable();
            $table->string('room_type_ref');
            $table->timestamps();
        });
        Schema::table('reforcos', function($table) {
           $table->foreign('perg_id')->references('id')->on('perguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reforcos');
    }
}
