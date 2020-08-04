<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\User;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController extends Controller
{
    /**
     * @return string
     * @throws \Exception
     * Вывод инфоормацтт на глауную страницу
     */
    public function actionIndex()
    {
        try {
            return $this->render('main/index', [
                'emails' => $this->getUsersEmails(),
                'users_without_orders' => $this->getUserWithoutOrders(),
                'users_with_orders' => $this->getUserByOrders('>', 2),
            ]);
        } catch (\Exception $ex) {
            return $this->render('main/index');
        }
    }

    /**
     * @return array
     * запрос, который выведет список email'лов встречающихся более чем у одного пользователя
     */
    protected function getUsersEmails(): array
    {
        return User::selectRaw('count(*) as count_emails, email')
            ->groupBy('email')
            ->havingRaw('count(*) > 1')
            ->get()
            ->toArray();
    }

    /**
     * @return array
     * вывести список логинов пользователей, которые не сделали ни одного заказа
     */
    protected function getUserWithoutOrders(): array
    {
        return User::selectRaw('user.id, order.user_id, user.login, user.fio')
            ->leftjoin('order', 'user.id', 'order.user_id')
            ->whereNull('order.user_id')
            ->get()
            ->toArray();
    }

    /**
     * @param string $sign
     * @param int $num_orders
     * @return array
     * @throws \Exception
     * вывести список логинов пользователей которые сделали более двух заказов
     */
    protected function getUserByOrders(string $sign, int $num_orders): array
    {
        if (!in_array($sign, ['=', '!=', '<>', '>', '<', '>=', '<=']) OR !is_int($num_orders)) {
            throw new \Exception();
        }
        return User::selectRaw('count(*) as count_orders, order.user_id, user.id, user.fio, user.login')
            ->join('order', 'user.id', '=', 'order.user_id')
            ->groupBy('order.user_id')
            ->havingRaw("count(*) $sign $num_orders")
            ->get()
            ->toArray();
    }

    /**
     * @return string
     * @throws \Exception
     * Отображение странциы входа
     */
    public function actionSignIn()
    {
        return $this->render('account/sign-in');
    }

    /**
     * @return string
     * @throws \Exception
     * Отображение страницы регистрации
     */
    public function actionSignUp()
    {
        return $this->render('account/sign-up');
    }

    /**
     * @return string
     * @throws \Exception
     * Отображение личного кабинета
     */
    public function actionAccount()
    {
        $user = User::find($_SESSION['id']);

        return $this->render('account/account', ['user' => $user]);
    }
}
