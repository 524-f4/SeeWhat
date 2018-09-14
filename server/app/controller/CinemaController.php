<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class CinemaController
{
    private static $cis = [1001, 1002, 1003, 1004];
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
        $result = Common::$redis->hGetAll($movieId);

        $output = array();
        foreach (self::$cis as $v) {
            $cnm = Common::$redis->hGetAll('c:' . $v);
            
            $isBuild = empty(Common::$redis->keys('*:' . $cnm['cinemaId'] . ':' . $movieId));
            if (!$isBuild || ($cnm['sessions'] < strtotime(date('Y-m-d')))){
                return 0;
                $cnm['sessions'] = $this->buildSession($movieId, $cnm['cinemaId'], $result['time']);
            } else {
                return 1;
                $cnm['sessions'] = $this->getSession($movieId, $cnm['cinemaId']);
            }

            $output[] = $cnm;
        }

        return $output;
    }

    protected function buildSession($movieId, $cinemaId, $ltime)
    {
        $startTime = strtotime(date('Y-m-d 08:00:00')) + rand(0, 30) * 60;
        $votes = 32;
        $price = rand(36, 54) + rand(0, 9) * 0.1;

        $x = 5;
        $output = array();
        while ($x) {
            $endTime = $startTime + $ltime * 60 * 60;
            $sessionId = $startTime;

            $cur = array(
                'sessionId' => $sessionId,
                'startTime' => date('Y-m-d H:i:s', $startTime),
                'endTime' => date('Y-m-d H:i:s', $endTime),
                'price' => $price,
                'votes' => $votes
            );

            $key = $sessionId . ':' . $cinemaId . ':' . $movieId;
            Common::$redis->hMset($key, $cur);
            $output[] = $cur;

            $startTime = $endTime + rand(0, 90) * 60;

            $x--;
        }

        return $output;
    }


    protected function getSession($movieId, $cinemaId)
    {
        $partn = '*:' . $cinemaId . ':' . $movieId;
        $cos = Common::$redis->keys($partn);

        $output = array();
        foreach ($cos as $value) {
            $output[] = Common::$redis->hGetAll($value);
        }

        return $output;
    }
}