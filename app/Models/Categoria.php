<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;use SoftDeletes;

    protected $fillable = [
        'id',
        'categoria',
        'tipolancamento',
        'descricao',
        'bancooucartao',
        'formapagamento',
        'clienteefornecedor',
        'categoria_id'
    ];

    protected $table = "categorias";

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'categoria_id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'categoria_id');
    }

    public function parent()
    {
        return $this->hasMany(self::class, 'id', 'categoria_id');
    }

}
