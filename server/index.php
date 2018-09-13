<?php

require 'vendor/autoload.php';

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

try {
    $response = \app\Start::run()->dispatch($request);

    (new Zend\Diactoros\Response\SapiEmitter)->emit($response);
} catch (Exception $e) {
    $resp = array(
        'errno' => 500,
        'errmsg' => '网速缓慢，请稍后再试~~',
        'data' => array()
    );

    (new Zend\Diactoros\Response\SapiEmitter)->emit(app\Common::getResp($resp));
}

