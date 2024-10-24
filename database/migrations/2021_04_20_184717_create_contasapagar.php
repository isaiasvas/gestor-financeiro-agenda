<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasapagar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contasapagar', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor');
            $table->date('vencimento');
            $table->date('pagamento')->nullable();
            $table->float('valorpago')->nullable();
            $table->boolean('pago');
            $table->integer('categoria');
            $table->string('descricao');
            $table->string('documento');
            $table->string('observacao')->nullable();
            $table->boolean('tipolancamento'); //0 despesa, 1 receita
            $table->string('bancooucartao');
            $table->integer('formapagamento');
            $table->integer('clienteefornecedor');
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
        Schema::dropIfExists('contasapagar');
    }
}
