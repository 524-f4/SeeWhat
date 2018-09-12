<?php

require 'vendor/autoload.php';

require 'app/start.php';

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$response = $router->dispatch($request);

(new Zend\Diactoros\Response\SapiEmitter)->emit($response);