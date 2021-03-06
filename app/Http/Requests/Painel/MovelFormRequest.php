<?php

namespace App\Http\Requests\Painel;
use Illuminate\Foundation\Http\FormRequest;

class MovelFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'descricao'    => 'required',
            'qtde'         => 'required',
            'categoria_id' => 'required',
            'custo'        => 'required',
            'venda'        => 'required',
        ];
            $photos = count($this->input('photos'));
            foreach(range(0, $photos) as $index) {
                $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
            }
        return $rules;
    }
    
    public function messages() {
        
         return [
                'descricao.required'     => 'Insira a descrição.',
                'qtde.required'          => 'Insira a quantidade.',
                'categoria_id.required'  => 'Selecione a categoria',
                'custo.required'         => 'Insira o valor de custo.',
                'venda.required'         => 'Insira o valor de venda.',
        ];
    }
}
