<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
        return [
            'nome' => 'required|min:3|max:100',
            'fantasia' => 'required|min:3|max:100',
            'ifederal' => 'required|min:11|max:20'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo razão social é de preenchimento obrigatorio',
            'nome.min' => 'O campo razão social tem um tamanho minimo de 3 caracteres',
            'nome.max' => 'O campo razão social tem um tamanho maximo de 100 caracteres'
        ];
    }
}
