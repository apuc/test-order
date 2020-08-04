<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\User;
use App\Requests\AccountRequest;
use App\requests\SignInRequest;
use App\requests\SignUpRequest;

/**
 * Class AccountController
 * @package App\Controllers
 */
class AccountController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     * Выполняет вход пользователя в учетную запись
     */
    public function actionSignInSubmit()
    {
        $request = new SignInRequest();

        if ($request->isPost() AND $request->validate()) {
            $user = User::where('login', $request->login)->first();
            if ($user !== null AND password_verify($request->password, $user->password)) {
                // sign in user
                $_SESSION['id'] = $user->id;
                $_SESSION['login'] = $user->login;

                $this->redirect('/');
            } else {
                return $this->render('account/sign-in', ['errors' => 'Пользователь не найден']);
            }

        } else {
            return $this->render('sign-in', $request->getMessagesArray());
        }
    }

    /**
     * @return string
     * @throws \Exception
     * Выполняет регистрацию пользователя
     */
    public function actionSignUpSubmit()
    {
        $request = new AccountRequest();

        if ($request->isPost() AND $request->validate()) {
            $user = User::where('login', $request->login)->get();
            if ($user->count() === 0) {
                // sign up user
                $user = new User();
                $user->signUp($request);

                $this->redirect('/');
            } else {
                return $this->render('account/sign-up', ['errors' => 'Пользователь с таким логином уже существует']);
            }

        } else {
            return $this->render('account/sign-up', $request->getMessagesArray());
        }
    }

    /**
     * @return string
     * @throws \Exception
     * Выполянет изменение данных пользователя
     */
    public function actionAccountChangeSubmit()
    {
        $request = new AccountRequest();

        if ($request->isPost() AND $request->validate()) {
            $user = User::where('login', '<>', $_SESSION['login'])->where('login', $request->login)->first();
            if ($user === null) {
                // change user account
                $user = User::find($_SESSION['id']);
                $user->updateAccount($request);

                $this->redirect('/');
            } else {
                return $this->render('account/account', ['errors' => 'Пользователь с таким логином уже существует']);
            }

        } else {
            return $this->render('account/account', $request->getMessagesArray());
        }
    }

    /**
     * Выполяняет выход из учетной записи
     */
    public function actionExitAccount()
    {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        $this->redirect('/');
    }
}
