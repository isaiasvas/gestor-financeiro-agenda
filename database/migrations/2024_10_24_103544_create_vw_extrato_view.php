<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVwExtratoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Remove a view se ela existir
        DB::statement('DROP VIEW IF EXISTS vw_extrato');

        // Cria a nova view
        DB::statement('
            CREATE VIEW vw_extrato AS 
            SELECT 
                contasapagar.id AS id,
                contasapagar.vencimento AS DATA,
                contasapagar.tipolancamento AS tipo,
                contasapagar.valor AS valor 
            FROM 
                contasapagar
        ');
    }

    /**
     * Reverse as migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vw_extrato");
    }
    
}
