<?php


namespace Tinker\Pay\Union;


use Tinker\TinkerResponse;

class UnionResponse extends TinkerResponse
{

    /**
     * 是否成功
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        // TODO: Implement isSuccess() method.
        $response = $this->getBody(true);
        if ($response['respCode'] == '00') {
            return true;
        }
        return false;
    }

    /**
     * 获取错误信息
     *
     * @return string
     */
    public function errorMessage(): string
    {
        // TODO: Implement errorMessage() method.
        $response = $this->getBody(true);
        return $response['respMsg'] ?? 'unknown';
    }
}
