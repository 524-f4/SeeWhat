<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class MovieController
{
    public function getSurround(ServerRequestInterface $req) : ResponseInterface
    {
        $data = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => 'the getCinemasSurround api'
            ]
        );

        return Common::getResp($data);
    }
}