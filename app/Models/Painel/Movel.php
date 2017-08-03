<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Movel extends Model
{
    protected $table = 'moveis';
    protected $fillable  = [ 'descricao',
                             'qtde',  
                             'custo',
                             'lucro',
                             'venda',
                             'dimensoes',
                             'cor',
                             'ativo',
                             'novidade',
                             'informacoes',
                             'categoria_id',
    					];

public function categoria_moveis(){
    
    return $this->belongsTo(CategoriaMovel::class);
    
}              
}
