<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'sexo',
        'estadocivil',
        'deficiencia',
        'nascimento',
        'nacionalidade',
        'grau_instrucao',
        'formacao',
        'nome_mae',
        'nome_pai',
        'cpf',
        'pis_nis',
        'rg',
        'tituloeleitor',
        'tituloeleitor_secao',
        'tituloeleitor_zonaeleitoral',
        'carteiradetrabalho_numero',
        'carteiradetrabalho_serie',
        'carteiradetrabalho_emissao',
        'carteiradetrabalho_uf',
        'passaporte_numero',
        'passaporte_validadedovisto',
        'tel_fixo',
        'tel_celular1',
        'tel_celular2',
        'cep',
        'endereco',
        'municipio',
        'estado',
        'filhos',
        'conjuge',
        'conjuge_tel',
        'salario_inicial',
        'salario_atual',
        'data_admissao',
        'data_demissao',
        'cargo',
        'forma_pagamento',
        'data_salario',
        'banco',
        'agencia',
        'conta',
        'operacao',
        'updated_at',
        'created_at',
    ];


    protected $casts = [

        'nascimento' => 'datetime',
        'carteiradetrabalho_emissao' => 'datetime',
        'passaporte_validadedovisto' => 'datetime',
        'data_admissao' => 'datetime',
        'data_demissao' => 'datetime',
        'data_salario' => 'datetime',

    ];

    protected $table = "funcionarios";
}
