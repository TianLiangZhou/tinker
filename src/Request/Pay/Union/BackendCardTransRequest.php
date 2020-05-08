<?php


namespace Tinker\Request\Pay\Union;


use Exception;
use Tinker\Pay\Union\UnionRequest;

/**
 * 后台有卡交易
 *
 * Class BackendCardTransRequest
 * @package Tinker\Pay\Union\Request
 */
class BackendCardTransRequest extends UnionRequest
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/gateway/api/cardTransReq.do";
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
