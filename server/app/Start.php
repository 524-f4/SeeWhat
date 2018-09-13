<?php declare(strict_types = 1);

namespace app;

use League\Route\Router;

class Start
{
    public static function run()
    {
        $router = new Router;

        $router->get('/api/cinema/surround' , 'app\controller\MovieController::getSurround');
        $router->get('/api/session/info', 'app\controller\SessonController::getInfo');

        return $router;
    }
}