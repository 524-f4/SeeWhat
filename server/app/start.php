<?php declare(strict_types = 1);

require 'Common.php';
require 'controller/MovieController.php';

$router = new League\Route\Router;

$router->get('/api/cinema/surround' , 'app\controller\MovieController::getSurround');
$router->get('/api/session/info', 'app\controller\SessonController::getInfo');