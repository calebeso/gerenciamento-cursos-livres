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
        Schema::table('turma', function (Blueprint $table) {
            $table->unsignedBigInteger('livro_id')->nullable()->change();
            $table->dropForeign('turma_livro_id_foreign');
            $table->foreign('livro_id')->references('id')->on('livro')
            ->onDelete('set null');
            //$table->bigInteger('livro_id')->nullable()->constrained()->change();
            //->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turma', function (Blueprint $table) {
            $table->bigInteger('livro_id')->nullable(false)->constrained()->change();
        });
    }
};
