<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebancooucartaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancooucartao', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->nullable();
            $table->unsignedBigInteger('contabancaria_id');
            $table->unsignedBigInteger('cartaodecredito_id');
            $table->foreign('contabancaria_id')->references('id')->on('contasbancarias');
            $table->foreign('cartaodecredito_id')->references('id')->on('cartaodecredito');
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
        Schema::dropIfExists('cartaodecredito');
    }
}
