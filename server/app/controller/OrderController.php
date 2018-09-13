<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class OrderController
{
    public function create(ServerRequestInterface $req) : ResponseInterface
    {
        $params = $req->getParsedBody();

        $data = $this->buildOrder($params);

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => $data
            ]
        );

        return Common::getResp($resp);
    }

    protected function buildOrder($params)
    {
        
    }
}