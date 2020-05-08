<?php


namespace Tinker\Request\PDD;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkOrderDetailGet
 * @package Tinker\PDD\Request
 *
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.goods.detail
 */
class PddDdkOrderDetailGet extends Request
{

    /**
     * @param string $orderSn
     */
    public function setOrderSn(string $orderSn)
    {
        $this->set('order_sn', $orderSn);
    }
    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.order.detail.get";
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
