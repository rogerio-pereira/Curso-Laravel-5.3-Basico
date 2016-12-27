<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name'          => 'required|min:3|max:100',
            'number'        => 'required|numeric',
            'category'      => 'required',
            'description'   => 'min:3|max:1000'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Campo nome é obrigatório',
            'number.required' => 'Campo número é obrigatório',
            'number.numeric' => 'Precisa ser apenas números',
        ];
    }
}
