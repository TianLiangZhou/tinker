<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2019-03-08
 * Time: 17:49
 */
namespace Tinker\Pay\Yee;

use Tinker\Pay\Pay;
use Tinker\RequestInterface;
use Tinker\ResponseInterface;

class YeePay extends Pay
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
     * @param RequestInterface $method
     * @param string $mode
     * @return ResponseInterface
     */
    public function execute(RequestInterface $method, string $mode = "default"): ResponseInterface
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
