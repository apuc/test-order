**Конфигурация приложения**
* git clone https://github.com/apuc/test-order.git
* composer install
* конфигурация БД в файле 'config.php'
* импорт БД из файла 'test.sql'

**Функционал приложения**

* регистрация
* аутентификация
* изменение данных пользователя
* просмотр статистики пользователей и заказов:
    + запрос, который выведет список email'лов встречающихся более чем у одного пользователя
    + вывод списка логинов пользователей, которые не сделали ни одного заказа
    + вывод списка логинов пользователей, которые сделали более двух заказов