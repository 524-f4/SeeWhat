<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class MovieController
{
    public function getSurround(ServerRequestInterface $req) : ResponseInterface
    {
        $cinemas = file_get_contents('app/data/cinemas.json');
        $data = json_decode($cinemas, true);
        
        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => $data
        );

        return Common::getResp($resp);
    }
}