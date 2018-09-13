<?php declare(strict_types = 1);

namespace app;

use League\Route\Router;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;


class Start
{
    public static function run()
    {
        $router = new Router;
        $capsule = new Capsule;

        //----------------------------------------------------------
        // 配置数据库
        // 设置全局静态可访问
        // 启动Eloquent
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'seewhat',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        //----------------------------------------------------------
        // 配置路由
        $router->get('/cinema/surround' , 'app\controller\CinemaController::surround');
        $router->get('/movie/list', 'app\controller\MovieController::list');
        $router->get('/session/detail', 'app\controller\SessionController::detail');

        $router->get('/order/detail', 'app\controller\OrderController::detail');
        $router->post('/order/create', 'app\controller\OrderController::create');

        $router->get('/user/info', 'app\controller\UserController::info');
        $router->post('/user/register', 'app\controller\UserController::register');
        $router->post('/user/login', 'app\controller\UserController::login');

        //----------------------------------------------------------
        // 配置缓存
        Common::$redis = new \Redis();
        Common::$redis->connect('127.0.0.1', 6379);
        Common::$redis->auth('future');

        return $router;
    }
}