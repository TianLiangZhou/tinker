<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:35
 */

namespace Tinker\Request\Pay\Wechat;


use Tinker\Pay\Wechat\WechatRequest;

class WechatCloseOrderRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/pay/closeorder";
    }


    public function setOutTradeNo(string $orderId)
    {
        $this->setApiParameter('out_trade_no', $orderId);
        return $this;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
