<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiniCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('turma');
            $table->string('image');
            $table->integer('vagas');
            $table->string('descript');
            $table->string('category');
            $table->string('autors');
            $table->string('day');
            $table->string('hour');
            $table->string('hours');
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
        Schema::dropIfExists('mini_cursos');
    }
}
