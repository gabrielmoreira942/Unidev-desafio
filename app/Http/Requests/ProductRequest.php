<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'provider'=> 'required',
            'expiration_date' => 'required|date',
            'manufacturing_date' => 'required|date'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'O campo nome é obrigatório.',
            'price.required' => 'O campo Preço do produto é obrigatório.',
            'provider.required' => 'O campo fornecedor é obrigatório.',
            'expiration_date.required' => 'Defina a data de Validade.',
            'manufacturing_date.required' => 'Defina a data de fabricação.'
        ];
    }
}
