<?php

/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2019-03-08
 * Time: 17:46
 */
namespace Tinker\Pay\Union;

use Tinker\Pay\Pay;

class UnionPay extends Pay
{

    /**
     * 通知校验
     *
     * @param $result
     * @return mixed
     */
    public function verification(array $result): array
    {
        // TODO: Implement verification() method.
    }

    /**
     * 实现签名
     *
     * @param string $publicString
     * @return string
     */
    public function sign(string $publicString): string
    {
        // TODO: Implement sign() method.
    }

    /**
     * 需要签名的数据
     *
     * @param array $parameters
     * @return string
     */
    public function getSignContent(array $parameters): string
    {
        // TODO: Implement getSignContent() method.
    }

    /**
     * @param \Tinker\RequestInterface $method
     * @param string $mode
     * @return \Tinker\ResponseInterface
     */
    public function execute(\Tinker\RequestInterface $method, string $mode = "default"): \Tinker\ResponseInterface
    {
        // TODO: Implement execute() method.
    }

    /**
     * @return string
     */
    public function getGatewayUrl(): string
    {
        // TODO: Implement getGatewayUrl() method.
    }
}
