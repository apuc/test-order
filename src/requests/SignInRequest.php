<?php


namespace App\requests;


use App\Core\Request;

class SignInRequest extends Request
{
    public $login;
    public $password;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|max:55',
            'password' => 'required|max:55',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Поле ":attribute" обязательно к заполнению',
            'max' => 'Поле не должно содержать больше :max симолов'
        ];
    }
}