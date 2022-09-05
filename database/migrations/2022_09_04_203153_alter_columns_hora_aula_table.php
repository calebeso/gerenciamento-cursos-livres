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
        Schema::table('hora_aula', function (Blueprint $table) {
            $table->string('preparacao')->nullable()->change();
            $table->string('nota_fala')->nullable()->change();
            $table->string('nota_audicao')->nullable()->change();
            $table->string('nota_leitura')->nullable()->change();
            $table->string('nota_escrita')->nullable()->change();
            $table->string('observacoes')->nullable()->change();
            $table->unsignedBigInteger('licao_id')->nullable()->change();
            
            $table->dropForeign('hora_aula_licao_id_foreign');
            $table->foreign('licao_id')->references('id')->on('licao')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hora_aula', function (Blueprint $table) {
            $table->string('preparacao')->change();
            $table->string('nota_fala')->change();
            $table->string('nota_audicao')->change();
            $table->string('nota_leitura')->change();
            $table->string('nota_escrita')->change();
            $table->string('observacoes')->change();
            $table->unsignedBigInteger('licao_id')->change();
        });
    }
};
