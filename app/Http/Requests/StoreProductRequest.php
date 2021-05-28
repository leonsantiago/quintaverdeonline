<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'category_id' => 'required|numeric',
            'unit' => 'required',
            'price' => 'required|numeric',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe ingresar un nombre,',
            'category_id.required' => 'Debe seleccionar una categoria.',
            'unit.required' => 'Debe ingresar la unidad del producto.',
            'price.required' => 'Debe ingresar el precio.',
            'price.numeric' => 'El precio debe contener un valor numerico.',
            'active.required' => 'Debe seleccionar si hay stock de venta.'
        ];
    }
}
