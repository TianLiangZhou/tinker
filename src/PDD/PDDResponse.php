<?php


namespace Tinker\PDD;


use stdClass;
use Tinker\TinkerResponse;

/**
 * Class PDDResponse
 * @package Tinker\PDD
 */
class PDDResponse extends TinkerResponse
{
    /**
     * PDDResponse constructor.
     * @param $body
     * @param string $method
     * @param string $format
     */
    public function __construct($body, string $method, string $format = 'json')
    {
        parent::__construct($body, $method, $format);

        $this->addMethodBodyReplace('pdd.ddk.', '');
        $this->addMethodBodyReplace('.', '_');
    }

    /**
     * 是否成功
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        // TODO: Implement isSuccess() method.
        $body = $this->getBody(true);
        if (isset($body->error_response->error_msg)) {
            return false;
        }
        return true;
    }

    /**
     * @return stdClass|null
     */
    public function getJsonBody(): ?stdClass
    {
        return $this->getMethodBody();
    }

    /**
     * 获取错误信息
     *
     * @return string
     */
    public function errorMessage(): string
    {
        // TODO: Implement errorMessage() method.
        $body = $this->getBody(true);
        if (isset($body->error_response->error_msg)) {
            return $body->error_response->error_msg;
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
        $body = $this->getBody(true);
        if (isset($body->error_response->error_code)) {
            return $body->error_response->error_code;
        }
        return 500;
    }
}
