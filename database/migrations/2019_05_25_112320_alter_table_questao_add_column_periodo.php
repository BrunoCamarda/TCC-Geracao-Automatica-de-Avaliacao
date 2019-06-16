<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableQuestaoAddColumnPeriodo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questao', function (Blueprint $table) {
            $table->integer('ano')->unsigned()->nullable();
            $table->integer('periodo')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questao', function (Blueprint $table) {
            $table->dropColumn('ano');
            $table->dropColumn('periodo');
        });
    }
}
