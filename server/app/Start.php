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
        $router->get('/api/cinema/surround' , 'app\controller\MovieController::getSurround');
        $router->get('/api/session/info', 'app\controller\SessonController::getInfo');

        return $router;
    }
}