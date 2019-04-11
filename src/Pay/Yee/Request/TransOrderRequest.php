<?php


namespace Tinker\Pay\Yee\Request;


use Exception;
use Tinker\Request;

class TransOrderRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.

        return "/rest/v1.0/std/trade/order";
    }

    /**
     * @param string $orderId
     * @return $this
     */
    public function setOrderId(string $orderId)
    {

        $this->setApiParameter("orderId", $orderId);

        return $this;
    }

    /**
     * @param $orderAmount
     * @return $this
     */
    public function setOrderAmount($orderAmount)
    {

        $this->setApiParameter("orderAmount", $orderAmount);

        return $this;
    }

    /**
     * @param $timeoutExpress
     * @return $this
     */
    public function setTimeoutExpress($timeoutExpress)
    {

        $this->setApiParameter("timeoutExpress", $timeoutExpress);

        return $this;
    }

    /**
     * @param $requestDate
     * @return $this
     */
    public function setRequestDate($requestDate)
    {

        $this->setApiParameter("requestDate", $requestDate);

        return $this;
    }

    /**
     * @param $redirectUrl
     * @return $this
     */
    public function setRedirectUrl($redirectUrl)
    {

        $this->setApiParameter("redirectUrl", $redirectUrl);

        return $this;
    }

    /**
     * @param $notifyUrl
     * @return $this
     */
    public function setNotifyUrl($notifyUrl)
    {

        $this->setApiParameter("notifyUrl", $notifyUrl);

        return $this;
    }

    /**
     * @param $goodsParamExt
     * @return $this
     */
    public function setGoodsParamExt($goodsParamExt)
    {
        $this->setApiParameter("goodsParamExt", $goodsParamExt);

        return $this;
    }

    /**
     * @param $paymentParamExt
     * @return $this
     */
    public function setPaymentParamExt($paymentParamExt)
    {
        $this->setApiParameter("paymentParamExt", $paymentParamExt);

        return $this;
    }

    /**
     * @param $industryParamExt
     * @return $this
     */
    public function setIndustryParamExt($industryParamExt)
    {

        $this->setApiParameter("industryParamExt", $industryParamExt);

        return $this;
    }



    /**
     * @return mixed
     * @throws Exception
     */
    public function check()
    {
        // TODO: Implement check() method.
    }
}
