<?php

$redis = new \Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth('future');

$movies = json_decode(file_get_contents(__DIR__ . "/cinemas.json"), true);

file_put_contents(__DIR__ . "/cinemas.json", $movies);die('end');

foreach ($movies as $v) {
    // $m = array(
    //     'movieName' => $v['tCn'],               //电影名
    //     'movieEnglishName' => $v['tEn'],        //电影英文名
    //     'rating' => $v['r'],                    //评分
    //     'actors' => $v['actors'],               //演员
    //     'nearestCinemaCount' => $v['NearestCinemaCount'],              //周边影院数
    //     'nearestShowTimeCount' => $v['NearestShowtimeCount'],          //周边影院最近播放次数
    //     'img' => $v['img'],                     // 电影图片
    //     'type' => $v['movieType'],              //电影的类型
    //     'time' => $v['cC'],                     //电影时长
    // );
    echo $redis->hMset($v['id'], $m). "\n";
}
