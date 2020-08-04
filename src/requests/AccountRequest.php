<?php


namespace App\Requests;


use App\Core\Request;

class AccountRequest extends Request
{
    public $login;
    public $password;
    public $email;
    public $fio;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|max:55',
            'password' => 'max:55',
            'email' => 'required|email|max:55',
            'fio' => 'required|max:55',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Поле ":attribute" обязательно к заполнению',
            'email' => 'Поле "Email" заполненно некорректно',
            'max' => 'Поле не должно содержать больше :max симолов'
        ];
    }
}