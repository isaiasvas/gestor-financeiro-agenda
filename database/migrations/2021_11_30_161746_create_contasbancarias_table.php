<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasbancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contasbancarias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('agencia')->nullable();
            $table->string('numero')->nullable();
            $table->string('digito')->nullable();
            $table->string('descricao')->nullable();
            $table->string('situacao')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contasbancarias');
    }
}
