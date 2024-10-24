<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contasapagar')->insert([
            'valor' => 1500,
            'vencimento' => now(),
            'pagamento' => 'a',
            'valorpago' => 'a',
            'pago' => 0,
            'categoria' => 5,
            'descricao' => 'a',
            'tipolancamento' => 1, //0 despesa, 1 receita
            'bancooucartao' => '1',
            'formapagamento' => '1',
            'clienteefornecedor' => '1',
        ]);
    }
}
