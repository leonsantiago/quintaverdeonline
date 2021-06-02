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
            'name.required' => 'Por favor ingrese un nombre,',
            'category_id.required' => 'Por favor seleccione una categoria.',
            'unit.required' => 'Por favor ingrese la unidad del producto.',
            'price.required' => 'Por favor ingrese el precio.',
            'price.numeric' => 'El precio debe contener un valor numerico.',
            'active.required' => 'Por favor seleccione si hay stock de venta.'
        ];
    }
}
