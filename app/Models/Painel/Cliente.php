<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $filllable = [ 'nome',
    						 'tipo_pessoa',
    						 'cpf_cnpj',
    						 'rg_ie',
    						 'cep',
    						 'logradouro',
    						 'numero',
    						 'complemento',
    						 'bairro',
    						 'localidade',
    						 'uf',
    						 'fone_res',
    						 'fone_com',
    						 'celular',
    						 'email',
    					];
}
