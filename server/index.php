<?php

require 'vendor/autoload.php';

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$response = \app\Start::run()->dispatch($request);

(new Zend\Diactoros\Response\SapiEmitter)->emit($response);