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
        Schema::create('hora_aula', function (Blueprint $table) {
            $table->id();
            $table->string('presenca', 16);
            $table->string('tarefa', 16);
            $table->string('preparacao', 16);
            $table->string('nota_fala', 2);
            $table->string('nota_audicao', 2);
            $table->string('nota_leitura', 2);
            $table->string('nota_escrita', 2);
            $table->string('observacoes', 250);
            $table->unsignedBigInteger('diario_aula_id');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('licao_id');

            $table->foreign('diario_aula_id')->references('id')->on('diario_aula');
            $table->foreign('aluno_id')->references('id')->on('aluno');
            $table->foreign('livro_id')->references('id')->on('livro');
            $table->foreign('licao_id')->references('id')->on('licao');
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
        Schema::dropIfExists('hora_aula');
    }
};
