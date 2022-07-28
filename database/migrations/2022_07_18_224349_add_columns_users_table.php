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
        Schema::table('users', function (Blueprint $table) {
            $table->string('login');
            $table->string('cpf', 15);
            $table->string('rg', 20);
            $table->string('telefone', 20);
            $table->string('endereco', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('login');
            $table->dropColumn('cpf');
            $table->dropColumn('rg');
            $table->dropColumn('telefone');
            $table->dropColumn('endereco');
        });
    }
};
