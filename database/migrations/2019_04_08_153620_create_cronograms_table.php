<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronograms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('title');
            $table->string('instituicao')->nullable();
            $table->string('auxiliares')->nullable();
            $table->string('local')->nullable();
            $table->string('ministrante')->nullable();
            $table->string('turma_minicurso')->nullable();
            $table->string('monitor')->nullable();
            $table->time('horario_inicio');
            $table->time('horario_fim');
            $table->date('dia_mes');
            $table->string('dia_semana');
            $table->char('curso', 4)->nullable();
            $table->string('cor')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('cronograms');
    }
}
