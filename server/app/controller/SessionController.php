<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class SessionController
{
    public function getInfo(ServerRequestInterface $req) : ResponseInterface
    {
        $data = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => 'the getSessionInfo api'
            ]
        );

        return Common::getResp($data);
    }
}