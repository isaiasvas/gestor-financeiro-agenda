<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaodecreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartaodecredito', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->nullable();
            $table->string('dia_fechamento')->nullable();
            $table->string('dia_vencimento')->nullable();
            $table->string('limite')->nullable();
            $table->string('disponivel')->nullable();
            $table->string('agencia')->nullable();
            $table->string('numero')->nullable();
            $table->string('digito')->nullable();
            $table->string('tipo')->nullable();
            $table->string('situacao')->nullable();
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
