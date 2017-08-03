<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    protected $filllable = ['name','email','password'];
}
