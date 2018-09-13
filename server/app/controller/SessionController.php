<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class SessionController
{
    public function getInfo(ServerRequestInterface $req) : ResponseInterface
    {
        $sessions = [];

        $movies = file_get_contents('app/data/movies.json');
        $data = json_decode($movies, true);

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => 'the getSessionInfo api'
            ]
        );

        return Common::getResp($resp);
    }
}