<?php declare(strict_types = 1);

namespace app\controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use app\Common;


class MovieController
{
    private static $mids = array(
        234573,
        257780,
        250829,
        258681,
        255265,
        246996,
        147986,
        226992,
        244991,
        242294,
        251499,
        253843,
        199774,
        258535,
        250925,
        242119,
        241018,
        257792,
        242270,
        236835,
        225827,
        209333,
        247246,
        238551,
        257716,
        259775,
        253688,
        228277,
        259037,
        258959,
        259874,
        249775,
        228903,
        235512,
        239726,
        252636,
        242167,
        257861,
        255797,
        248056,
        255302,
        229469,
        254620,
        142950,
        259334,
        259780,
        259929,
        259075,
        258705,
        255470,
        229758,
        258531,
        250539,
        222627,
        232758,
        218440,
        247673,
        255708,
        235956,
        250964,
        258469,
        254621,
        226540
    );
    public function getList(ServerRequestInterface $req, Array $args) : ResponseInterface
    {
        $params = $req->getQueryParams();

        isset($params['boundaryId']) || $params['boundaryId'] = 0;
        $boundaryId = empty($params['boundaryId']) ? -1 : $params['boundaryId'];

        $data = $this->buildMovies($boundaryId);

        $resp = array(
            'errno' => 200,
            'errmsg' => '',
            'data' => $data
        );

        return Common::getResp($resp);
    }

    protected function buildMovies($boundaryId)
    {
        $endIndex = $boundaryId + 9;
        $isLast = isset(self::$mids[$endIndex]) ? false : true;

        $mvs = array();
        for($i = $boundaryId + 1; (!empty(self::$mids[$i]) && $i < $endIndex ); $i++) {
            $cur = (string)self::$mids[$i];

            $keys = Common::$redis->hKeys($cur);
            $vals = Common::$redis->hVals($cur);

            $mvs[] = array_combine($keys, $vals);
        }
        $lastId = $i;

        return array(
            'movies' => $mvs,
            'lastId' => $lastId,
            'isLast' => $isLast
        );
    }
}