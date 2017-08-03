<?php

namespace App\Http\Requests\Painel;
use Illuminate\Foundation\Http\FormRequest;

class VideoFormRequest extends FormRequest
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
            
            'titulo' => 'required',
            'url'    => 'required',

        ];
    
        return $rules;
    }
    
    public function messages() {
        
         return [
                 'titulo.required' => 'Inserir o título do vídeo.',
                 'url.required'    => 'Inserir a URL do vídeo.',
                ];
    }
}