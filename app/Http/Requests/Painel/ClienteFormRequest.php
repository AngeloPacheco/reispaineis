<?php

namespace App\Http\Requests\Painel;
use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nome'       => 'required',
            'cep'        => 'required',
            'cpf_cnpj'   => 'required',
            'logradouro' => 'required',
            'numero'     => 'required',
            'bairro'     => 'required',
            'localidade' => 'required',
            'estado'     => 'required',
        ];
             
        return $rules;
    }
    
    public function messages() {
        
         return [
                'nome.required'       => 'Insira o nome.',
                'cpf_cnpj.required'   => 'Insira CPF ou CNPJ.',
                'cep.required'        => 'Insira o CEP.',
                'logradouro.required' => 'Insira o logradouro.',
                'numero.required'     => 'Insira o número do logradouro.',
                'bairro.required'     => 'Insira o bairro.',
                'localidade.required' => 'Insira a cidade.',
                'estado.required'     => 'Insira o estado.',
        ];
    }
}