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
            $table->integer('ordem')->nullable();
            $table->string('room_type');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

       Schema::table('perguntas', function($table) {
       $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
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
