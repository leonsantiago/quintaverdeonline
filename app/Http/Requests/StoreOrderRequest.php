<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'payment_type' => 'required',
            'total' => 'required|numeric|min:1000',
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'lastname' => 'required|regex:/^[\pL\s\-]+$/u',
            'phone' => 'required|numeric',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'payment_type.required' => 'Debe seleccionar un metodo de pago.',
            'total.min' => 'El monto minimo de compra es de $ 1000.',
            'name.required' => 'Debe introducir su nombre.',
            'name.regex' => 'El nombre solo debe contener letras.',
            'lastname.required' => 'Debe introducir su apellido.',
            'lastname.regex' => 'El apellido solo debe contener letras.',
            'address.required' => ' Debe introducir su direccion.'
        ];
    }
}
