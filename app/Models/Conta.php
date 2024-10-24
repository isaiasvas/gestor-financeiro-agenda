<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'valor',
        'vencimento',
        'pagamento',
        'valorpago',
        'pago',
        'categoria',
        'descricao',
        'documento',
        'observacao',
        'tipolancamento',
        'bancooucartao',
        'formapagamento',
        'clienteefornecedor',
        'updated_at',
        'created_at',
    ];


    protected $casts = [
        'emissao' => 'datetime',
        'vencimento' => 'datetime',
        'pagamento' => 'datetime',

    ];

    protected $table = "contasapagar";
}
