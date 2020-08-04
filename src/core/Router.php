<?php


namespace App\Core;


use Exception;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

/**
 * Class Router
 * @package App\Core
 */
class Router
{
    private $router;
    private $dispatcher;


    /**
     * Router constructor
     */
    public function __construct()
    {
        $this->router = new RouteCollector();
        require_once ROOT_DIR . 'src/routes/web.php';
    }

    /**
     * Start application
     */
    public function run()
    {
        $this->dispatcher = new Dispatcher($this->router->getData());
        try {
            $response = $this->dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        } catch (HttpMethodNotAllowedException $ex) {
            echo $ex->getMessage(); exit();

            $response = $this->setError(403);
        } catch (HttpRouteNotFoundException $ex) {
            echo $ex->getMessage(); exit();

            $response = $this->setError(404);
        } catch (Exception $ex) {
            echo $ex->getMessage(); exit();
            $response = $this->setError(500);
        }
        echo $response;
    }

    /**
     * @param $error_code
     * @return mixed
     */
    private function setError($error_code)
    {
        http_response_code($error_code);
        return $error_code;//$this->dispatcher->dispatch("GET", "/error");
    }
}
