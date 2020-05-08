<?php


namespace Tinker\Request\Pay\Yee;


use Exception;
use Tinker\Request;

class OrderQueryRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.

        return "/rest/v1.0/std/trade/orderquery";
    }

    /**
     * @param string $orderId
     * @return $this
     */
    public function setOrderId(string $orderId)
    {
        $this->setApiParameter('orderId', $orderId);

        return $this;
    }

    /**
     * @param string $transOrderNo
     * @return $this
     */
    public function setUniqueOrderNo(string $transOrderNo)
    {

        $this->setApiParameter('uniqueOrderNo', $transOrderNo);

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
