<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018-12-24
 * Time: 09:37
 */

namespace Tinker\Pay\Alipay;


use stdClass;
use Tinker\TinkerResponse;

class AlipayResponse extends TinkerResponse
{

    /**
     * 是否成功
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        // TODO: Implement isSuccess() method.
        if (empty($this->body)) {
            return false;
        }
        $body = $this->getBody();
        if ((int) $body->code !== 10000) {
            return false;
        }
        return true;
    }

    /**
     * @return stdClass
     */
    public function getJsonBody(): stdClass
    {
        return $this->getMethodBody();
    }

    /**
     * 获取错误信息
     * @return string
     */
    public function errorMessage(): string
    {
        // TODO: Implement errorMessage() method.
        $body = $this->getBody();
        if (isset($body->msg)) {
            return $body->msg;
        }
        return 'unknown';
    }

    /**
     * 最后出错的错误码
     *
     * @return mixed
     */
    public function lastErrorCode()
    {
        // TODO: Implement lastErrorCode() method.
        $body = $this->getBody();
        return $body->sub_code ?? 'unknown';
    }
}
