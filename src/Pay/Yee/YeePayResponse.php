<?php


namespace Tinker\Pay\Yee;


use Tinker\TinkerResponse;

class YeePayResponse extends TinkerResponse
{

    /**
     * 是否成功
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        // TODO: Implement isSuccess() method.
        $body = $this->getBody();
        if ($body->state == 'SUCCESS') {
            return true;
        }
        return false;
    }

    /**
     * 获取错误信息
     * @return string
     */
    public function errorMessage(): string
    {
        // TODO: Implement errorMessage() method.
        $body = $this->getBody();
        return $body->error->message ?? 'unknown';
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
        return $body->error->code ?? 'unknown';
    }
}
