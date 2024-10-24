<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'categoria' => 'Ajuste de Saldo',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => null, // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Receitas',
            'tipolancamento' => 1, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => null, // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Pessoal',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => null, // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Academia',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '3', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Salário',
            'tipolancamento' => 1, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '2', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Pró-Labore',
            'tipolancamento' => 1, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '2', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Dividendos',
            'tipolancamento' => 1, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '2', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);



        DB::table('categorias')->insert([
            'categoria' => 'Salão',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '3', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Presentes',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '3', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Vestuário',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '3', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Moradia',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => null, // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Aluguel',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '11', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Energia',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '11', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Água',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '11', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Limpeza',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '11', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Transporte',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => null, // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Combustível',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '16', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Seguro',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '16', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Manutenção',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '16', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Taxi/Uber/99',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '16', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Despesas Bancária',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => null, // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Fatura',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '21', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('categorias')->insert([
            'categoria' => 'Manutenção',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '21', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Juros e Taxas',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '21', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Alimentação',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => null, // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('categorias')->insert([
            'categoria' => 'Restaurante',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '25', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Mercado',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '25', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Padaria',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '25', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Restaurante',
            'tipolancamento' => null, // receita 1, despesa 2
            'descricao' => null,
            'bancooucartao' => null, // Banco do Brasil 1 , Caixa Federal Economica 2, Santander 3, Bradesco 4
            'formapagamento' => null, // Dinheiro 1, Debito 2 , Credito 3, Pix 4
            'clienteefornecedor' => null, // Rodrigo Lucio 1 , Isaias 2
            'categoria_id' => '25', // null == Pai
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
