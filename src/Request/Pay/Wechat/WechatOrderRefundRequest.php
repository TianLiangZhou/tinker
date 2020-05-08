<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:36
 */

namespace Tinker\Request\Pay\Wechat;


use Tinker\Pay\Wechat\WechatRequest;

class WechatOrderRefundRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/secapi/pay/refund";
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

    public function setTotalFee(int $totalFee)
    {
        $this->setApiParameter('total_fee', $totalFee);
        return $this;
    }


    public function setRefundFee(int $refundFee)
    {
        $this->setApiParameter('refund_fee', $refundFee);
        return $this;
    }


    public function setOpUserId(int $userId)
    {
        $this->setApiParameter('op_user_id', $userId);
        return $this;
    }


    public function check()
    {
        // TODO: Implement check() method.
    }
}
