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
        Schema::create('responsavel_aluno', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsavel_id');
            $table->unsignedBigInteger('aluno_id');

            $table->foreign('responsavel_id')->references('id')->on('responsavel');
            $table->foreign('aluno_id')->references('id')->on('aluno');
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
        Schema::dropIfExists('responsavel_aluno');
    }
};
