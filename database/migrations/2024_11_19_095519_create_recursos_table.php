<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_disciplina');
            $table->unsignedBigInteger('id_aluno');
            $table->string('status')->nullable();;
            $table->date('data_inscricao')->nullable();;
            $table->string('ano_lectivo');
            $table->foreign('id_disciplina')->references('id')->on('disciplinas');
            $table->foreign('id_aluno')->references('id')->on('alunos');
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
        Schema::dropIfExists('recursos');
    }
};
