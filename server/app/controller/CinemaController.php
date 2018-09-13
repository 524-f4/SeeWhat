<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class CinemaController
{
    private static $cis = [
        [
            "cinemaId" => 1001,
            "cinemaName" => "雨哥影院",
            "cinemaPlace" => "湖南科大南校俱乐部",
            "sessions" => []
        ],
        [
            "cinemaId" => 1002,
            "cinemaName" => "小辉辉儿童影院",
            "cinemaPlace" => "湖南科大附属小学",
            "sessions" => []
        ],
        [
            "cinemaId" => 1003,
            "cinemaName" => "皮氏休闲观影俱乐部",
            "cinemaPlace" => "湖南科大后街666号",
            "sessions" => []
        ],
        [
            "cinemaId" => 1004,
            "cinemaName" => "522露天影院",
            "cinemaPlace" => "湖南科大北校九教",
            "sessions" => []
        ]
    ];
    public function surround(ServerRequestInterface $req) : ResponseInterface
    {
        $params = $req->getQueryParams();

        if (!isset($params['movieId'])) {
            throw new \Exception();
        }

        $data = $this->search($params['movieId']);

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => $data
        );

        return Common::getResp($resp);
    }

    protected function search($movieId)
    {
        $result = Common::$redis->hMembers($movieId);

        
    }
}