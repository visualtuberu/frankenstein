<?php
namespace App\Application;
use App\Router\Router;

class App
{
    public function run() {
        require_once __DIR__ . "/../../routes/pages.php";
        $uri = $_SERVER['REQUEST_URI'];
        $list = Router::list();

        foreach ($list as $route) {
            if ($uri == $route['uri']) {
                $controller = new $route['controller']();
                $method = $route['method'];
                $controller->$method();

            }
        }
    }
}