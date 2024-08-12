<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbcontato', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeContato');
            $table->string('emailContato');
            $table->string('telefoneContato');
            $table->string('assuntoContato');
            $table->string('mensagemContato');
            $table->date('dataContato')->default(Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbcontato');
    }
};
