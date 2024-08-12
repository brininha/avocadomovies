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
        Schema::create('tbfilme', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeFilme');
            $table->string('capaFilme');
            $table->string('descFilme');
            $table->unsignedBigInteger('idGenero');
            $table->unsignedBigInteger('idGenero');
            $table->foreign('idGenero')->references('id')->on('tbgenero')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbfilme');
    }
};
