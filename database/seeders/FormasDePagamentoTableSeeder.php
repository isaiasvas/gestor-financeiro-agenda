<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormasDePagamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formasdepagamento')->insert([
            'descricao'=>'Débito em Conta',
            'sigla'=> 'DC',
        ]);

        DB::table('formasdepagamento')->insert([
            'descricao'=>'Cartão de Crédito',
            'sigla'=> 'CC',
        ]);

        DB::table('formasdepagamento')->insert([
            'descricao'=>'Boleto Bancario',
            'sigla'=> 'BO',
        ]);

        DB::table('formasdepagamento')->insert([
            'descricao'=>'Depósito',
            'sigla'=> 'DP',
        ]);

        DB::table('formasdepagamento')->insert([
            'descricao'=>'Dinheiro',
            'sigla'=> 'DN',
        ]);

        DB::table('formasdepagamento')->insert([
            'descricao'=>'Transfêrencia',
            'sigla'=> 'TR',
        ]);

        DB::table('formasdepagamento')->insert([
            'descricao'=>'PIX',
            'sigla'=> 'PIX',
        ]);
    }
}
