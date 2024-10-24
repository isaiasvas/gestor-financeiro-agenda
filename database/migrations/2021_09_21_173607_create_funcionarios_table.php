<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); //ok
            $table->string('sexo')->nullable(); //ok
            $table->string('estadocivil')->nullable(); //ok
            $table->string('deficiencia')->nullable(); //ok
            $table->date('nascimento'); //ok
            $table->string('nacionalidade')->nullable(); //ok
            $table->string('grau_instrucao')->nullable();  //ok 
            $table->string('formacao')->nullable(); //ok
            $table->string('nome_mae')->nullable(); //ok
            $table->string('nome_pai')->nullable();//ok
            $table->string('cpf')->nullable();  //ok
            $table->string('pis_nis')->nullable(); //ok
            $table->string('rg')->nullable();  //ok
            $table->string('tituloeleitor')->nullable();   //ok          
            $table->string('tituloeleitor_secao')->nullable();//ok
            $table->string('tituloeleitor_zonaeleitoral')->nullable();//ok
            $table->string('carteiradetrabalho_numero')->nullable();//ok
            $table->string('carteiradetrabalho_serie')->nullable();//ok
            $table->date('carteiradetrabalho_emissao')->nullable();//ok
            $table->string('carteiradetrabalho_uf')->nullable();//ok
            $table->string('passaporte_numero')->nullable(); //ok
            $table->date('passaporte_validadedovisto')->nullable();
            $table->string('tel_fixo')->nullable(); //ok
            $table->string('tel_celular1')->nullable(); //ok
            $table->string('tel_celular2')->nullable(); //ok
            $table->string('cep')->nullable(); //ok
            $table->string('endereco')->nullable(); //ok
            $table->string('municipio')->nullable(); //ok
            $table->string('estado')->nullable(); //ok
            $table->string('filhos')->nullable(); //ok
            $table->string('conjuge')->nullable();//ok
            $table->string('conjuge_tel')->nullable();//ok
            $table->string('salario_inicial')->nullable(); //ok
            $table->string('salario_atual')->nullable();  //ok
            $table->date('data_admissao')->nullable(); //ok
            $table->date('data_demissao')->nullable(); //ok
            $table->string('cargo')->nullable();  //ok
            $table->string('forma_pagamento')->nullable(); //ok
            $table->string('data_salario')->nullable(); //ok
            $table->string('banco')->nullable(); //ok
            $table->string('agencia')->nullable(); //ok
            $table->string('conta')->nullable(); //ok
            $table->string('operacao')->nullable(); //ok
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
        Schema::dropIfExists('funcionarios');
    }
}
