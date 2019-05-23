<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaoQuestaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_questao', function (Blueprint $table) {
            $table->integer('id_questao')->unsigned();
            $table->integer('id_avaliacao')->unsigned();
            $table->foreign('id_questao')->references('id')->on('questao')->onDelete('cascade');
            $table->foreign('id_avaliacao')->references('id')->on('avaliacao')->onDelete('cascade');
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
        Schema::dropIfExists('avaliacao_questao');
    }
}
