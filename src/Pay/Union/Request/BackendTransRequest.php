<?php


namespace Tinker\Pay\Union\Request;


use Exception;
use Tinker\Pay\Union\UnionRequest;

/**
 * 后台无卡交易
 *
 * Class BackendTransRequest
 * @package Tinker\Pay\Union\Request
 */
class BackendTransRequest extends UnionRequest
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.

        return "/gateway/api/backTransReq.do";
    }



    /**
     * @return mixed
     * @throws Exception
     */
    public function check()
    {
        // TODO: Implement check() method.
    }
}
