<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class SessionController
{
    public function getInfo(ServerRequestInterface $req) : ResponseInterface
    {
        $params = $req->getQueryParams();

        // 检验参数
        if (empty($params['cinemaId']) || empty($params['movieId']) || empty($params['sessionId'])) {
            throw new \Exception();
        }

        // 处理参数
        $key = $params['sessionId'] . ':' . $params['cinemaId'] . ':' . $params['movieId'];
        
        // 获取当场座位数
        $info = $this->getSeats($key);

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => [
                'this' => $info
            ]
        );

        return Common::getResp($resp);
    }

    // 查询场次
    protected function getSeats($key)
    {
        $votes = 32;

        $res = Common::$redis->sMembers($key);
        $votes = $votes - count($res);

        $seats = array();
        for($i = 0;$i < 32; $i++) {
            $currentSta = in_array($i, $res) ? false : true;

            $seats[] = array(
                'seatId' => $i,
                'status' => $currentSta
            );
        }

        return array(
            'votes' => $votes,
            'seats' => $seats
        );
    }
}