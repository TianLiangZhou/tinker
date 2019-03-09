<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:39
 */

namespace Tinker\Pay\Wechat\Request;


use Tinker\Pay\Wechat\WechatRequest;

class WechatMicropayRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/pay/micropay";
    }

    public function setOutTradeNo(string $orderId)
    {
        $this->setApiParameter('out_trade_no', $orderId);
        return $this;
    }

    public function setBody(string $body)
    {
        $this->setApiParameter('body', $body);
        return $this;
    }

    public function setTotalFee(int $fee)
    {
        $this->setApiParameter('total_fee', $fee);
        return $this;
    }

    public function setAuthCode(string $code)
    {
        $this->setApiParameter('auth_code', $code);
        return $this;
    }

    public function setIp(string $ip)
    {
        $this->setApiParameter('spbill_create_ip', $ip);
        return $this;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
