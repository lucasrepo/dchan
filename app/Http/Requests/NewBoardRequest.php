<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBoardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* if(!Aux::checkUser()) */
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
            'name' => 'required|max:30|unique:boards',
            'captcha' => 'required|min:4|max:8|captcha',
            'description' => 'min:10',
            'tags' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'descripción',
            'name' => 'nombre',
        ];
    }

    public function messages()
    {
        return [
            'captcha' => 'Captcha invalido.',
        ];
    } 
}
