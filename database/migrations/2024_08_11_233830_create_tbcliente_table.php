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
        Schema::create('tbcliente', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeCliente');
            $table->string('emailCliente');
            $table->string('telefoneCliente');
            $table->string('senhaCliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbcliente');
    }
};
