<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018-12-24
 * Time: 09:53
 */

namespace Tinker\Alibaba;


use stdClass;
use Tinker\TinkerResponse;

/**
 * Class TaobaoResponse
 * @package Tinker\Alibaba
 */
class TaobaoResponse extends TinkerResponse
{
    /**
     * TaobaoResponse constructor.
     * @param $body
     * @param string $method
     * @param string $format
     */
    public function __construct($body, string $method, string $format = 'json')
    {
        parent::__construct($body, $method, $format);

        $this->addMethodBodyReplace('taobao.', '');
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
        if (empty($this->body)) {
            return false;
        }
        if (property_exists($this->body, 'code') || property_exists($this->body, 'error_response')) {
            return false;
        }
        return true;
    }

    /**
     * @return stdClass
     */
    public function getJsonBody(): ?stdClass
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
        if (isset($this->body->sub_msg) || isset($this->body->error_response->sub_msg)) {
            return $this->body->sub_msg ?? $this->body->error_response->sub_msg;
        }
        $body = $this->getMethodBody();
        if (isset($body->sub_msg)) {
            return $body->sub_msg;
        }
        return 'unknown';
    }
}
