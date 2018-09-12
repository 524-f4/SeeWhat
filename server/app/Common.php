<?php declare(strict_types = 1);

namespace app;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

class Common
{
    public static function getResp(Array $arr): ResponseInterface
    {
        return new JsonResponse($arr);
    }
}