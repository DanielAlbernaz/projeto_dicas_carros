<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DicasStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_dica' => 'required',
            'marca' => 'required|max:140',
            'modelo' => 'required|max:140',
            'versao' => 'max:140',
            'text' => 'required|max:180'
        ];
    }

    public function attributes()
    {
        return array(
            'tipo_dica' => 'Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'versao' => 'Versao',
            'text' => 'Dica'
        );
    }

    public function messages()
    {
        return [
            'tipo_dica.required' => 'O campo tipo é obrigatório.',
            'marca.required' => 'O campo marca é obrigatório.',
            'marca.max' => 'O Máximo de caracteres permitido são 140.',
            'modelo.required' => 'O campo modelo é obrigatório.',
            'modelo.max' => 'O Máximo de caracteres permitido são 140.',
            'text.required' => 'O campo dica é obrigatório.',
            'text.max' => 'O Máximo de caracteres permitido são 180.'
        ];
    }

}
