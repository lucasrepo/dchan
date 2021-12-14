<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\AuxController;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* Validar IpClient */
        /*return null !== AuxController::getIp() ? true : false;*/

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
            'captcha' => 'required|min:4|max:8|captcha',
            'email' => 'required|min:5|max:30|unique:accounts|email',
            'password' => 'required|max:30|min:6'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'contraseña',
        ];
    }

    public function messages()
    {
        return [
            'captcha' => 'Captcha invalido.',
        ];
    } 
}
