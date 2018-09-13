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
        $router->get('/cinema/surround/{id:number}' , 'app\controller\CinemaController::getSurround');
        $router->get('/movie/list', 'app\controller\MovieController::getList');
        $router->get('/session/info', 'app\controller\SessionController::getInfo');
        $router->post('/order/create', 'app\controller\OrderController::create');

        //----------------------------------------------------------
        // 配置缓存
        Common::$redis = new \Redis();
        Common::$redis->connect('127.0.0.1', 6379);
        Common::$redis->auth('future');

        return $router;
    }
}