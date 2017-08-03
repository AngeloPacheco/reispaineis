<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class CategoriaMovel extends Model
{
    protected $table = 'categoria_moveis';
    protected $fillable = ['descricao'];
}
