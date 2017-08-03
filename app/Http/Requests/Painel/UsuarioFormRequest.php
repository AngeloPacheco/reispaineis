<?php

namespace App\Http\Requests\Painel;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
        ];

        $photos = count($this->input('photos'));
            foreach(range(0, $photos) as $index) {
                $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
            }
    
        return $rules;
    }
    
    public function messages() {
        
        return ['name.required'    => 'Inserir nome.',
                'email.required'   => 'Inserir o e-mail.',
                'password.required'=> 'Inserir a senha.',
               ];
    }
}