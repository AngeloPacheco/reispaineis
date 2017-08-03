<?php

namespace App\Models\painel;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = [ 'id',
                            'razao_social',
                            'nome_fantasia',
                            'responsavel',
                            'cnpj',
                            'ie',
                            'cep',
                            'logradouro',
                            'numero',
                            'complemento',
                            'bairro',
                            'localidade', 
                            'uf',
                            'email',
                            'site',
                            'telefone',
                            'celular',
                        ];
}