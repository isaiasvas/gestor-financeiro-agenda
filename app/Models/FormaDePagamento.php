<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaDePagamento extends Model
{
    use HasFactory;

    public $table="formasdepagamento";
    protected $fillable = ['descricao','sigla', 'id'];


    
}
