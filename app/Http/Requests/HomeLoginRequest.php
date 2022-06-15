<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeLoginRequest extends FormRequest
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
            'emailCustomer' => 'required|email',
            'passwordCustomer' => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'emailCustomer.required' => ':attribute khong duoc de trong',
            'emailCustomer.email' => ':attribute phai la mot dinh dang email',
            'passwordCustomer.required' => ':attribute khong duoc de trong'
        ];
    }
}
