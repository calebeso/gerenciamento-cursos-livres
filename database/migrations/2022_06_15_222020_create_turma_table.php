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
        Schema::create('turma', function (Blueprint $table) {
            $table->id();
            $table->string('idioma', 20);
            $table->string('modalidade', 20);
            $table->string('dias_semana', 20);
            $table->string('horario', 20);
            $table->string('status', 20);
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('livro_id')->references('id')->on('livro');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('turma');
    }
};
