<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteOuFornecedor extends Model
{
    use HasFactory;
    public $table = "clienteoufornecedor";
    protected $fillable = ['nome', 'pessoa', 'cpfcnpj', 'telefone', 'celular', 'email', 'endereco', 'complemento', 'bairro', 'cidade', 'estado', 'cep', 'site', 'observacoes'];
}
