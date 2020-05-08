<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:36
 */

namespace Tinker\Request\Pay\Wechat;


use Tinker\Pay\Wechat\WechatRequest;

class WechatRefundQueryRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/pay/refundquery";
    }

    public function setOutTradeNo(string $orderId)
    {
        $this->setApiParameter('out_trade_no', $orderId);
        return $this;
    }

    public function setOutRefundNo(string $refundId)
    {
        $this->setApiParameter('out_refund_no', $refundId);
        return $this;
    }

    public function setTransactionId(string $id)
    {
        $this->setApiParameter('transaction_id', $id);
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
