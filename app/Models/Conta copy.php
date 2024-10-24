<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'emissao',
        'vencimento',
        'pagamento',
        'pago',
        'valor',
        'descricao',
        'observacao',
        'codigodebarras',
        'documento',
        'historico',
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
