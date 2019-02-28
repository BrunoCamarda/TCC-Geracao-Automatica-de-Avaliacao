<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestaoAssuntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questao_assunto', function (Blueprint $table) {
            $table->integer('id_questao')->unsigned();
            $table->integer('id_assunto')->unsigned();
            $table->foreign('id_questao')->references('id')->on('questao')->onDelete('cascade');
            $table->foreign('id_assunto')->references('id')->on('assunto')->onDelete('cascade');
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
        Schema::dropIfExists('questao_assunto');
    }
}
