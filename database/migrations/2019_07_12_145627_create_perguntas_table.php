<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sala_id')->unsigned()->nullable();
            $table->string('tipo_perg');
            $table->string('pergunta');
            $table->string('ambiente_perg');
            $table->integer('tamanho');
            $table->integer('largura');
            $table->integer('prox_perg');
            $table->boolean('disp');
            $table->timestamps();
        });

       Schema::table('perguntas', function($table) {
       $table->foreign('sala_id')->references('id')->on('salas');
       });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perguntas');
    }
}
