<?php


namespace App\Services;

use Illuminate\Database\Capsule\Manager as DB;


class Queries
{
    /**
     * @return array
     * запрос, который выведет список email'лов встречающихся более чем у одного пользователя
     */
    public function getUsersEmails(): array
    {
        return DB::select('SELECT count(*) AS count_emails, email FROM user GROUP BY email HAVING count(*) > 1');
    }

    /**
     * @return array
     * вывести список логинов пользователей, которые не сделали ни одного заказа
     */
    public function getUserWithoutOrders(): array
    {
        return DB::select('SELECT `user`.`id`, `order`.`user_id`, `user`.`login` FROM `user` LEFT JOIN `order` ON `user`.`id` = `order`.`user_id` WHERE `order`.`user_id` is NULL');
    }

    /**
     * @return array
     * вывести список логинов пользователей которые сделали более двух заказов
     */
    public function getUserByOrders(): array
    {
        return DB::select('SELECT `email`, count(*) AS `count_emails` FROM `user` INNER JOIN `order` ON `user`.`id` = `order`.`user_id` GROUP BY `email` HAVING count(*) > 2');
    }
}