<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 21:00
 */

namespace Tinker\Pay\Alipay;

use Tinker\Pay\PayRequest;
use Tinker\RequestInterface;

abstract class AlipayRequest extends PayRequest
{
    protected $terminalType = '';

    protected $terminalInfo = '';

    protected $productCode = '';

    protected $apiVersion = '1.0';

    protected $isEncrypt = false;

    public function isEncrypt(): bool
    {
        // TODO: Implement isEncrypt() method.
        return $this->isEncrypt;
    }

    public function setBizContent(array $content): RequestInterface
    {
        $this->setApiParameter('biz_content', json_encode($content));
        return $this;
    }

    public function getTerminalType(): ?string
    {
        // TODO: Implement getTerminalType() method.
        return $this->terminalType;
    }

    public function setTerminalType(string $type): AlipayRequest
    {
        // TODO: Implement setTerminalType() method.
        $this->terminalType = $type;
        return $this;
    }

    public function getTerminalInfo(): ?string
    {
        // TODO: Implement getTerminalInfo() method.
        return $this->terminalInfo;
    }

    public function setTerminalInfo(string $info): AlipayRequest
    {
        // TODO: Implement setTerminalInfo() method.
        $this->terminalInfo = $info;
        return $this;
    }

    public function getProductCode(): ?string
    {
        // TODO: Implement getProductCode() method.
        return $this->productCode;
    }

    public function setProductCode(string $code): AlipayRequest
    {
        // TODO: Implement setProductCode() method.
        $this->productCode = $code;
        return $this;
    }

    public function getApiVersion(): ?string
    {
        // TODO: Implement getApiVersion() method.
        return $this->apiVersion;
    }

    public function setApiVersion(string $version): AlipayRequest
    {
        // TODO: Implement getApiVersion() method.
        $this->apiVersion = $version;
        return $this;
    }

    /**
     * @param bool $isEncrypt
     *
     * @return $this
     */
    public function setEncrypt(bool $isEncrypt): AlipayRequest
    {
        $this->isEncrypt = $isEncrypt;
        return $this;
    }
}
