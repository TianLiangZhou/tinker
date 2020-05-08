<?php


namespace Tinker\Request\Pay\Union;


use Exception;
use Tinker\Pay\Union\UnionRequest;

class AppTransRequest extends UnionRequest
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.

        return "/gateway/api/appTransReq.do";
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
