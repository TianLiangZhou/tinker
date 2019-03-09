<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:41
 */

namespace Tinker\Pay\Wechat\Request;


use Tinker\Pay\Wechat\WechatRequest;

class WechatReverseRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/secapi/pay/reverse";
    }


    public function setOutTradeNo(string $orderId)
    {
        $this->setApiParameter('out_trade_no', $orderId);
        return $this;
    }

    public function setTransactionId(string $id)
    {
        $this->setApiParameter('transaction_id', $id);
        return $this;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
