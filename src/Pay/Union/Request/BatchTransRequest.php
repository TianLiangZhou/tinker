<?php


namespace Tinker\Pay\Union\Request;


use Exception;
use Tinker\Pay\Union\UnionRequest;

class BatchTransRequest extends UnionRequest
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.

        return "/gateway/api/batchTrans.do";
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
