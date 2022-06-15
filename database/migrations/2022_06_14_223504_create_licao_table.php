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
        Schema::create('licao', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 20); 
            $table->unsignedBigInteger('livro_id');

            $table->foreign('livro_id')->references('id')->on('livro')->onDelete('cascade');
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
        Schema::dropIfExists('licao');
    }
};
