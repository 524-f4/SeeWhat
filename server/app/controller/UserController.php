<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;

class UserController
{
    public function info(ServerRequestInterface $req) : ResponseInterface
    {
        $data = 'the user/info api';

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => $data
            ]
        );

        return Common::getResp($resp);
    }


    public function login(ServerRequestInterface $req) : ResponseInterface
    {
        $data = 'the user/login api';

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => $data
            ]
        );

        return Common::getResp($resp);
    }

    public function register(ServerRequestInterface $req) : ResponseInterface
    {
        $data = 'the user/register api';

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => $data
            ]
        );

        return Common::getResp($resp);
    }
}