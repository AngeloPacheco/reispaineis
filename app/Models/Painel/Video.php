<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['titulo', 'descricao', 'url', 'path'];
}
