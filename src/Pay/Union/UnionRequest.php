<?php


namespace Tinker\Pay\Union;


use Tinker\Pay\PayRequest;

/**
 * Class UnionRequest
 * @package Tinker\Pay\Union
 */
abstract class UnionRequest extends PayRequest
{

    /**
     * 交易类型
     *
     * @param $txnType
     * @return $this
     */
    public function setTxnType($txnType)
    {
        $this->setApiParameter('txnType', $txnType);

        return $this;
    }

    /**
     * 交易子类型
     *
     * @param $txnSubType
     * @return $this
     */
    public function setTxnSubType($txnSubType)
    {
        $this->setApiParameter('txnSubType', $txnSubType);

        return $this;
    }

    /**
     * 产品类型
     *
     * @param $bizType
     * @return $this
     */
    public function setBizType($bizType)
    {
        $this->setApiParameter('bizType', $bizType);

        return $this;
    }

    /**
     * 货币类型
     *
     * @param $currencyCode
     * @return $this
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->setApiParameter('currencyCode', $currencyCode);

        return $this;
    }

    /**
     * 订单ID
     *
     * @param $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->setApiParameter('orderId', $orderId);

        return $this;
    }

    /**
     * 交易金额，以分为单位
     *
     * @param $money
     * @return $this
     */
    public function setTxnAmt($money)
    {
        $this->setApiParameter('txnAmt', $money);

        return $this;
    }

    /**
     * 通知地址
     *
     * @param $notifyUrl
     * @return $this
     */
    public function setBackUrl($notifyUrl)
    {
        $this->setApiParameter('backUrl', $notifyUrl);

        return $this;
    }
}
