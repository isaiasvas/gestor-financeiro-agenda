<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaoDeCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'descricao', 'dia_fechamento','dia_vencimento','limite', 'disponivel', 'agencia','numero','digito', 'tipo','situacao'
    ];

    protected $table = 'cartaodecredito';
}
